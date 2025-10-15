<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Ichtrojan\Otp\Otp;

class SendOtpNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public string $email, public string $purpose = 'verify')
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $otp = (new Otp)->generate($this->email, 4, 5); 

        $subject = match ($this->purpose) {
            'reset' => __('auth.reset_code_subject'),
            default => __('auth.verification_code_subject'),
        };

        $line = match ($this->purpose) {
            'reset' => __('auth.reset_code_message'),
            default => __('auth.verification_code_message'),
        };

        return (new MailMessage)
            ->subject($subject)
            ->line($line)
            ->line(__('auth.code_is', ['code' => $otp->token]));
    }
}
