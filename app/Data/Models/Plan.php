<?php

namespace App\Data\Models;
use Yadakhov\InsertOnDuplicateKey;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
	use InsertOnDuplicateKey;
	const URGENT = 1;
	const ACCOUNT_CREATION = 2;
}
