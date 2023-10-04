<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class MyassetModel extends Model
{
    protected $table = "ms_assets";
    protected $column_order = array(null,null,null, null, null,null);
    protected $column_search = array('asset_name', 'id_owner');
    protected $order = array('' => '');
    protected $request;
    protected $db;
    protected $dt;
 
    function __construct(RequestInterface $request)
    {
        parent::__construct();
        // $this->db = db_connect();
        $this->request = $request;
 
        $this->dt = $this->db->table($this->table);
    }
    private function _get_datatables_query()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }
 
        if ($this->request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->request->getPost('length') != -1){
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        }
    
            if(session()->type!='superadmin'){      
             $this->dt->where('id_owner', session()->type);
            }
            $this->dt->orderBy('asset_name', 'ASC');
       
        $query = $this->dt->get();
      
        return $query->getResultArray();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        
            if(session()->type!='superadmin'){      
             $this->dt->where('id_owner', session()->type);
            }
            $this->dt->orderBy('asset_name', 'ASC');

        return $this->dt->countAllResults();
    }
    public function count_all()
    {
        $tbl_storage = $this->db->table($this->table);

        return $tbl_storage->countAllResults();
    }

      public function rules()
    {
        return
            [
                'asset_name' =>
                [
                    'label'  => 'Nama Asset',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
               
                'description' =>
                [
                    'label'  => 'Description',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                
                'asset_type'    =>
                [
                    'label'  => 'Tipe Asset',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'asset_status'    =>
                [
                    'label'  => 'Status Asset',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                 'asset_owner'    =>
                [
                    'label'  => 'Pemilik Asset',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                 'asset_amount'    =>
                [
                    'label'  => 'Jumlah Asset',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                
            ];
    }

            public function rulesEdit()
    {
        return
            [
                'nama' =>
                [
                    'label'  => 'Nama Pegawai',
                    'rules'  => 'required|alpha_space',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                        'alpha_space'=>'{field} tidak boleh mengandung angka dan karakter'
                    ],
                ],
               
                'wa' =>
                [
                    'label'  => 'Whatsapp Number',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'email' =>
                [
                    'label'  => 'Email',
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                        'valid_email'=> '{field} mohon diisi dengan email yang benar',
                    ],
                ],
                'jabatan'    =>
                [
                    'label'  => 'Jabatan',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],
                'unit'    =>
                [
                    'label'  => 'Unit',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => ' {field} mohon diisi',
                    ],
                ],

                
            ];
    }

     public function createAsset($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }
    public function deleteAsset($id)
    {
        $query = $this->db->table($this->table)->delete(array('id_asset' => $id));
        return $query;
    }
    public function getById($id_asset)
    {
        return $this->where(['id_asset' => $id_asset])->first();
    }
}
