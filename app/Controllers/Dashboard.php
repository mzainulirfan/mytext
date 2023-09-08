<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ArticleModel;

class Dashboard extends BaseController
{
    private $userModel;
    private $articleModel;
    public function __construct()
    {
        $this->userModel = new UserModel;
        $this->articleModel = new ArticleModel;
    }
    public function index()
    {
        $countUsers = $this->userModel->countAllResults();
        $countArticles = $this->articleModel->countAllResults();
        $userData = $this->userModel->orderBy('user_id', 'DESC')->findAll(5);
        $data = [
            'title' => 'Dashboard',
            'countUsers' => $countUsers,
            'countArticles' => $countArticles,
            'userData' => $userData
        ];
        return view('dashboard/index', $data);
    }
}
