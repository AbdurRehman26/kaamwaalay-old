<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Lang;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;


class UserRatingCreatedNotification extends Notification implements ShouldQueue
{

    use Queueable, Dispatchable, InteractsWithSockets, SerializesModels;
    public $data;
    public $queue;
    protected $date;
    
    /**
    * Create a new notification instance.
    *
    * @return void
    */
    public function __construct($event)
    {
        $this->data = $event;
        $this->queue = config('queue.pre_fix').'notifications';
        $this->date = Carbon::now()->toDateTimeString();
    }

    /**
    * Get the notification's delivery channels.
    *
    * @param  mixed  $notifiable
    * @return array
    */
    public function via($notifiable)
    {
      return ['database', OneSignalChannel::class ,'broadcast','mail'];
  }

    /**
    * Get the mail representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return \Illuminate\Notifications\Messages\MailMessage
    */
    public function toOneSignal($notifiable)
    {
        $data = ['data'=>[
            'unread_count' => $this->data->to->unreadNotifications()->count(),
            'text' => $this->data->message,
            'image' => $this->data->from->profile_image,
            'link_text' => 'View Feedback',
            'route' => 'job.details',
            "id" => $this->data->id,
            "job_id" => $this->data->id,
            "type" => $this->data->type
        ],
        'created_at' => $this->date
    ];
      //\Log::info($notifiable);
    return OneSignalMessage::create()
    ->setParameter('ios_badgeType', 'SetTo')
    ->setParameter('ios_badgeCount', $this->data->to->unreadNotifications()->count())
    ->subject("Job bid")
    ->body(strip_tags($this->data->message))
    ->setData('data',$data);

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
        ->subject(Lang::getFromJson('Feedback and rating'))
        ->markdown('email.user-bid-on-job', ['url' => $url , 'message' => $this->data->message]);
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
            "job_id" => $this->data->id,
            "type" => $this->data->type,
            'link_text' => 'View Feedback',
            'route' => 'job.details',
            "id" => $this->data->id,
        ];
    }

    public function toBroadcast($notifiable)
    {   
        return (new BroadcastMessage([
            'data'=>[
                'text' => $this->data->message,
                'image' => $this->data->from->profile_image,
                'link_text' => 'View Feedback',
                'route' => 'job.details',
                "id" => $this->data->id,
            ],
            'created_at' => $this->date,
        ]))->onQueue($this->queue);
    }
}
