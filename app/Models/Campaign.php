<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
