<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
class SendEmailPasswordNotification extends Notification
{
   

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        return ['mail'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Generate a new reset password token
        $token = app('auth.password.broker')->createToken($notifiable);
        $url = url(
            route(
                'admin.password.reset', [
                'token' =>$token,
                'email' =>$notifiable->email,
                ], false
            )
        );
        return (new MailMessage)
            ->subject(Lang::getFromJson('Set a password'))
            ->markdown('email.user-new-password', ['url' => $url]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
