<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\MyassetModel;
use App\Models\LoanModel;

class Loan extends BaseController
{
    public function __construct()
    {
        // session_start();
        $this->validation =  \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->req = \Config\Services::request();
        $this->email = \Config\Services::email();
        $this->MAM = new MyassetModel($this->req);
        $this->LM = new LoanModel($this->req);

   
    }

    public function index()
    {
            if (session()->id==null || session()->type=='pegawai'){
                return redirect()->to(base_url('Silo'));
            }
             $data=array(
                        "data_asset"=>$this->MAM->getAssetByOwner(),
                        );
         return view('main/loan/index', $data);
    }

     public function dataJson()
    {
      
            // $periode = $this->request->getPost("periode");
            $lists = $this->LM->get_datatables();
            //print_r($lists);
            $data = [];
            //$no = $this->request->getPost("start");

            foreach ($lists as $val) {
               // $no++;
                $row = [];

                $row[]=' <span class="tb-amount">'.$val['nip'].' </span>';
                $row[]=' <span class="tb-amount">'.$val['name'].' </span>';
                $row[]=' <span class="currency">'.$val['activity'].' </span>';
                $row[]='<span class="currency">'.$val['unit'].'</span>';


                $ur_img= base_url('').'/assets/images/item/'.$val['asset_image'];
                  

                $row[]='<div class="user-card">
                            <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                              <img class="user-avatar" src="'.$ur_img.'" alt="" srcset="" class="profile-img" style="object-fit: cover;">
                            </div>
                            <div class="user-info">
                                <span class="tb-lead">'.$val['asset_name'].'<span class="dot dot-success d-md-none ms-1"></span></span>
                                                                 
                            </div>
                        </div>';
                $row[]='<span class="currency">'.$val['amount_loan'].'</span>';
                $row[]=' <span class="tb-amount">'.date('d/m/Y - H:i',strtotime($val['tanggal_pinjam'])).' </span>';
                $row[]=' <span class="tb-amount">'.date('d/m/Y - H:i',strtotime($val['tanggal_kembali'])).' </span>';

                (!isset($val['tanggal_masuk']))?$date_in = '-':$date_in=date('d/m/Y - H:i',strtotime($val['tanggal_masuk']));

                $row[]=' <span class="tb-amount">'.$date_in.' </span>';

                if($val['status']==1){

                  $status=' <span class="tb-status text-success">Accepted</span>';
                }else if($val['status']==0){
                    $status=' <span class="tb-status text-warning">Pending</span>';
                }else if($val['status']==3){
                     $status=' <span class="tb-status text-info">Finish</span>';
                }else{
                     $status=' <span class="tb-status text-danger">Rejected</span>';
                }
                $row[]=$status;
                    $btnacc='';
                    if ($val['status']==1){
                        if (date('Y-m-d H:i:s')>=$val['tanggal_pinjam']){

                           $btnacc='<a class="btn btn-sm btn-warning "  onclick="upStatusLoan(\''.$val['id_loan'].'\',\'finish\')">End Loan</a>';
                        }
                    }else if ($val['status']==0){
                               $btnacc='<a class="btn btn-sm btn-success " title="Accept"  onclick="upStatusLoan(\''.$val['id_loan'].'\',\'accept\')"><i class="icon fa-solid fa-check"></i></a>
                                    <a class="btn btn-sm btn-danger " title="Reject" onclick="upStatusLoan(\''.$val['id_loan'].'\',\'reject\')"><i class="icon fa-solid fa-xmark"></i></a>';
                    }
                  

                $row[]=$btnacc.'
                        <a class="btn btn-danger" onclick="deletedata(\''.$val['id_loan'].'\')"><i class="fa-solid fa-trash"></i></a>';
                
                $data[] = $row;
            }
            $output = [
                "draw" => $this->request->getPost('draw'),
                "recordsTotal" => $this->LM->count_all(),
                "recordsFiltered" => $this->LM->count_filtered(),
                "data" => $data
            ];
            echo json_encode($output);
 
    }

