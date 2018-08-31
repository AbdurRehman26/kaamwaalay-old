<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class ServiceProviderProfile extends Model
{
    use InsertOnDuplicateKey;
}
