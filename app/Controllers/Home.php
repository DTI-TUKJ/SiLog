<?php

namespace App\Controllers;
use App\Models\TestingModel;
use App\Models\LoginModel;

class Home extends BaseController
{
    public function __construct()
    {
        // session_start();
        // $this->validation =  \Config\Services::validation();
        $this->TM = new TestingModel();
        $this->LM = new LoginModel();
     
   
    }
    public function index()
    { 

        return view('main/dashboard/index');
    }
}
