<?php
namespace App\Controllers\Admin;
use CodeIgniter\Controller;
use App\Models\ProfileSekolahModel;
class AdminBaseController extends Controller
{
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		$profileSekolahModel = new ProfileSekolahModel();
		$this->profileSekolah = $profileSekolahModel->first();
		$this->app_name = getenv('APP_NAME');
		parent::initController($request, $response, $logger);
		$this->session = session();

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}

}
