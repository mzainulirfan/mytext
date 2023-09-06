<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_fullname', 'user_username', 'user_phone_number', 'user_address'];

    // Dates
    protected $useTimestamps = true;
}
