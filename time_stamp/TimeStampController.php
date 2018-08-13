<?php
/**
 * Purpose: CRUD Interface for time stamp
 * User: stanley
 * Date: 8/13/2018
 * Time: 11:29 PM
 */

require_once(__DIR__.'/TimeStampModel.php');

class TimeStampController{

    public function __construct(){
    }

    public function index(){
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
                    case("update"):
                        $this->deleteTimeStamp();
                        break;
                }
            }
            $this->readTimeStamp();
            include (__DIR__."/TimeStampView.php");
        } catch (Exception $error){
            $_SESSION['error'] = $error;
            include (__DIR__."/TimeStampView.php");
        }
    }


    public function createTimeStamp(){
        if($_SERVER['REQUEST_METHOD'] != "POST"){
            throw new Exception("Must Post");
        }
        $data = array();
        $data['name'] = $_POST['name'];
        $data['purpose'] = $_POST['purpose'];
        $model = new TimeStampModel();
        $success = $model->insertTimeStamp($data);
        if(!$success){
            throw new Exception("Create failed");
        }
        $this->showMessage("Record created successfully");
    }

    public function readTimeStamp(){
        $model = new TimeStampModel();
        $time_stamp_list = $model->getTimeStampList();
        if($time_stamp_list){
            $_SESSION["time_stamp_header"] = $model->getFields();
            $_SESSION["time_stamp_list"] = $time_stamp_list;
        } else {
            throw new Exception("Read data missing");
        }
    }

    public function updateTimeStamp(){
        if(!isset($_POST["data"])){
            throw new Exception("Update data missing");
        }
    }

    public function deleteTimeStamp(){
        if(!isset($_POST["data"])){
            throw new Exception("Delete data missing");
        }


    }

    private function showMessage($message){
        $_SESSION['message'] = $message;
        $this->index();
    }
}