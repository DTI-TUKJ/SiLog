<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class User extends BaseController
{
    protected $LoginModel;
    
    public function __construct()
    {
         $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->req = \Config\Services::request();
        $this->email = \Config\Services::email();
        $this->LM = new LoginModel();
    }

    public function index()
    {
          if (session()->nip_emp==null){
                return redirect()->to(base_url('Silo/Signin'));
            }

        $data = [
            'title' => 'Users',
            'data' => $this->LM->getUsersAll(),
            'total' => $this->LM->countAll()
        ];
        return view('main/User/index', $data);
    }

    public function simpanData()
    {
          if (session()->nip_emp==null){
                return redirect()->to(base_url('Silo/Signin'));
            }
            
        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'adminName' => [
                'label' => 'Nama Admin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'type' => [
                'label' => 'Type',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
        ]);

        $adminName  = $this->request->getPost('adminName');
        $username   = $this->request->getPost('username');
        $password   = $this->request->getPost('password');
        $userType   = $this->request->getPost('userType');
        // dd($adminName,$username,$password,$userType);

        if (!$valid) {
            // dd('fail');
            $pesan = [
                'errorAdminName'=> '<div class="validate text-danger"><strong>' . $validation->getError('adminName') . '</strong></div>',
                'errorUsername' => '<div class="validate text-danger"><strong>' . $validation->getError('username') . '</strong></div>',
                'errorPassword' => '<div class="validate text-danger"><strong>' . $validation->getError('password') . '</strong></div>',
                'errorUserType' => '<div class="validate text-danger"><strong>' . $validation->getError('userType') . '</strong></div>',
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Silo/User');
        }else {
            // dd('success');
            $this->LM->insert([
                'username'  => $username,
                'password'  => $password,
                'type'      => $userType,
                'Admin_name'=> $adminName,
            ]);
            $pesan = [
                'sukses' => '<div class="alert alert-primary">User berhasil ditambahkan...</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Silo/User');
        }
    }




}
