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
					case("update"):
						$this->updateTimeStamp();
						break;
					case("delete"):
						$this->deleteTimeStamp();
						break;
					case("logout"):
						$this->ion_auth->logout();
						redirect(BASE_URL, 'refresh');
						break;
				}
			}
			$data = $this->readTimeStamp();
			$this->load->view('timestamp', $data);
		} catch (Exception $error){
			$data['error'] = $error;
			$this->load->view('timestamp', $data);
		}
	}

	public function readTimeStamp(){
//		$project = $this->ion_auth->getProject();
		$project = "lccs";
		$this->load->model("TimeStampModel");
		$time_stamp_list = $this->TimeStampModel->getTimeStampList($project);

		if($time_stamp_list){
			$data["time_stamp_header"] = $this->TimeStampModel->getFields();
			$data["time_stamp_list"] = $time_stamp_list;
			$data["time_total"] = $this->TimeStampModel->getTotalTime();
			$data["payable"] = $this->TimeStampModel->getPayable();
			$data["groups"] = array();
			return $data;
		} else {
			throw new Exception("Read data missing");
		}
	}
}
