<?php

namespace App\Notifications;

use Ichtrojan\Otp\Otp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VerfyEmailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $email;
    private $otp;
    public function __construct( $email)
    {
        $this->email = $email;
        $this->otp = new Otp();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $code = $this->otp->generate($this->email, 'numeric', 4, 10);
        return (new MailMessage)
                    ->greeting('Your Otp')
                    ->line('code : '.$code->token)
                    ->line('thanks');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    
}
