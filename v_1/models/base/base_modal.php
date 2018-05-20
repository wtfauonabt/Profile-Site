<?php
/***********************************
Base Modal
*************************************/
class BaseModal{

    private $conn;

    /********************
    // Constructor
    *********************/
    public function __construct($conn){
        $this->user = new User();
        $this->conn = $conn;
    }

    /********************
    // PUBLIC FUNC
    *********************/
}