    public function addLoan()
    {    
    

        if (session()->nip_emp==null){
            return false;
        }

        $max_req=$this->request->getPost('max_req');
        if (session()->type=='pegawai'){
            $this->validation->setRules([
              
                      'amount_loan' =>[
                        'rules'=>'required|greater_than_equal_to['.$max_req.']',
                        // rules greater_than_equal_to sudah dirubah defaultnya
                        'errors'=>[
                               'required'=>'jumlah loan Belum diisi',
                                'greater_than_equal_to'=>'Jumlah pinjaman lebih dari unit yang tersedia'
                        ],
                        
                    ],
                    'activity'=>[
                         'rules'=>'required',
                         'errors'=>[
                                'required'=>'Aktivitas Belum diisi',
                            ],

                        ],

                ]);
        }else{
                $this->validation->setRules([
                  
                    'nip'=>[
                         'rules'=>'required',
                         'errors'=>[
                                'required'=>'Nip Belum diisi',

                            ],

                        ],
                     'name_loaner'=>[
                         'rules'=>'required',
                         'errors'=>[
                                'required'=>'Nama Peminjam Belum diisi',
                            ],

                        ],

                    'unit' =>[
                        'rules'=>'required',
                        'errors'=>[
                               'required'=>'Unit Belum diisi',
                        ]
                    ],
                     'contact' =>[
                        'rules'=>'required',
                        'errors'=>[
                               'required'=>'Kontak Belum diisi',

                        ]
                    ],
                      'amount_loan' =>[
                        'rules'=>'required|greater_than_equal_to['.$max_req.']',
                        // rules greater_than_equal_to sudah dirubah defaultnya
                        'errors'=>[
                               'required'=>'jumlah loan Belum diisi',
                                'greater_than_equal_to'=>'Jumlah pinjaman lebih dari unit yang tersedia'
                        ]
                    ],
                    'activity'=>[
                         'rules'=>'required',
                         'errors'=>[
                                'required'=>'Aktivitas Belum diisi',
                            ],

                        ],



                ]);
        }
        $isDataValid = $this->validation->withRequest($this->request)->run();
         

        if ($isDataValid) {
            
           
             $id_asset=$this->request->getPost('id_asset');
             $date_loan= explode(' to ', $this->request->getPost('loan_date'));

             $date_start=date('Y-m-d H:i:s', strtotime($date_loan[0]));
             $date_end=date('Y-m-d H:i:s', strtotime($date_loan[1]));

            $data = array(
                'nip'            => session()->type=='pegawai'? session()->nip_emp :$this->request->getPost('nip'),
                'name'           => session()->type=='pegawai'? session()->name_emp :$this->request->getPost('name_loaner'),
                'unit'            => session()->type=='pegawai'? '' :$this->request->getPost('unit'),
                'tanggal_pinjam'   => $date_start,
                'tanggal_kembali'   =>$date_end,
                'status'          => session()->type=='pegawai'? 0 :1,
                'no_telepon'        => session()->type=='pegawai'? session()->no_tlp :$this->request->getPost('contact'),
                'amount_loan'       => $this->request->getPost('amount_loan'),
                'id_asset_loan'   =>$this->request->getPost('id_asset'),
                'activity'        => $this->request->getPost('activity'),
                         
            );
            $this->LM->createLoan($data);
            if (session()->type=='pegawai'){
                $namapeminjam = $data['name'].' ( '.$data['nip'].') ';
                $this->sendEmailRequest($namapeminjam, $this->request->getPost('email'));
            }
           //print_r($data);
           echo json_encode(array('status' => 'ok;', 'text' => ''));
        } else {
           $validation = $this->validation;
            $error=$validation->getErrors();
           
            $dataname=$_POST;
                  //print_r($error);
            echo json_encode(array('status' => 'error;', 'text' => '', 'data'=>$error,'dataname'=>$dataname));
        }
    }

    public function deleteLoan()
    {

         if (session()->id==null){
            return false;
        }
     
        $id = $this->request->getPost('id_loan');
        $this->LM->deleteLoan($id);

        echo json_encode(array('status' => 'ok;', 'text' => ''));

    }

    public function modalEdit()
    {
        if (session()->id==null){
            return false;
        }

      $id=$this->request->getPost('id');
      $datajbt=$this->MAM->getById($id);
      
      $imgsize=filesize('assets/images/item/'.$datajbt['asset_image']);
            // print_r($dataatasan); 
      //dd($datajbt);
       echo json_encode(array('status' => 'ok;', 'data'=>$datajbt, 'imgsize'=> $imgsize));
    }


