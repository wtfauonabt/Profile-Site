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
obtain information for transactions.
*************************************/
class TranModel
{
    private $conn;          # ConnectDB model
    private $arr_tran;       # Table of accounts
    private $n_tran;         # Number of accoiunts

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
        return $this->n_tran;
    }

    public function getTable($acc_id)
    {
        $this->conn->sanitize($acc_id);

        $sql = "SELECT tran_id, tran_type, tran_bal FROM Transactions WHERE acc_id = '" . $acc_id . "'";
        $res = $this->conn->executeStatement($sql);

        return $this->tableToArr($res);
    }

    public function insertNew($acc_id, $tran_type, $tran_bal)
    {
        $this->conn->sanitize($tran_bal);

        $sql = "INSERT INTO Transactions(acc_id, tran_type, tran_bal) VALUES ('" . $acc_id . "', '" . $tran_type . "', '" . $tran_bal . "')";
        $this->conn->executeStatement($sql);
    }

    public function updateRow($tran_id)
    {
        $this->conn->sanitize($tran_id);
    }

    private function tableToArr($table)
    {
        $this->arr_tran = array();
        $this->n_tran = $table->num_rows;

        while($row = $table->fetch_assoc()){
          $tran = new Transaction($row["tran_id"], $row['tran_type'], $row["tran_bal"]);
          array_push($this->arr_tran, $tran);
        }
        return $this->arr_tran;
    }
}
