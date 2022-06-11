<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 8/13/2018
 * Time: 11:38 PM
 */

class TimeStampModel
{
    private $table;
    private $fields;

    public function __construct(){
        $this->table = Config::$db["time_stamp"]["table"];
        $this->setFields();
    }

    public function getFields(){
        return $this->fields;
    }

    public function setFields(){
        $this->fields = Config::$db["time_stamp"]["field"];
    }

    private function getConn(){
        $hostname = Config::$db["hostname"];
        $username = Config::$db["username"];
        $password = Config::$db["password"];
        $database = Config::$db["database"];
        $conn = mysqli_connect($hostname, $username, $password, $database);
        if(!$conn){
            throw new Exception("Error: Unable to connect to Database: {$database}");
        }
        return $conn;
    }

    private function closeConn($conn){
        mysqli_close($conn);
    }


    public function getTimeStampList(){
        $conn = $this->getConn();
        $sql = "SELECT * FROM {$this->table}";
        $result = mysqli_query($conn, $sql);
        $this->closeConn($conn);

        $output = array();
        while($row = mysqli_fetch_array($result)){
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
            }
            array_push($output, $_output);
        }

        return $output;
    }

    public function insertTimeStamp($data){
        $conn = $this->getConn();
        $sql = "INSERT INTO {$this->table} (user, purpose) VALUES ({$data['user']}, {$data['purpose']})";
        mysqli_query($conn, $sql);
        $affected_row = mysqli_affected_rows($conn);
        $this->closeConn($conn);

        return $affected_row;
    }

    public function endTimeStamp($data){
        $conn = $this->getConn();
        $sql = "UPDATE {$this->table} SET end=CURRENT_TIMESTAMP WHERE id='{$data['id']}'";
        mysqli_query($conn, $sql);
        $affected_row = mysqli_affected_rows($conn);
        $this->closeConn($conn);

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
        $time = date("H:i", strtotime($end) - strtotime($start));
        //$time = date_diff($start_date, $end_date);

        return $time;
    }
}