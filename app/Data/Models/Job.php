<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
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

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function cityArea(): BelongsTo
    {
        return $this->belongsTo(CityArea::class);
    }

    public function totalBids(): int
    {
        return $this->hasMany(JobBid::class)->count();
    }

    public function awardedBid(): HasOne
    {
        return $this->hasOne(JobBid::class)->where('is_awarded', 1);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function myBid(): HasOne
    {
        return $this->hasOne(JobBid::class)->where('user_id', request()->user()->id);
    }

    public function scopeCustomerJobs(Builder $query)
    {
        return $query->where('user_id', request()->user()->id);
    }
}
