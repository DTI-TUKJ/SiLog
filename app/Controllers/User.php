<?php

namespace App\Controllers;
use App\Models\LoginModel;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function __construct()
    {
        $this->LM = new LoginModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Users',
            'data' => $this->LM->findAll(),
            'total' => $this->LM->countAll()
        ];
        return view('main/User/index',$data);
    }
}
