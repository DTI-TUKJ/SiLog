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
            if (session()->id==null){
                return redirect()->to(base_url(''));
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
                $row[]=' <span class="tb-amount">'.(!isset($val['tanggal_masuk']))?'-':$val['tanggal_masuk'].' </span>';

                if($val['status']==1){

                  $status=' <span class="tb-status text-success">Accepted</span>';
                }else{
                    $status=' <span class="tb-status text-warning">Pending</span>';
                }
                $row[]=$status;
                    $btnaccdis='';
                    $val['status']==1?$btnaccdis='disabled':'';
                    $btnacc='<a class="btn btn-sm btn-success '.$btnaccdis.'"  onclick="">Accept</a>';
                

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
    // detail =$this->request->getPost('manager');
        // print_r($detail);

    if (session()->id==null){
            return false;
        }

    
        
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
                'rules'=>'required',
                'errors'=>[
                       'required'=>'jumlah loan Belum diisi',
                ]
            ],



        ]);

        $isDataValid = $this->validation->withRequest($this->request)->run();
         

        if ($isDataValid) {
            
           
             $id_asset=$this->request->getPost('id_asset');
             $date_loan= explode(' to ', $this->request->getPost('loan_date'));

             $date_start=date('Y-m-d H:i:s', strtotime($date_loan[0]));
             $date_end=date('Y-m-d H:i:s', strtotime($date_loan[1]));

            $data = array(
                'nip'            => $this->request->getPost('nip'),
                'name'           => $this->request->getPost('name_loaner'),
                'unit'            => $this->request->getPost('unit'),
                'tanggal_pinjam'   => $date_start,
                'tanggal_kembali'   =>$date_end,
                'status'          => 1,
                'no_telepon'        => $this->request->getPost('contact'),
                'amount_loan'       => $this->request->getPost('amount_loan'),
                'id_asset_loan'   =>$this->request->getPost('id_asset')
                         
            );
            $this->LM->createLoan($data);
           
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
             $date_loan= explode(' to ', $this->request->getPost('loan_date'));

             $date_start=date('Y-m-d H:i:s', strtotime($date_loan[0]));
             $date_end=date('Y-m-d H:i:s', strtotime($date_loan[1]));
             $check_asset =$this->LM->checkScheduleAvailable($id_asset, $date_start, $date_end);
             if(count($check_asset)==0){
                $data=array(
                        'id_asset'=>$id_asset,
                        'date_loan'=> $this->request->getPost('loan_date'),
                        'data_asset'=>$this->MAM->getAssetByOwner()
                        );
               echo json_encode(array('status' => 'ok;', 'text' => '', 'data'=>$data));
             }else{
                $data=null;
                 echo json_encode(array('status' => 'ok;','status_check'=>'unavailable', 'text' => '', 'data'=>$data));
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




}

?>