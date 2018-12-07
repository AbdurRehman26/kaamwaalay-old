<?php

namespace App\Data\Models;
use Yadakhov\InsertOnDuplicateKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Plan extends Model
{
	use SoftDeletes,InsertOnDuplicateKey;
	const URGENT = 1;
	const ACCOUNT_CREATION = 2;

	function getCreatedAtAttribute($value) {
		return Carbon::parse($value);
	}
	function getUpdatedAtAttribute($value) {
		return Carbon::parse($value);
	}
}
