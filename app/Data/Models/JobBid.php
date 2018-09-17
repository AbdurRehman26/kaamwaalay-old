<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class JobBid extends Model
{
    use InsertOnDuplicateKey;

	const CANCELLED 	= 'cancelled';
	const COMPLETED 	= 'completed';
	const PENDING 		= 'pending';
	const INVITED 		= 'invited';
}

