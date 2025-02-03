<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class City extends Model
{
    use InsertOnDuplicateKey;
}
