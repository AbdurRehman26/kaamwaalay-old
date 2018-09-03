<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class Payment extends Model
{
    use InsertOnDuplicateKey;
}
