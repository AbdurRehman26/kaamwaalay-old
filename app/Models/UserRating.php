<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class UserRating extends Model
{
    //
    use InsertOnDuplicateKey;
    const APPROVED = "approved";
}
