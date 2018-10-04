<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->input->get("admin")){
			$this->admin();
		}
		$this->load->view("front/base");
	}

	public function admin(){
		if(!$this->ion_auth->logged_in()){
			redirect(USER_URL . 'login', 'refresh');
		}
		redirect(TIMESTAMP_URL, 'refresh');
	}
}

class MY_Auth_Controller extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

}
