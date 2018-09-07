<?php

namespace App\Data\Models;
use Yadakhov\InsertOnDuplicateKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
	use SoftDeletes,InsertOnDuplicateKey;
	const URGENT = 1;
	const ACCOUNT_CREATION = 2;
}
