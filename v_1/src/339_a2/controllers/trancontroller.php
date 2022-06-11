<?php
/***********************************
159339 Assignment 2
--------------------------------------
Name: Chi Fung Stanley Yeung
ID: 15316357
--------------------------------------
Purpose:
Controls variables and functions used
to operate TranModel
*************************************/
class TranController
{
    private $tran_model;
    private $acc_controller;

    public function __construct($conn)
    {
        $this->tran_model = new TranModel($conn);
    }

    public function handleRequest($action, $acc_controller)
    {
        if (!isset($_COOKIE['user_name']))
            throw new Exception ("Session timed out. Please login again.");

        $this->acc_controller = $acc_controller;

        if ($action == "view") {
            if(!isset($_SESSION['acc_id']) || $_SESSION['acc_id'] != $_GET['acc_id'])
                $_SESSION['acc_id'] = $_GET['acc_id'];

            $this->viewTable();

        } else if ($action == "add") {
            $this->addTran();

        } else {
            throw new Exception ("Cannot identify action. (Transaction)");
        }

    }

    private function viewTable()
    {

        $table = $this->tran_model->getTable($_SESSION['acc_id']);

        $acc_bal = $this->acc_controller->getAccBal($_SESSION['acc_id']);

        $n_row = $this->tran_model->getNum();
        include ("views/tranview.php");
    }

    private function addTran()
    {

        if (isset($_POST['tran_type']) && isset($_POST['tran_bal'])){
            $this->acc_controller->updateAcc($_SESSION['acc_id'], $_POST['tran_type'], $_POST['tran_bal']);
            $this->tran_model->insertNew($_SESSION['acc_id'], $_POST['tran_type'], $_POST['tran_bal']);
        }

        $this->viewTable();
    }
}
