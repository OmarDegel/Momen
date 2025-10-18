<?php
namespace App\Services;

use Illuminate\Support\Facades\Log;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging;
use Kreait\Firebase\Messaging\CloudMessage;

class FirebaseNotificationService
{
    protected $messaging;

    public function __construct(string $projectId)
    {
        $service_account_path =  base_path(config('firebase.acount_path'));
       
        
        $factory = (new Factory)->withServiceAccount($service_account_path)->withProjectId($projectId);
        $this->messaging = $factory->createMessaging();
    }

    public function sendNotification($token, $title, $body, $data = [])
    {
        $message = CloudMessage::withTarget('token', $token)
            ->withNotification([
                'title' => $title,
                'body'  => $body,
            ])
            ->withData($data);

        return $this->messaging->send($message);
    }

    public function sendNotificationWithDevice($device, $title, $body, $data = [])
    {
        try {
            $this->sendNotification(
                    $device->token,
                    $title,
                    $body,
                    $data
            );
        } catch (\Kreait\Firebase\Exception\Messaging\InvalidMessage $e) {
            Log::info('Invalid FCM token: ' . $device->token);
            $device->delete();
        } catch (\Throwable $e) {
            Log::info('Unexpected FCM error: ' . $e->getMessage());

        }
    }

}
