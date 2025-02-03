<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class State extends Model
{
    use InsertOnDuplicateKey;
}
