<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class ActivationNotification extends Notification
{
    use Queueable;

     /**
      * The callback that should be used to build the mail message.
      *
      * @var \Closure|null
      */
    public static $toMailCallback;

    /**
     * Create a notification instance.
     *
     * @param  string $token
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable,  $notifiable->activation_key);
        }
        $url = url(
            route(
                'user.activate', [
                'token' => $notifiable->activation_key,
                ]
            )
        );
        return (new MailMessage)
            ->subject(Lang::getFromJson('Account Activation Email'))
            ->markdown('email.user-invite', ['url' => $url, 'user' => $notifiable]);
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
