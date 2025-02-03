<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class ZipCode extends Model
{
	use InsertOnDuplicateKey;   
}
