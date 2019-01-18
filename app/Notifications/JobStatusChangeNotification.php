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
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;

class JobStatusChangeNotification extends Notification implements ShouldQueue
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
        return ['database', OneSignalChannel::class ,'broadcast','mail'];
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
            'unread_count' => $this->data->to->unreadNotifications()->count(),
            'text' => $this->data->message,
            'title' => $this->data->title,
            'link_text' => (!empty($this->data->link_text))?$this->data->link_text:'View Job',
            'route' => 'job.details',
            "id" => $this->data->id,
            "job_id" => $this->data->id,
            "type" => $this->data->type
        ],
        'created_at' => $this->date
    ];
    return OneSignalMessage::create()
    ->setParameter('ios_badgeType', 'SetTo')
    ->setParameter('ios_badgeCount', $this->data->to->unreadNotifications()->count())
    ->subject($this->data->title)
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
            'title' => $this->data->title,
            'link_text' => (!empty($this->data->link_text))?$this->data->link_text:'View Job',
            'route' => 'job.details',
            "id" => $this->data->id,
            "job_id" => $this->data->id,
            "type" => $this->data->type,
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
                'title' => $this->data->title,
                'link_text' => (!empty($this->data->link_text))?$this->data->link_text:'View Job',
                'route' => 'job.details',
                "id" => $this->data->id,
            ],
            'created_at' => $this->date,
        ]))->onQueue($this->queue);
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
        ->subject(Lang::getFromJson((!empty($this->data->email_title))?$this->data->email_title:'Job Marked Completed'))
        ->markdown('email.job-status-change', ['url' => $url , 'message' => $this->data->message, 'user' => $notifiable]);
    }
}
