<?php namespace App\Controllers\Admin;

class Dashboard extends AdminBaseController
{
	public function index()
	{
        $app_name = $this->app_name;
        $meta = [
            'title' => 'Halaman Dashboard',
            'description' => 'Sebuah halaman dashboard admin untuk website psb',
            'keywords' => 'dashboard,admin,psb'
        ];
        $session = $this->session;
		return view('admin/dashboard/index',compact('app_name','meta','session'));
	}

	//--------------------------------------------------------------------

}
