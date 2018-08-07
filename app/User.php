<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Notifications\ActivationNotification;
class User extends Authenticatable
{
     use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','email', 'password', 'address','apartment','zip_code','phone_number','role_id','state_id','city_id','status','profile_image','activation_key','activated_at'
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
     * @param  string  $token
     * @return void
     */
    public function sendActivationEmail()
    {
        $this->notify(new ActivationNotification());
    }
}
