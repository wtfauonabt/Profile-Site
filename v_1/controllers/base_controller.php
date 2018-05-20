<?php
/***********************************
Base Controller
*************************************/
class  BaseController
{

    private $base_modal;

    /********************
    // Constructor
    *********************/
    public function __construct()
    {
        $conn = new ConnectDB();

        $this->base_modal = new BaseModal($conn);
    }

    /********************
    // Request Handler
    *********************/
    public function handleRequest()
    {
        try{

            // Including Base View
            include ('views/base/base_view.php');

            // Including Navigation Bar View
            include ('views/nav/nav_view.php');

            // Include JS Scripts
            include ('views/base/js/base_js_view.php');


        } catch (Exception $e){

            echo "Caught exception: " . $e->getMessage() . "<br>";

        }
    }
}
