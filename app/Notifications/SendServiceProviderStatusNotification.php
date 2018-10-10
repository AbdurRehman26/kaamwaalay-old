<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class SendServiceProviderStatusNotification extends Notification
{
    use Queueable;
    public $status;
    public $reason;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($status, $reason)
    {
        $this->reason = $reason;
        $this->status = $status;
        return ['mail'];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {   
        $url = route('front.login');
        return (new MailMessage)
        ->subject(Lang::getFromJson('Service Provider Profile Request Status'))
        ->markdown('email.provider-profile-status', ['url' => $url , 'status' => $this->status, 'reason' => $this->reason, 'user' => $notifiable]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
