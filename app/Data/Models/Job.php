<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yadakhov\InsertOnDuplicateKey;

class Job extends Model
{   
    use InsertOnDuplicateKey, SoftDeletes;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
        'videos' => 'array'
    ];

	const AWARDED 		= 'awarded';
	const CANCELLED 	= 'cancelled';
	const COMPLETED 	= 'completed';
	const IN_BIDDING 	= 'in_bidding';
	const INITIATED 	= 'initiated';

    const NORMAL        = 'normal';
    const URGENT        = 'urgent';
}
