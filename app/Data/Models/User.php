<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class User extends Model
{
	use InsertOnDuplicateKey;   
}
