<?php

namespace App\Data\Models;
use Yadakhov\InsertOnDuplicateKey;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
	use InsertOnDuplicateKey;
}
