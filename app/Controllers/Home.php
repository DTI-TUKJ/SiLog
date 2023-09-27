<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {   $dataview=array(
                        "data_1"=>"content",
                        "data_2"=>array(
                                    "data_head"=>"header"
                                )
                        );
        return view('main/example', $dataview);
    }
}
