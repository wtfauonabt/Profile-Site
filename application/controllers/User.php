<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
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

	public function login()
	{
		if($this->ion_auth->logged_in()){
			redirect(TIMESTAMP_URL, 'refresh');
		}
		$data = array();
		if($this->input->post()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$remember = (bool) $this->input->post('remember');
			if ($this->ion_auth->login($email, $password, $remember))
			{
				redirect(BASE_URL, 'refresh');
			} else {
				$data['message'] = $this->ion_auth->errors();
			}
		}
		$this->load->view('login', $data);
	}

	public function logout()
	{
		$this->ion_auth->logout();
		redirect(BASE_URL, 'refresh');
	}

	public function hiddenregister()
	{
		$username = 'vincent';
		$password = 'mHqZp3Kz';
		$email = 'vincent@lccs.com.hk';
		$additional_data = array(
			'first_name' => 'Vincent',
			'last_name' => '',
		);
		$group = array('2');

		$this->ion_auth->register($username, $password, $email, $additional_data, $group);
	}
}