    public function ScheduleCheck(){


        $this->validation->setRules([
          
            'asset_name'=>[
                 'rules'=>'required',
                 'errors'=>[
                        'required'=>'Nama Asset Belum diisi',

                    ],

                ],
             'loan_date'=>[
                 'rules'=>'required|min_length[18]',
                 'errors'=>[
                        'required'=>'Tanggal Pinjam Belum diisi',
                        'min_length'=>'format tidak sesuai' 

                    ],

                ],   


        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if ($isDataValid) {
             $id_asset=$this->request->getPost('asset_name');
             $dataasset=$this->MAM->getByIdRow($id_asset);
             //print_r($dataasset);
             //die();
             $date_loan= explode(' to ', $this->request->getPost('loan_date'));
             
             $date_start=date('Y-m-d H:i:s', strtotime($date_loan[0]));
             $date_end=date('Y-m-d H:i:s', strtotime($date_loan[1]));
             $check_asset =$this->LM->checkScheduleAvailable($id_asset, $date_start, $date_end);
             if(count($check_asset)==0){
                $data=array(
                        'id_asset'=>$id_asset,
                        'date_loan'=> $this->request->getPost('loan_date'),
                        'data_asset'=>$this->MAM->getAssetByOwner(),
                        'max_req'=>$dataasset['amount_asset']
                        );
               echo json_encode(array('status' => 'ok;', 'text' => '', 'data'=>$data));
             }else{

                $in_loan=0;
                foreach ($check_asset as $value) {
                    $in_loan += $value['amount_loan'];
                }
                $max_req=$dataasset['amount_asset']-$in_loan;
                if ($max_req>0){
                   $data=array(
                        'id_asset'=>$id_asset,
                        'date_loan'=> $this->request->getPost('loan_date'),
                        'data_asset'=>$this->MAM->getAssetByOwner(),
                        'max_req'=>$max_req
                        );
                    echo json_encode(array('status' => 'ok;', 'text' => '', 'data'=>$data)); 
                }else{
                    echo json_encode(array('status' => 'ok;','status_check'=>'unavailable', 'text' => '', 'data'=>null));
                }
                
             }

        }else{
            $validation = $this->validation;
            $error=$validation->getErrors();
            $dataname=$_POST;
                  //print_r($error);
            echo json_encode(array('status' => 'error;', 'text' => '', 'data'=>$error,'dataname'=>$dataname));
        
        }

       
        //print_r($date_loan);
         
        
        //echo json_encode(array('status' => 'ok;', 'text' => '', 'data'=>$data));
    }

     public function updateStatusLoan()
    {

         if (session()->id==null){
            return false;
        }
       
        $id = $this->request->getPost('id_loan');
        $action= $this->request->getPost('action');
        
        if ($action=='finish'){
            $st=3;
             $data = array(
                'status'  => $st,
                'tanggal_masuk'=>date('Y-m-d H:i:s')
            );
        }else if ($action=='accept'){
            $st=1;
             $data = array(
                'status'  => $st,
                );
        }else{
            $st=2;
            $data = array(
                'status'  => $st,
             );
        }

       
        $this->LM->upStatusLoan($data,$id);

        echo json_encode(array('status' => 'ok;', 'text' => ''));
    }

    public function history()
    {
         if (session()->nip_emp==null){
                return redirect()->to(base_url('Silo/Signin'));
            }

        $data = [
            'title' => 'Loan History',
            'data' => $this->LM->loanHistory()
        ];
        //echo htmlspecialchars(view('main/loan/history'));
        return view('main/loan/history',$data);
    }

    protected function sendEmailRequest($namapeminjam,$email)
    {

        $this->email->setFrom('dtitelujkt@gmail.com', 'Silo');
        $this->email->setTo($email);
        $this->email->setSubject('Incoming Loan Request');

        $filename = 'images/logo_silo.png';
        $this->email->attach($filename);

        $data=array(
             'cid' =>  $this->email->setAttachmentCID($filename),
             'name_loaner'=>$namapeminjam,
            );

         //print_r($data);
        $this->email->setMessage(view('main/mail/request_mail', $data));

        if (!$this->email->send()) {
            // echo "gagal";
            return false;
        } else {
           // echo "berhasil";
            return true;
        }
    }

}

?>