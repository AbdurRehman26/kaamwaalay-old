<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class State extends Model
{
    use InsertOnDuplicateKey;
}
