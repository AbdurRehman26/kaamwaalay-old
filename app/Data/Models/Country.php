<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class Country extends Model
{
    use InsertOnDuplicateKey;
    const USA = 231;
}
