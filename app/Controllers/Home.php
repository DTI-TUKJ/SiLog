<?php

namespace App\Controllers;
use App\Models\TestingModel;


class Home extends BaseController
{
    public function __construct()
    {
        // session_start();
        // $this->validation =  \Config\Services::validation();
        $this->TM = new TestingModel();
     
   
    }
    public function index()
    { 
    
      $dataview=array(
                        "data_1"=>"content",
                        "data_2"=>array(
                                    "data_head"=>"header"
                                )
                        );


        return view('main/dashboard/index', $dataview);
    }
}
