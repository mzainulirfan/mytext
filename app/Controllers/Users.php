<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserAccountModel;

class Users extends BaseController
{
    private $userModel;
    private $userAccountModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userAccountModel = new UserAccountModel();
    }
    public function index()
    {
        $userData = $this->userModel->findAll();
        $data = [
            'title' => 'User list',
            'userData' => $userData
        ];
        return view('users/list', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Create new user'
        ];
        return view('users/create', $data);
    }
    public function save()
    {
        $validatonRules = [
            'fullname' => 'required',
            'phone' => 'required|numeric|is_unique[users.user_phone_number]',
            'address' => 'required'
        ];
        $fullname =  $this->request->getVar('fullname');
        $username = url_title($fullname, '-', true) . '-' . getRandomString(20);
        $data = [
            'user_fullname' =>  $fullname,
            'user_username' => $username,
            'user_phone_number' =>  $this->request->getVar('phone'),
            'user_address' =>  $this->request->getVar('address')
        ];

        if (!$this->validate($validatonRules)) {
            return redirect()->to('user/create')->withInput()->with('validation', $this->validator);
        }
        $this->userModel->save($data);
        session()->setFlashdata('success', 'New user <a href="user/' . $username . '"><strong class="text-uppercase">' . $fullname . '</strong> </a>has been saved successfully!');
        return redirect()->to('user');
    }
    public function detail($username)
    {
        $userByUsername = $this->userModel->where('user_username', $username)->first();
        $userId = $userByUsername['user_id'];
        $userByAccountId = $this->userAccountModel->where('account_user_id', $userId)->first();
        $data = [
            'title' => $username,
            'userData' => $userByUsername,
            'userByAccountId' => $userByAccountId
        ];
        return view('users/detail', $data);
    }
    public function createAccount($userId)
    {
        
    }
}
