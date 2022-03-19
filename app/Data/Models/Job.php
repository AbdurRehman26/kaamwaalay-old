<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yadakhov\InsertOnDuplicateKey;

class Job extends Model
{
    use InsertOnDuplicateKey, SoftDeletes;


    protected $fillable = [
        'title',
        'service_id',
        'city_area_id',
        'city_id',
        'title',
        'description',
        'address',
        'preferred_gender',
        'schedule_at',
        'preference',
        'user_id',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
    ];

    const AWARDED = 'awarded';
    const CANCELLED = 'cancelled';
    const COMPLETED = 'completed';
    const IN_BIDDING = 'in_bidding';
    const INITIATED = 'initiated';

    const NORMAL = 'normal';
    const URGENT = 'urgent';
}
