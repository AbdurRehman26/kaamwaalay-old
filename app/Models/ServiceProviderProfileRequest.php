<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class ServiceProviderProfileRequest extends Model
{   
  use InsertOnDuplicateKey;
  const APPROVED = 'approved';
  const REJECTED = 'rejected';
}
