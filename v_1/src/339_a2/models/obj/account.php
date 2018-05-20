<?php
/***********************************
159339 Assignment 2
--------------------------------------
Name: Chi Fung Stanley Yeung
ID: 15316357
--------------------------------------
Purpose:
Stores information of 1 account.

Contains functions for obtaining account information and transaction
calculations.

Class from Assignment 1
*************************************/

class Account
{
    private $id;        # Account ID
    private $bal;   # Account Balance

    /********************
    // Constructor
    *********************/
    public function __construct($id, $amount)
    {
        $this->id = intval($id);
        $this->bal = floatval($amount);
    }

    /********************
    // FUNCTIONS
    *********************/
    public function getId()
    {
        return $this->id;
    }

    public function getBal()
    {
        return $this->bal;
    }

    public function depositWithdraw($type, $amount)
    {

        // Checks for correct transaction input.
        if (!ctype_alpha($type) || strlen($type) != 1)
            throw new Exception("Invalid Type input: " . $type);
        if (!is_numeric($amount))
            throw new Exception("Invalid Amount input: " . $amount);

        // Checks if amount is negative
        if ($amount < 0)
            throw new Exception("Negative Transaction Amount");

        // Identify deposit or withdraw. Case insensitve.
        if ($type == 'D' || $type == 'd'){
            $this->bal += $amount;

        } else if($type == 'W' || $type == 'w'){
            //  Checks that there is enough balance to withdraw
            if ($this->bal < $amount)
                throw new Exception("Insufficient Balance");

            $this->bal -= $amount;

        } else {
            throw new Exception("Invalid Type");
        }
    }
}
