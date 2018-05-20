<?php
/***********************************
159339 Assignment 2
--------------------------------------
Name: Chi Fung Stanley Yeung
ID: 15316357
--------------------------------------
Purpose:
Simple custom Exception class.

Used to identify connection exceptions from other exceptions and perform
correct actions accordingly.
*************************************/

class ConnectException extends Exception
{

    /********************
    // Constructor
    *********************/
    public function ConnectException($message, $code=0)
    {
        parent::__construct($message, $code);
    }

    /********************
    // FUNCTIONS
    *********************/
    public function __toString()
    {
        return __CLASS__ . ": $this->message\n";
    }

}
