<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Yadakhov\InsertOnDuplicateKey;

class ServiceProviderProfileRequest extends Model
{   
  use InsertOnDuplicateKey;
  const APPROVED = 'approved';
  const REJECTED = 'rejected';
}
