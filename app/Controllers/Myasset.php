<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\MyassetModel;
use App\Models\LoginModel;

class Myasset extends BaseController
{
    public function __construct()
    {
        // session_start();
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->req = \Config\Services::request();
        $this->email = \Config\Services::email();
        $this->MAM = new MyassetModel($this->req);
        $this->LM = new LoginModel();
 
   
    }

    public function index()
    {
            if (session()->id==null){
                return redirect()->to(base_url(''));
            }
             $data=array(
                        "data_owner"=>$this->LM->findAll(),
                        );
         return view('main/ms_assets/index', $data);
    }

     public function dataJson()
    {
      
            // $periode = $this->request->getPost("periode");
            $lists = $this->MAM->get_datatables();
            //print_r($lists);
            $data = [];
            //$no = $this->request->getPost("start");

            foreach ($lists as $val) {
               // $no++;
                $row = [];
                $ur_img= base_url('').'/assets/images/item/default_room.jpg';
                  

                $row[]='<div class="user-card">
                            <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                              <img src="'.$ur_img.'" alt="" srcset="" class="profile-img" style="object-fit: cover;">
                            </div>
                            <div class="user-info">
                                <span class="tb-lead">Abu Bin Ishtiyak <span class="dot dot-success d-md-none ms-1"></span></span>
                                                                 
                            </div>
                        </div>';
                $row[]='<span class="currency">USD</span>';
                $row[]=' <span class="tb-status text-success">Active</span>';
                $row[]=' <span>05 Oct 2019</span>';
                $row[]=' <span class="tb-amount">35040.34 </span>';
                $row[]='<a href="#" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" class="btn btn-warning"><i class="fa-solid fa-trash"></i></a>';
                
                $data[] = $row;
            }
            $output = [
                "draw" => $this->request->getPost('draw'),
                "recordsTotal" => $this->MAM->count_all(),
                "recordsFiltered" => $this->MAM->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
 
    }

}

?>