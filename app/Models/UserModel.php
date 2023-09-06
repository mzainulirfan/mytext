<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $allowedFields    = ['user_fullname', 'user_username', 'user_phone_number', 'user_address', 'is_user_account'];

    // Dates
    protected $useTimestamps = true;
}
