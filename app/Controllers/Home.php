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
    {   $dataview=array(
                        "data_1"=>"content",
                        "data_2"=>array(
                                    "data_head"=>"header"
                                )
                        );

        // $tesdata=$this->TM->tesGetData();
        // print_r($tesdata);
        return view('main/example', $dataview);
    }
}
