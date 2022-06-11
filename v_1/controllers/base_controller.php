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
            if  (isset($_POST["submit"])) {
                $contact_modal = new ContactModal();
                $contact_modal.validation();
                $contact_modal.send();
            }
            // Including Base View
            include ('views/base/base_view.php');

            // Including Navigation Bar View
            include ('views/nav/nav_view.php');

            // Including Header Bar View
            include ('views/header/header_view.php');

            // Including Profile Bar View
            include ('views/profile/profile_view.php');

            // Including Portfolio Bar View
            include ('views/portfolio/portfolio_view.php');

            // Including Skllls Bar View
            include ('views/skills/skills_view.php');

            // Including Work Bar View
            include ('views/work/work_view.php');

            // Including Contact Bar View
            include ('views/contact/contact_view.php');

            // Including Footer Bar View
            include ('views/footer/footer_view.php');





            // Include JS Scripts
            include ('views/base/js/base_js_view.php');

            // Include JS Scripts
            include ('views/nav/js/nav_js_view.php');

            // Include JS Scripts
            include ('views/contact/js/contact_js_view.php');


        } catch (Exception $e){

            echo "Caught exception: " . $e->getMessage() . "<br>";

        }
    }
}
