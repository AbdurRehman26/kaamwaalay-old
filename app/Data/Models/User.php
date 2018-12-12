<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Notifications\ActivationNotification;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use App\Notifications\SendEmailPasswordNotification;
use App\Notifications\SendServiceProviderStatusNotification;
use Storage;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use InsertOnDuplicateKey,HasApiTokens, Notifiable, Billable;
    const ACTIVE = 'active';
    const PENDING = 'pending';
    const IN_ACTIVE = 'deactived';
    const BANNED = 'banned';
    const GLOBAL_ADMIN = 1;
    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'address',
        'apartment',
        'zip_code',
        'phone_number',
        'role_id',
        'state_id',
        'city_id',
        'status',
        'profile_image',
        'access_level',
        'activation_key',
        'activated_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Send the activation notification.
     *
     * @param  string $token
     * @return void
     */
    public function sendActivationEmail()
    {
        $this->notify(new ActivationNotification());
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
    public function sendPasswordLinkByAdmin()
    {
        $this->notify(new SendEmailPasswordNotification());
    }
    public static function generatePassword()
    {
         // Generate random string and encrypt it. 
        return bcrypt(str_random(35));
    }

    public function sendChangeStatusNotification($status, $reason)
    {
        $this->notify(new  SendServiceProviderStatusNotification($status, $reason));
    }

    public function routeNotificationForOneSignal()
    {

        return [
            'tags' => [
                        'key' => 'user_id',
                        'relation' => '=',
                        'value' => $this->id,
                      ]
            ];
    }

}
