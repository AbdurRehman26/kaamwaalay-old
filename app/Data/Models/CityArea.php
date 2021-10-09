<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class CityArea extends Model
{
    use InsertOnDuplicateKey;
    use HasFactory;
}
