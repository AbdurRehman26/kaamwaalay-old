<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ServiceProviderReviewNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $data;
    public $queue;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->queue = config('queue.pre_fix').'notifications';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', OneSignalChannel::class ,'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \NotificationChannels\OneSignal\OneSignalMessage
     */
     public function toOneSignal($notifiable)
    {
        $data = ['data'=>[
                    'text' => $this->data->message,
                    ],
                'created_at' => $notifiable->created_at->toDateTimeString()
                 ];
        return OneSignalMessage::create()
            ->subject("Urgent Job")
            ->body($this->data->message)
            ->setData('data',$data);
    }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'text' => $this->data->message,
        ];
    }
    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
    */
    public function toBroadcast($notifiable)
    {
        return new (BroadcastMessage([
            'data'=>[
                'text' => $this->data->message,
            ],
            'created_at' => $notifiable->created_at->toDateTimeString(),
        ]))->onQueue($this->queue);
    }
}
