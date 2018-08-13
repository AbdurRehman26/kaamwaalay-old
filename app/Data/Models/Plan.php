<?php

namespace App\Data\Models;
use Yadakhov\InsertOnDuplicateKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
	use InsertOnDuplicateKey, SoftDeletes;
}
