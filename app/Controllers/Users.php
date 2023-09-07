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
        $perPage = $this->request->getVar('perPage');
        if ($perPage) {
            session()->set('perPage', $perPage);
            return redirect()->to('user')->withInput(); // Sesuaikan URL dengan URL halaman Anda
        } else {
            $perPage = session()->get('perPage');
        }
        $userData = $this->userModel->paginate($perPage, 'users');
        $countAllUser = $this->userModel->countAllResults();
        $currentPage = $this->request->getVar('page_users') ? $this->request->getVar('page_users') : 1;
        $data = [
            'title' => 'User list',
            'userData' => $userData,
            'pager' => $this->userModel->pager,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
            'countAllUser' => $countAllUser
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
            'address' => 'required',
            'gender' => 'required'
        ];
        $fullname =  $this->request->getVar('fullname');
        $username = url_title($fullname, '-', true) . '-' . getRandomString(20);
        $data = [
            'user_fullname' =>  $fullname,
            'user_username' => $username,
            'user_phone_number' =>  $this->request->getVar('phone'),
            'user_address' =>  $this->request->getVar('address'),
            'user_gender' =>  $this->request->getVar('gender')
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

        if (!$userByUsername) {
            $data = [
                'title' => $username,
                'username' => $username
            ];
            return view('errors/nodata', $data);
        }

        $userId = $userByUsername['user_id'];
        $userByAccountId = $this->userAccountModel->where('account_user_id', $userId)->first();
        $data = [
            'title' => $username,
            'userData' => $userByUsername,
            'userByAccountId' => $userByAccountId
        ];
        return view('users/detail', $data);
    }

    public function update()
    {
        $userId =  $this->request->getVar('userId');
        $username =  $this->request->getVar('username');
        $phoneNumber =  $this->request->getVar('phone');
        $userData = $this->userModel->where('user_id', $userId)->first();
        $userPhoneOld = $userData['user_phone_number'];
        if ($userPhoneOld === $phoneNumber) {
            $phoneRoles = 'required|numeric';
        } else {
            $phoneRoles = 'required|numeric|is_unique[users.user_phone_number]';
        }

        $validatonRules = [
            'fullname' => 'required',
            'phone' => $phoneRoles,
            'address' => 'required',
            'gender' => 'required'
        ];
        $data = [
            'user_id' =>  $userId,
            'user_fullname' =>  $this->request->getVar('fullname'),
            'user_phone_number' =>  $phoneNumber,
            'user_gender' =>  $this->request->getVar('gender'),
            'user_address' =>  $this->request->getVar('address')
        ];

        if (!$this->validate($validatonRules)) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('user/' . $username)->withInput()->with('validation', $this->validator);
        }
        $this->userModel->save($data);
        session()->setFlashdata('success', 'User ' . $username . ' has been updated!');
        return redirect()->to('user/' . $username);
    }
    public function createAccount()
    {
        $userId = $this->request->getVar('user_id');
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $username = $this->request->getVar('user_username');

        $validatonRules = [
            'email' => 'required|valid_email',
            'password' => 'required|max_length[255]|min_length[3]',
            'confirmPassword' => 'required|max_length[255]|matches[password]',
        ];

        $data = [
            'account_user_id' => $userId,
            'account_email' => $email,
            'account_password' => password_hash($password, PASSWORD_DEFAULT),
        ];
        if (!$this->validate($validatonRules)) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('user/' . $username)->withInput()->with('validation', $this->validator);
        }

        $this->userAccountModel->save($data);

        $dataUser = [
            'user_id' => $userId,
            'is_user_account' => 1
        ];
        $this->userModel->save($dataUser);

        session()->setFlashdata('success', 'Akun telah berhasil dibuat!');
        return redirect()->to('user/' . $username);
    }
    public function changePassword()
    {
        $accountId =  $this->request->getVar('account_id');
        $newPassword =  $this->request->getVar('password');
        $username =  $this->request->getVar('user_username');
        $validatonRules = [
            'password' => 'required|max_length[255]|min_length[3]',
            'confirmPassword' => 'required|max_length[255]|matches[password]',
        ];
        $data = [
            'account_id' => $accountId,
            'account_password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ];
        if (!$this->validate($validatonRules)) {
            session()->setFlashdata('errors', $this->validator->listErrors());
            return redirect()->to('user/' . $username)->withInput()->with('validation', $this->validator);
        }
        $this->userAccountModel->save($data);
        session()->setFlashdata('success', 'Password has been changed!');
        return redirect()->to('user/' . $username);
    }
    public function delete($userId)
    {
        $this->userAccountModel->where('account_user_id', $userId)->delete();
        $this->userModel->delete($userId);
        session()->setFlashdata('success', 'User has been deleted!');
        return redirect()->to('user');
    }
}
