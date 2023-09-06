<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAccountModel extends Model
{
    protected $table            = 'user_accounts';
    protected $primaryKey       = 'account_id';
    protected $allowedFields    = ['account_user_id', 'account_email', 'account_password', 'account_status'];
    // Dates
    protected $useTimestamps = true;
}
