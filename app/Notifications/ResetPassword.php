<?php

namespace App\Notifications;

use App\Models\Role;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends Notification
{

    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }
        if($notifiable->role_id == Role::ADMIN || $notifiable->role_id == Role::REVIEWER ){
          $url = 'admin.password.reset';
        }else{
          $url = 'password.reset';
        }
        $url = url(
            route(
                 $url, [
                'token' =>$this->token,
                'email' =>$notifiable->email,
                ], false
            )
        );
        return (new MailMessage)
            ->subject(Lang::getFromJson('Reset Password'))
            ->markdown('email.user-reset-password', ['url' => $url, 'user' => $notifiable]);
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
