<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = \Config\Services::session();
        $cekLogin = $session->has('isLoggedIn');
        if($cekLogin){
            if($request->uri->getPath() != 'auth/logout'){
                return redirect()->to('/');
            }
        }else{
            redirect()->to('/auth/login')->withInput();
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
    }
}