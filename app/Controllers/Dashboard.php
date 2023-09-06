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
        $userData = $this->userModel->findAll();
        $data = [
            'title' => 'Dashboard',
            'userData' => $userData
        ];
        return view('dashboard/index', $data);
    }
}
