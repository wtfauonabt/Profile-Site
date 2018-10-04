<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 9/26/2018
 * Time: 10:00 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class TimeStamp extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		if(!$this->ion_auth->logged_in()){
			redirect(USER_URL . 'login', 'refresh');
		}
		try{
			if(isset($_GET["action"])){
				$action = $_GET["action"];
				switch ($action) {
					case("create"):
						$this->createTimeStamp();
						break;
//					case("update"):
//						$this->updateTimeStamp();
//						break;
//					case("delete"):
//						$this->deleteTimeStamp();
//						break;
					case("invoice"):
						$this->generateInvoice();
						return;
						break;
					case("logout"):
						redirect(USER_URL . '/logout', 'refresh');
						break;
				}
			}
			$data = $this->readTimeStamp();
			$this->load->view('timestamp', $data);
		} catch (Exception $error){
			$data['error'] = $error;
			$this->load->view('admin/timestamp', $data);
		}
	}

	public function readTimeStamp(){
//		$project = $this->ion_auth->getUser();
//		var_dump($project);
		$project = "lccs";
		$this->load->model("admin/TimeStampModel");
		$time_stamp_list = $this->TimeStampModel->getTimeStampList($project);

		if($time_stamp_list){
			$data["time_stamp_header"] = $this->TimeStampModel->getFields();
			$data["time_stamp_list"] = $time_stamp_list;
			$data["time_total"] = $this->TimeStampModel->getTotalTime();
			$data["payable"] = $this->TimeStampModel->getPayable();
			$data["admin"] = $this->ion_auth->is_admin();
			var_dump($data["admin"]);
			return $data;
		} else {
			throw new Exception("Read data missing");
		}
	}

	public function generateInvoice(){

		$this->load->model('admin/InvoiceModel');

		$data = $this->readTimeStamp();

		$data["today_date"] = date('dS \of F Y');
		$data["invoice_num"] = $this->InvoiceModel->generateNumber();
		$data["due_date"] = $this->InvoiceModel->generateDue($data["time_stamp_list"]);


		$data["customer_name"] = "LCCS";
		$data["customer_address"] = "Unit C, 8/F., King Palace Plaza, No.55 King Yip Street, Kwun Tong, Kowloon";

		$data["time_stamp_header"] = $this->InvoiceModel->getFields();

		$this->load->view("admin/invoice", $data);
	}

	public function createTimeStamp(){
		$this->load->model("TimeStampModel");
	}
}
