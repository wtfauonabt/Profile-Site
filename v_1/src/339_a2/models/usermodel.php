<?php
/***********************************
159339 Assignment 2
--------------------------------------
Name: Chi Fung Stanley Yeung
ID: 15316357
--------------------------------------
Purpose:
Stores information of current signed in user.

Contains functions for sign in, sign out and sign up.
*************************************/
class UserModel{

    private $user;
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
    public function getUser()
    {
        return $this->user;
    }

    public function logIn($user_name, $user_pass)
    {
        $this->checkPass($user_name, $user_pass);

        if(!$this->user->getId())
            throw new Exception("Unable to match user name and password.");

        return $this->user->getId();
    }

    public function logOut()
    {
        // Checked that there is a current user
        if(!$this->user)
            throw new Exception("Not signed in.");

        $this->user->setId(NULL);
        $this->user->setName(NULL);
    }

    public function signUp($user_name, $user_pass)
    {
        $user_name = $this->conn->sanitize($user_name);
        $user_pass = $this->conn->sanitize($user_pass);
        $sql = "INSERT INTO Users(user_name, user_pass) VALUES ('" . $user_name . "', '" . $user_pass . "')";
        $this->conn->executeStatement($sql);
    }

    /********************
    // PRIVATE FUNC
    *********************/
    private function checkPass($user_name, $user_pass)
    {

        $user_name = $this->conn->sanitize($user_name);
        $user_pass = $this->conn->sanitize($user_pass);

        $sql = "SELECT * FROM Users WHERE user_name = '" . $user_name . "'";

        $res = $this->conn->executeStatement($sql);

        //if ($res['user_pass'] == $user_name) echo "Wow";
        if (mysqli_num_rows($res)  < 1) throw new Exception("Unable to match user name.");
        // Checks password
        $res = $res->fetch_assoc();
        if ($res['user_pass'] == $user_pass){
            $this->user->setId($res['user_id']);
            $this->user->setName($res['user_name']);
        } else {
            throw new Exception("Unable to match password.");
        }
    }
}
