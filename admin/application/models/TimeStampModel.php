<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 9/26/2018
 * Time: 10:07 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class TimeStampModel extends CI_Model
{
	private $table;
	private $fields;

	private $time_total;
	private $payable;

	public function __construct(){
		parent::__construct();
		$this->table = "time_stamp";
		$this->setFields();
	}

	public function getFields(){
		return $this->fields;
	}

	public function setFields(){
		$this->fields["user"]     = "User";
		$this->fields["purpose"]  = "Purpose";
		$this->fields["start"]    = "Start";
		$this->fields["end"]      = "End";
		$this->fields["time"]     = "Time Used (Hours:Mins)";
		$this->fields["rate"]	  = "Hourly Rate";
		$this->fields["payable"]  = "Payable (HKD)";
		$this->fields["paid"]	  = "Paid";
	}


	public function getTimeStampList($project){
		$this->load->database("default");
		$sql = "SELECT * FROM {$this->table} WHERE project='{$project}'";
		$query = $this->db->query($sql);
		$this->db->close();

		$output = array();
		foreach($query->result() as $row){
			// Map with field
			$_output = array();
			foreach($row as $key => $value){
				if(array_key_exists($key, $this->fields)){
					$_output[$key] = $value;
				}
			}

			if(isset($_output["start"])){
				$_output["start"] = $this->addTimezone($_output["start"]);
			}
			if(isset($_output["end"])){
				$_output["end"] = $this->addTimezone($_output["end"]);
				$_output["time"] = $this->calcTime($_output["start"], $_output["end"]);

				if($_output["paid"] == "unpaid"){
					$_output["rate"] = $this->getHourlyRate($_output["end"]);
					$_output["payable"] = $this->getPayable($_output["time"]);
				}
			}
			array_push($output, $_output);
		}

		return $output;
	}

	public function insertTimeStamp($data){
		$this->load->database("default");
		$sql = "INSERT INTO {$this->table} (user, purpose) VALUES ({$data['user']}, {$data['purpose']})";
		$this->db->query($sql);
		$affected_row = $this->db->affected_rows();
		$this->db->close();

		return $affected_row;
	}

	public function endTimeStamp($data){
		$this->load->database("default");
		$sql = "UPDATE {$this->table} SET end=CURRENT_TIMESTAMP WHERE id='{$data['id']}'";
		$this->db->query($sql);
		$affected_row = $this->db->affected_rows();
		$this->db->close();

		return $affected_row;
	}

	/* Functions to change display time to correct timezone without affecting database */
	private function addTimezone($date){
		$eight_hours = 60 * 60 * 8;
		$changed_date = date("d-m-Y H:i:s", strtotime($date) + $eight_hours);
		return $changed_date;
	}

	private function revertTimezone($date){
		$eight_hours = 60 * 60 * 8;
		$changed_date = date("d-m-Y H:i:s", strtotime($date) - $eight_hours);
		return $changed_date;
	}

	private function calcTime($start, $end){
		$start_date = new DateTime($start);
		$end_date = new DateTime($end);
		$time_difference = strtotime($end) - strtotime($start);
		$this->time_total += $time_difference;

		$time_arr = $this->translateToSeconds($time_difference);
		$hours = sprintf("%02d", $time_arr['hours']);
		$mins = sprintf("%02d", $time_arr['mins']);;

		//$time = date_diff($start_date, $end_date);
		$time = "{$hours}:{$mins}";
		return $time;
	}

	public function getTotalTime(){
		if($this->time_total){
			$time_arr = $this->translateToSeconds($this->time_total);
			return ("{$time_arr['hours']}:{$time_arr['mins']}");
		}
		return NULL;
	}

	private function translateToSeconds($seconds){
		$hours = floor($seconds / 3600);
		$mins = floor(($seconds/ 60) % 60);
		return array('hours' => $hours, 'mins' => $mins);
	}

	public function getPayable($time = 0){
		if(!$time){
			$time_arr = $this->translateToSeconds($this->time_total);
		} elseif(is_string($time)){
			sscanf($time, "%d:%d", $hours, $minutes);
			$time_arr['hours'] = $hours;
			$time_arr['mins'] = $minutes;
		} else{
			$time_arr = $this->translateToSeconds($time);
		}

		$hours = $time_arr['hours'] * 200;
		$mins = round($time_arr['mins'] * 200 / 60, 2);
		$payable = $hours + $mins;
		$this->payable = $payable;
		return $this->payable;
	}

	private function getHourlyRate($end_time){
		$timestamp = strtotime('2018-09-16');
		if($end_time < $timestamp){
			return 200;
		}
		else return 300;
	}

}
