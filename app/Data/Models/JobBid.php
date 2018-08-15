<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class JobBid extends Model
{
	const CANCELLED 	= 'cancelled';
	const COMPLETED 	= 'completed';
	const PENDING 		= 'pending';
	const INVITED 		= 'invited';
}

