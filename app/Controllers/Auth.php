<?php namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\BankModel;
use App\Models\TahunAjaranModel;
use App\Models\KonfirmasiPendaftaranModel;
class Auth extends BaseController
{
	public function login_view()
	{
    $app_name = getenv('APP_NAME');
    $meta = [
      'title' => 'Halaman Login',
      'description' => 'Sebuah halaman login untuk website psb',
      'keywords' => 'login,psb'
    ];
    $validation = \Config\Services::validation();
    $session = \Config\Services::session();
		return view('auth/login',compact('app_name','meta','validation','session'));
  }
  public function login_proc()
  {
    $login_rule = [
      'username' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong!',
        ],
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} tidak boleh kosong!',
        ],
      ],
    ];
    if(!$this->validate($login_rule)){
      $validation = \Config\Services::validation();
      return redirect()->to('/auth/login')->withInput()->with('validation',$validation);
    }
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');
    $usersModel = new UsersModel();
    $user = $usersModel->authenticate($username,$password);
    $session = \Config\Services::session();
    if(!$user){
      $session->setFlashdata('message', 'Username atau password salah!');
      return redirect()->to('/auth/login')->withInput();
    }else{
       return redirect()->to('/');
    }
  }
  public function register_view()
  {
    $app_name = getenv('APP_NAME');
    $bankModel = new BankModel();
    $tahunAjaranModel = new TahunAjaranModel();
    $banks = $bankModel->where('status',1)->findAll();
    $meta = [
      'title' => 'Halaman Pendaftaran',
      'description' => 'Sebuah halaman Pendaftaran untuk website psb',
      'keywords' => 'Pendaftaran,psb'
    ];
    $tahunAjaran = $tahunAjaranModel->getByNow();
    $validation = \Config\Services::validation();
    $session = \Config\Services::session();
		return view('auth/register',compact('app_name','meta','validation','session','banks','tahunAjaran'));
  }
  public function pembayaran_view()
  {
    $app_name = getenv('APP_NAME');
    $meta = [
      'title' => 'Halaman Konfirmasi Pembayaran',
      'description' => 'Sebuah halaman Konfirmasi Pembayaran untuk website psb',
      'keywords' => 'Konfirmasi Pembayaran,psb'
    ];
    $validation = \Config\Services::validation();
    $session = \Config\Services::session();
		return view('auth/pembayaran',compact('app_name','meta','validation','session'));
  }
  public function pembayaran_proc()
  {
    $pembayaran_rule = [
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} lengkap tidak boleh kosong!',
        ],
      ],
      'email' => [
        'rules' => 'required|is_unique[users.email]|is_unique[konfirmasi_pendaftaran.email]|valid_email',
        'errors' => [
          'required' => '{field} tidak boleh kosong!',
          'is_unique' => '{field} sudah digunakkan akun lain!',
          'valid_email' => '{field} yang dimasukkan tidak valid!'
        ],
      ],
      'no_hp' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'No HP tidak boleh kosong!',
          'numeric' => 'No HP harus angka'
        ],
      ],
      'bukti' => [
        'rules' => 'uploaded[bukti]|max_size[bukti,1024]|is_image[bukti]|mime_in[bukti,image/jpeg,image/jpg,image/png]',
        'errors' => [
          'uploaded' => 'Pilih gambar terlebih dahulu!',
          'max_size' => 'Ukuran melebihi batas ukuran, max. 1 MB',
          'is_image' => 'Yang anda masukkan bukan gambar',
          'mime_in' => 'Yang anda masukkan bukan gambar',
        ],
      ],
    ];
    if(!$this->validate($pembayaran_rule)){
      // $validation = \Config\Services::validation();
      // return redirect()->to('/auth/pembayaran')->withInput()->with('validation',$validation);
      return redirect()->to('/auth/pembayaran')->withInput();
    }
    $nama = $this->request->getVar('nama');
    $email = $this->request->getVar('email');
    $no_hp = $this->request->getVar('no_hp');
    $fileBukti = $this->request->getFile('bukti');
    $namaBukti = 'bukti_'.$nama.'_'.$fileBukti->getRandomName();
    $fileBukti->move('img',$namaBukti);
    $data = [
      'nama' => $nama,
      'email' => $email,
      'no_hp' => $no_hp,
      'bukti' => 'img/'.$namaBukti,
    ];
    $konfirmasiModel = new KonfirmasiPendaftaranModel();
    $session = \Config\Services::session();
    if($konfirmasiModel->save($data)){
      $data = [
        'nama' => $nama,
        'email' => $email,
        'no_hp' => $no_hp,
        'bukti' => [FCPATH.'img/'.$namaBukti]
      ];
      helper('sendEmail');
      sendEmail([$this->profileSekolah['email']],'Konfirmasi Pendaftaran (Admin)',view('email/notif_konfirm_admin',compact('data')),$data['bukti']);
      $session->setFlashdata('success', 'Berhasil mengirimkan bukti ke admin, silahkan tunggu, kami akan mengirimkan detail selanjutnya di email!');
      return redirect()->to('/auth/pembayaran')->withInput();
    }else{
      $session->setFlashdata('error', 'Ada kesalahan!');
      return redirect()->to('/auth/pembayaran')->withInput();
    }

  }
	//--------------------------------------------------------------------

}
