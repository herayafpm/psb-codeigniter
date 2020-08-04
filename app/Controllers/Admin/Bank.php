<?php namespace App\Controllers\Admin;

use App\Models\BankModel;
class Bank extends AdminBaseController
{
    protected $bankModel;
    public function __construct(Type $var = null) {
        $this->bankModel = new BankModel();
    }
	public function index()
	{
        $app_name = $this->app_name;
        $meta = [
            'title' => 'Halaman Bank',
            'description' => 'Sebuah halaman bank atm admin untuk website psb',
            'keywords' => 'bank,admin,psb'
        ];
        $session = $this->session;
        $limit = 10;
        $page = $this->request->getVar('page') ?? 1;
        $offset = ($page > 1)?$page * $limit:0;
        $countBank = $this->bankModel->countAll();
        $pagination = ceil($countBank / $limit);
        $cari = $this->request->getVar('cari');
        if(!empty($cari)){
            $banks = $this->bankModel->search($cari);
        }else{
            $banks = $this->bankModel->findAll($limit,$offset);
        }
		return view('admin/bank/index',compact('app_name','meta','session','page','banks','pagination','cari'));
    }
    public function detail($id)
    {
        $bank = $this->bankModel->find($id);
        $app_name = $this->app_name;
        $meta = [
            'title' => 'Halaman Tambah Bank',
            'description' => 'Sebuah halaman tambah Bank atm admin untuk website psb',
            'keywords' => 'tambah,bank,admin,psb'
        ];
        $session = $this->session;
        $validation =  \Config\Services::validation();
        return view('admin/bank/detail',compact('app_name','meta','session','validation','bank'));
    }
    public function tambah_view()
    {
        $app_name = $this->app_name;
        $meta = [
            'title' => 'Halaman Tambah Bank',
            'description' => 'Sebuah halaman tambah Bank atm admin untuk website psb',
            'keywords' => 'tambah,bank,admin,psb'
        ];
        $session = $this->session;
        $validation =  \Config\Services::validation();
        return view('admin/bank/tambah',compact('app_name','meta','session','validation'));
    }
    public function tambah_proc()
    {
        $tambah_rule = [
            'kode_bank' => ['label' => 'Kode Bank', 'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'nama_bank' => ['label' => 'Nama Bank', 'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'no_rek' => ['label' => 'No Rek.', 'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'atas_nama' => ['label' => 'Atas Nama', 'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ];
        if(!$this->validate($tambah_rule)){
            return redirect()->back()->withInput();
        }
        $this->bankModel->insert($this->request->getVar());
        $session = $this->session;
        $session->setFlashdata('success', 'Berhasil menambah Bank');
        return redirect()->to('/admin/bank')->withInput();
    }
    public function ubah_view($id)
    {
        $app_name = $this->app_name;
        $meta = [
            'title' => 'Halaman Tambah Bank',
            'description' => 'Sebuah halaman tambah Bank atm admin untuk website psb',
            'keywords' => 'tambah,bank,admin,psb'
        ];
        $session = $this->session;
        $validation =  \Config\Services::validation();
        $bank = $this->bankModel->find($id);
        return view('admin/bank/ubah',compact('app_name','meta','session','validation','bank'));
    }
    public function ubah_proc($id)
    {
        $ubah_rule = [
            'kode_bank' => ['label' => 'Kode Bank', 'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'nama_bank' => ['label' => 'Nama Bank', 'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'no_rek' => ['label' => 'No Rek.', 'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'atas_nama' => ['label' => 'Atas Nama', 'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ];
        if(!$this->validate($ubah_rule)){
            return redirect()->back()->withInput();
        }
        $this->bankModel->update($id,$this->request->getVar());
        $session = $this->session;
        $session->setFlashdata('success', 'Berhasil mengubah Bank ');
        return redirect()->to('/admin/bank')->withInput();
    }
    public function delete($id)
    {
        $this->bankModel->delete($id);
        $session = $this->session;
        $session->setFlashdata('success', 'Berhasil menghapus Bank');
        return redirect()->to('/admin/bank')->withInput();
    }

	//--------------------------------------------------------------------

}
