<?php
/***********************************
159339 Assignment 2
--------------------------------------
Name: Chi Fung Stanley Yeung
ID: 15316357
--------------------------------------
Purpose:
Contains functions for interacting with
MySQL database to insert, update, delete,
obtain information for accounts.
*************************************/
class AccModel
{
    private $conn;          # ConnectDB model
    private $arr_acc;       # Table of accounts
    private $n_acc;         # Number of accoiunts

    private $last_sort;
    private $last_order;

    /********************
    // Constructor
    *********************/
    public function __construct($conn)
    {
        $this->conn =  $conn;
        $this->arr_acc = array();
    }

    /********************
    // FUNCTIONS
    *********************/

    public function getNum()
    {
        return $this->n_acc;
    }

    public function getAccBal($acc_id)
    {
        return $this->arr_acc[$this->getAccIndex($acc_id)]->getBal();
    }

    public function getTable($user_id)
    {
        $this->conn->sanitize($user_id);

        $sql = "SELECT acc_id, acc_bal FROM Accounts WHERE user_id = '" . $user_id . "'";
        $res = $this->conn->executeStatement($sql);

        return $this->tableToArr($res);
    }

    public function insertNew($user_id)
    {
        $this->conn->sanitize($user_id);

        $sql = "INSERT INTO Accounts(user_id, acc_bal) VALUES ('" . $user_id . "', '0')";
        $this->conn->executeStatement($sql);
    }

    public function updateAcc($acc_id, $tran_type, $tran_bal)
    {
        $this->conn->sanitize($acc_id);
        $this->conn->sanitize($tran_type);
        $this->conn->sanitize($tran_bal);

        $i_acc = $this->getAccIndex($acc_id);

        $acc_bal = $this->arr_acc[$i_acc]->depositWithdraw($tran_type, $tran_bal);

        $sql = "UPDATE Accounts SET acc_bal = " . $this->arr_acc[$i_acc]->getBal() . " WHERE acc_id = '" . $acc_id . "'";
        $this->conn->executeStatement($sql);

    }

    public function deleteAcc($acc_id)
    {
        $this->conn->sanitize($acc_id);

        $sql = "DELETE FROM Accounts WHERE acc_id = " . $acc_id;
        $res = $this->conn->executeStatement($sql);
    }

    public function sortBy($user_id, $field)
    {
        $order = "DESC";

        if ($this->last_sort == $field && $this->last_order == $order)
            $order = "ASC";

        $this->conn->sanitize($user_id);

        $sql = "SELECT acc_id, acc_bal FROM Accounts WHERE user_id = '" . $user_id . "' ORDER BY " . $field . " " . $order;
        $res = $this->conn->executeStatement($sql);

        $this->last_sort = $field;
        $this->last_order = $order;

        return $this->tableToArr($res);
    }

    public function filterBy($user_id, $field, $val)
    {
        $this->conn->sanitize($user_id);
        $this->conn->sanitize($field);
        $this->conn->sanitize($val);

        $sql = "SELECT acc_id, acc_bal FROM Accounts WHERE (user_id = '" . $user_id . "' AND " . $field . " = '" . $val . "')";
        $res = $this->conn->executeStatement($sql);

        return $this->tableToArr($res);
    }

    private function tableToArr($table)
    {
        $this->arr_acc = array();
        $this->n_acc = $table->num_rows;

        while($row = $table->fetch_assoc()){
          $acc = new Account($row["acc_id"], $row["acc_bal"]);
          array_push($this->arr_acc, $acc);
        }
        return $this->arr_acc;
    }

    private function getAccIndex($acc_id)
    {
        for ($i = 0; $i < $this->n_acc; $i++) {
            if ($this->arr_acc[$i]->getid() == $acc_id)
                return $i;
        }
        throw new Exception("No Account Found");
    }
}
