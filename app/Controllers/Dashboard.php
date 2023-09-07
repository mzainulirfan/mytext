<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel;
    }
    public function index()
    {
        $countUsers = $this->userModel->countAllResults();
        $userData = $this->userModel->orderBy('user_id', 'DESC')->findAll(5);
        $data = [
            'title' => 'Dashboard',
            'countUsers' => $countUsers,
            'userData' => $userData
        ];
        return view('dashboard/index', $data);
    }
}
