<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use App\Data\Models\Plan;

class Campaign extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_id','user_id'
    ];
	
    const  EXPIRED = 'expired';

    public function plan()
	{
		return $this->belongsTo(Plan::class);
	}
}
