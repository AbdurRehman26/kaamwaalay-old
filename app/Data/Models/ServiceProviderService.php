<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yadakhov\InsertOnDuplicateKey;

class ServiceProviderService extends Model
{
    use SoftDeletes , InsertOnDuplicateKey;
}
