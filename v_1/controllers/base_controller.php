<?php
/***********************************
Base Controller
*************************************/
class  BaseController
{
    /*
    private $user_controller;
    private $pro_controller;
    */
    public function __construct(){
        $conn = new ConnectDB();
        /*
        $this->user_controller = new UserController($conn);
        $this->pro_controller = new ProController($conn);
        */
    }

    public function handleRequest()
    {
        try{

            include ('views/base/base_view.php');
            /*
            // Reset login
            if (isset($_SESSION['user_name']) && !isset($_SESSION['remb']))
                $this->user_controller->resetLogIn();

            if (!isset($_SESSION['user'])) {

                if(isset($_GET['model']) && $_GET['model'] = "user" && isset($_GET['action']) && $_GET['action'] == "sign_up") {
                    include ("views/signupView.php");
                } else {
                    include ("views/loginview.php");
                }

            } else {
                if (!isset($_GET['model'])){
                    include ("views/homeView.php");

                } else {
                    $model = $_GET['model'];


                    // Handler
                    if (!isset($_GET['action']))
                        throw new Exception ("Cannot read action");

                    $action = $_GET['action'];
                    if ($model == "user") {
                        $this->user_controller->handleRequest($action);

                    } else if ($model == "account") {
                        $this->acc_controller->handleRequest($action);

                    } else if ($model == "transaction") {
                        $this->tran_controller->handleRequest($action, $this->acc_controller);

                    } else {
                        throw new Exception ("Cannot identify action.");
                    }
                }
            }
            */

        } catch (Exception $e){
            echo "Caught exception: " . $e->getMessage() . "<br>";
        }
    }
}
