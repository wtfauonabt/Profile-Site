<?php
/***********************************
159339 Assignment 2
--------------------------------------
Name: Chi Fung Stanley Yeung
ID: 15316357
--------------------------------------
Purpose:
Stores information for 1 transaction.
*************************************/

class Transaction
{
    private $id_acc;    # Account ID
    private $type;      # Deposite or Withdraw (D, d or W, w)
    private $amount;    # Transaction amount

    /********************
    // Constructor
    *********************/
    public function Transaction($id_acc, $type, $amount)
    {
        $this->id_acc = intval($id_acc);
        $this->type = $type;
        $this->amount = floatval($amount);
    }

    /********************
    // FUNCTIONS
    *********************/

    public function getId()
    {
        return $this->id_acc;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getBal()
    {
        return $this->amount;
    }
}
