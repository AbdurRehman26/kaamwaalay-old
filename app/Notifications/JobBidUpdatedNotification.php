<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;


class JobBidUpdatedNotification extends Notification implements ShouldBroadcast
{

    use Queueable, Dispatchable, InteractsWithSockets, SerializesModels;
    public $data;

    /**
    * Create a new notification instance.
    *
    * @return void
    */
    public function __construct($event)
    {
        $this->data = $event;
    }

    /**
    * Get the notification's delivery channels.
    *
    * @param  mixed  $notifiable
    * @return array
    */
    public function via($notifiable)
    {
    //'database', OneSignalChannel::class, 
        return ['broadcast'];

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
        return OneSignalMessage::create()
        ->subject("Job bid updated")
        ->body('This is a test message')
        ->setData('test' , $this->data->body);

    }

    /**
    * Get the mail representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return \Illuminate\Notifications\Messages\MailMessage
    */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->line('The introduction to the notification.')
        ->action('Notification Action', url('/'))
        ->line('Thank you for using our application!');
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
            'text' => $this->data->body,
            'image' => $this->data->from->profile_image,
            'link_text' => 'View Job',
            'route' => 'job.details',
            "id" => $this->data->id
        ];
    }

    public function toBroadcast($notifiable)
    {   
        return new BroadcastMessage([
            $this->data->body
        ]);
    }
}
