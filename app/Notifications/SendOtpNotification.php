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
    protected $otp;
    public function __construct(public string $email, public string $purpose = 'verify', $otp = null)
    {
        $this->otp = $otp ;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
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
            ->line($this->otp);

    }
}
