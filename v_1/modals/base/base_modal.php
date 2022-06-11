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
        $this->conn = $conn;
    }

    /********************
    // PUBLIC FUNC
    *********************/
    public function testDB()
    {
        $this->conn->openConnection();
        $this->conn->closeConnection();
    }
}

