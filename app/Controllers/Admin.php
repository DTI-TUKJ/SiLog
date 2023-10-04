<?php

namespace App\Controllers;
use App\Models\TestingModel;
use App\Models\LoginModel;


class Admin extends BaseController
{
    public function __construct()
    {
        // session_start();
         $this->validation =  \Config\Services::validation();
         $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();
        $this->TM = new TestingModel();
        $this->LM = new LoginModel();
   
    }
    public function index()
    {   
        if (session()->id!=null){
            return redirect()->to(base_url(''));
        }
        if (!isset($_POST['simpan'])) {
            $data = [
                'titletab' => 'Mitra',
                'activemitra' => 'active',
            ];
            echo view('partials/login/index', $data);
        } else {
     
            $this->validation->setRules([

                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'email/username tidak boleh kosong',
                    ],
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'password tidak boleh kosong',

                    ],

                ],

            ]);

            $isDataValid = $this->validation->withRequest($this->request)->run();
            $getuser = $this->LM->getUsers($this->request->getPost('email'));
            // print_r($getuser);
            if (isset($getuser)) {
                $cekusername = true;
                if ($getuser['password'] == md5(md5($this->request->getPost('password')))) {
                    $cekpasword = true;
                } else {
                    $cekpasword = false;
                }
            } else {
                $cekusername = null;
                $cekpasword = null;

            }
        
            if ($isDataValid && $cekusername && $cekpasword) {
                session()->set($getuser);
                //print_r(session()->get());
                return redirect()->to(base_url(''));
            } else {

                $data['validation'] = $this->validation;
                $data['cekusername'] = $cekusername;
                $data['cekpasword'] = $cekpasword;
                //print_r($data['validation']->getErrors());
                  echo view('partials/login/index', $data);
            }
        }
    }

     public function Logout()
    {
        session()->destroy();
        return redirect()->to(base_url(''));
    }
      
}
