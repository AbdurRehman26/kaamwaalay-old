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
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;

class CustomerBannedNotification extends Notification implements ShouldQueue
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
        \Log::info(json_encode($this->data->to->unreadNotifications()->count()));
        \Log::info('json_encode($this->data->to->unreadNotifications()->count()');


        $data = ['data'=>[
         'unread_count' => $this->data->to->unreadNotifications()->count(),
         'title' => $this->data->title,
         'type' => $this->data->type,
         'text' => $this->data->message,
         'link_text' => 'View Job',
         'route' => 'job.details',
         "id" => $this->data->id,
         "job_id" => $this->data->id,
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
            'type' => $this->data->type,
            'text' => $this->data->message,
            'link_text' => 'View Job',
            'route' => 'job.details',
            "id" => $this->data->id,
            "job_id" => $this->data->id,
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
                'link_text' => 'View Job',
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
        ->subject(Lang::getFromJson('Customer has been banned'))
        ->markdown('email.user-bid-on-job', ['url' => $url , 'message' => $this->data->message]);
    }
}
