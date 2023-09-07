<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Articles extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Article'
        ];
        return view('articles/list', $data);
    }
}
