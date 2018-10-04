<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 9/30/2018
 * Time: 10:17 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceModel extends CI_Model
{

	private $fields;

	public function __construct(){
		parent::__construct();
		$this->table = "time_stamp";
		$this->setFields();
	}

	public function getFields(){
		return $this->fields;
	}

	public function setFields(){
		$this->fields["purpose"]  = "Purpose";
		$this->fields["time"]     = "Time Used (Hours:Mins)";
		$this->fields["rate"]	  = "Hourly Rate";
		$this->fields["payable"]  = "Payable (HKD)";
	}

	public function generateDue($time_stamp_list){
		$last_end = array_pop($time_stamp_list)["end"];
		$thrity_days = 60 * 60 * 24 * 30;
		return date('dS \of F Y', strtotime($last_end) + $thrity_days);

	}

	public function generateNumber(){
		$num = "LCCS".date("dmy");
		return $num;
	}
}
