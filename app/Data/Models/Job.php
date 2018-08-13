<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
        /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
    ];

	const AWARDED 		= 'awarded';
	const CANCELLED 	= 'cancelled';
	const COMPLETED 	= 'completed';
	const IN_BIDDING 	= 'in_bidding';
	const INITIATED 	= 'initiated';

}
