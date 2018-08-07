<?php

namespace App\Data\Models;
use Yadakhov\InsertOnDuplicateKey;

use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
	use InsertOnDuplicateKey;   
}
