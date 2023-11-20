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
            $getDataSession=$this->LM->getDataSession($this->request->getPost('email'));
            if (isset($getuser)) {
                $cekusername = true;
                if ($getuser['password'] == md5(md5($this->request->getPost('password')))) {
                    $cekpasword = true;
                } else {
                    $cekpasword = false;
                }
            } else {
                $cekusername = false;
                $cekpasword = null;

            }
        
            if ($isDataValid && $cekusername && $cekpasword) {
                session()->set($getDataSession);
                //print_r(session()->get());
                return redirect()->to(base_url('Silo'));
            } else {

                $data['validation'] = $this->validation;
                $data['cekusername'] = $cekusername;
                $data['cekpasword'] = $cekpasword;
                // print_r($data);
                //print_r($data['validation']->getErrors());
                // echo $_SERVER['REQUEST_URI'];
                echo view('partials/login/index', $data);
            }
        }
    }

    public function pgwSignin()
    {   
        

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
            $acc      =  array('username' => $this->request->getPost('email'),'password' => $this->request->getPost('password'));
            $getToken = GetToken($acc);

            if (isset($getToken->token)){
                $cekusername = true;
                $cekpasword = true;

            }else{
                if (strpos($getToken->message, "password") !== false) {
                   
                     $cekpasword=false;
                     $cekusername=null;
                } else {
                    $cekusername = false;
                     $cekpasword=null;
                  
                }
            }
            
              
            if ($isDataValid && $cekusername && $cekpasword) {
                $profile  = GetProfile($getToken->token);
                $position = GetPosition($profile->identitynumber, $getToken->token );
                $contact  = GetContact($profile->identitynumber, $getToken->token );
                foreach ($contact as $value) {
                    if ($value->id_contacttype==8 ){
                      $wa = $value->account_value;
                    }else if($value->id_contacttype==11 ){
                      $phone = $value->account_value;
                    }else if ($value->id_contacttype==1 ){
                        if (strpos($value->account_value, "@gmail.com") !== false){
                            $email=$value->account_value;
                        }else{
                            $email=$profile->user.'@telkomuniversity.ac.id';
                        }
                    }
                }

                 $dataEmp=array(
                    'nip_emp'=> $profile->numberid,
                    'name_emp'=>$profile->fullname,
                    'unit_emp'=>'',
                    'email'=>$email,
                    'position'=>'Pegawai',
                    'no_tlp'=>isset($wa)?$wa:$phone,
                    'type'=>'pegawai'
                 );
                 session()->set($dataEmp);
                //print_r(session()->get());
                return redirect()->to(base_url('Silo'));
            } else {

                $data['validation'] = $this->validation;
                $data['cekusername'] = $cekusername;
                $data['cekpasword'] = $cekpasword;
                //print_r($data['validation']->getErrors());
                  echo view('partials/login/index', $data);
            }
        }
    }

    public function tesapi(){
        $acc      =  array('username' => 'sofyanhadihidayat','password' => 'Hady@0305');
        $profile  = GetProfile(GetToken($acc));
        $position = GetPosition($profile->identitynumber,GetToken($acc) );
        $contact  = GetContact($profile->identitynumber,GetToken($acc) );
        // print_r($profile);
        // print_r($position);
        $wa='';
        $phone='';
        foreach ($contact as $value) {
            if ($value->id_contacttype==8 ){
              $wa = $value->account_value;
            }else if($value->id_contacttype==11 ){
              $phone = $value->account_value;
            }
        }

         $dataEmp=array(
            'nip_emp'=> $profile->numberid,
            'name_emp'=>$profile->fullname,
            'unit_emp'=>'',
            'position'=>'Pegawai',
            'no_tlp'=>isset($wa)?$wa:$phone,
         );

         print_r($dataEmp);
    }

     public function Logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Silo'));
    }
      
}
