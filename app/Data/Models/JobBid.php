<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yadakhov\InsertOnDuplicateKey;
use Carbon\Carbon;

class JobBid extends Model
{
    use InsertOnDuplicateKey, softDeletes;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'job_done_images' => 'array',
    ];

    const CANCELLED 	= 'cancelled';
    const COMPLETED 	= 'completed';
    const PENDING 		= 'pending';
    const INVITED       = 'invited';
    const VISITALLOWED      = 'visit_allowed';
    const ONTHEWAY      = 'on_the_way';
    const INITIATED         = 'initiated';
    const SUGGESTED 		= 'suggested_time';


    public function setPreferredTimeAttribute($value='')
    {
        $this->attributes['preferred_time'] = Carbon::parse($value)->toTimeString();
    }

    public function setPreferredDateAttribute($value='')
    {

        $this->attributes['preferred_date'] = Carbon::parse($value)->toDateTimeString();
    }

    

}

