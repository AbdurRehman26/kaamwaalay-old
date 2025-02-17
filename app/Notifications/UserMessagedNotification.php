<?php

namespace App\Notifications;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesModels;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;

class UserMessagedNotification extends Notification implements ShouldQueue
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
        $this->queue = config('queue.pre_fix').'messages';
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
        return [OneSignalChannel::class];
    }

    /**
    * Get the mail representation of the notification.
    *
    * @param  mixed  $notifiable
    * @return \Illuminate\Notifications\Messages\MailMessage
    */
    public function toOneSignal($notifiable)
    {
        $eventData = $this->data->discussion;
        $recieverUser = app('UserRepository')->findById($eventData->reciever_id);
        $senderUser = app('UserRepository')->findById($eventData->sender_id);
        $senderName = $senderUser->first_name .' '. $senderUser->last_name;
        if($senderUser->role_id == Role::SERVICE_PROVIDER) {
            $senderProfile = app('ServiceProviderProfileRepository')->model->where('user_id', '=', $senderUser->id)->first();
            if($senderProfile) {
                $senderName = $senderProfile->business_name;
            }
        }
        $data = [
            'data'=> [
                "type" => 'chat',
                'title' => 'New Message',
                "job_bid_id" => $eventData->job_bid_id,
                "job_id" => $eventData->job_id,
                "reciever_id" => $eventData->reciever_id,
                "reciever_name" => $recieverUser->first_name .' '. $recieverUser->last_name,
                "reciever_online_status" => true,
                "reciever_image" => $recieverUser->profileImage,
                "job_status" => $eventData->job_status,
                "chat_id" => $eventData->id,
                "sender_name" => $senderName,
                "sender_image" => $senderUser->profileImage,
                "sender_id" => $senderUser->id,
            ],
            'created_at' => $this->date
        ];
       // \Log::info($data);
        return OneSignalMessage::create()
        ->subject("New Message")
        ->body($eventData->text)
        ->setData('data', $data);

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
            //
        ];
    }
}
