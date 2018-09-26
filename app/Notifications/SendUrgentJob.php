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


class SendUrgentJob extends Notification implements ShouldBroadcast
{
    use Queueable;
    public $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        \Log::info('via');
         return [OneSignalChannel::class, 'database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
     public function toOneSignal($notifiable)
    {
       \Log::info('toOneSignal');
      //\Log::info($notifiable);
       return OneSignalMessage::create()
            ->subject("Urgent Job")
            ->body($this->data->message);
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
            'image' => $this->data->from->profile_image,
            'link_text' => 'View Job',
            'route' => 'job.details',
            "id" => $this->data->id
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
        return new BroadcastMessage([
            'text' => $this->data->message,
            'image' => $this->data->from->profile_image,
            'link_text' => 'View Job',
            'route' => 'job.details',
            "id" => $this->data->id
        ]);
    }
}
