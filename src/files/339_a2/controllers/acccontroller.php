<?php
/***********************************
159339 Assignment 2
--------------------------------------
Name: Chi Fung Stanley Yeung
ID: 15316357
--------------------------------------
Purpose:
Controls variables and functions used
to operate AccModel
*************************************/
class AccController
{
    private $acc_model;

    public function __construct($conn)
    {
        $this->acc_model = new AccModel($conn);
    }

    public function handleRequest($action)
    {
        if (!isset($_COOKIE['user_name']))
            throw new Exception ("Session timed out. Please login again.");

        // Handler
        if ($action == "view") {
            $this->viewTable();

        } else if ($action == "add") {
            $this->addAcc();

        } else if ($action == "delete") {
            $this->delAcc();

        } else if ($action == "sort") {
            $this->sortTable();

        } else {
            throw new Exception ("Cannot identify action. (Account)");
        }

    }

    private function viewTable()
    {
        if (isset($_POST['field']) && isset($_POST['value']))
            $table = $this->acc_model->filterBy($_COOKIE['user_id'], $_POST['field'], $_POST['value']);
        else
            $table = $this->acc_model->getTable($_COOKIE['user_id']);

        $n_row = $this->acc_model->getNum();
        include ("views/accview.php");
    }

    private function addAcc()
    {
        $this->acc_model->insertNew($_COOKIE['user_id']);
        $this->viewTable();
    }

    private function delAcc()
    {
        $this->acc_model->deleteAcc($_GET['acc_id']);
        $this->viewTable();
    }

    private function sortTable()
    {
        $table = $this->acc_model->sortBy($_COOKIE['user_id'], $_GET['field']);
        $n_row = $this->acc_model->getNum();

        include ("views/accview.php");
    }

    public function updateAcc($acc_id, $tran_type, $tran_bal)
    {
        $this->acc_model->updateAcc($acc_id, $tran_type, $tran_bal);
    }

    public function getAccBal($acc_id)
    {
        return $this->acc_model->getAccBal($acc_id);
    }
}
