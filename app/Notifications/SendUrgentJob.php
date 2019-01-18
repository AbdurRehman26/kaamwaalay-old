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
use Carbon\Carbon;

class SendUrgentJob extends Notification implements ShouldQueue
{
    use Queueable;
    public $data;
    public $queue;
    protected $date;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        \Log::info('via');
        return ['database', OneSignalChannel::class ,'broadcast'];
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
     $data = ['data'=>[
        'unread_count' => $this->data->to->unreadNotifications()->count(),
        'text' => $this->data->message,
        'image' => $this->data->from->profile_image,
        'link_text' => 'View Job',
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
->subject("Urgent Job")
->body(strip_tags($this->data->message))
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
            'image' => $this->data->from->profile_image,
            "job_id" => $this->data->id,
            "type" => $this->data->type,
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
        return (new BroadcastMessage([
            'data'=>[
                'text' => $this->data->message,
                'image' => $this->data->from->profile_image,
                'link_text' => 'View Job',
                'route' => 'job.details',
                "id" => $this->data->id
            ],
            'created_at' => $this->date,
        ]))->onQueue($this->queue);
    }
}
