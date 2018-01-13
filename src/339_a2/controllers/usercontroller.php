<?php

class UserController
{
    private $user_model;

    public function __construct($conn)
    {
        $this->user_model = new UserModel($conn);
    }

    public function handleRequest($action)
    {

        if ($action == "log_in") {
            $this->logInAction();

        } else if ($action == "log_out") {
            $this->logOutAction();

        } else if ($action == "sign_up") {
            $this->signUpAction();
        }
    }

    public function resetLogIn()
    {
        $time = time() + (60 * 15);             // 15 mins

        setcookie('user_name', $_COOKIE['user_name'], $time, "/");
        setcookie('user_id', $_COOKIE['user_id'], $time, "/");
    }

    private function logInAction()
    {
        if(isset($_POST['user_name'], $_POST['user_pass'])){
            $user_id = $this->user_model->logIn($_POST['user_name'], $_POST['user_pass']);

            if (isset($_POST['remb'])) {
                $time = time() + (60 * 60 * 24 * 30);   // 30 days
                setcookie('remb', 'y', $time, "/");
            } else {
                $time = time() + (60 * 15);             // 15 mins
            }

            setcookie('user_name', $_POST['user_name'], $time, "/");
            setcookie('user_id', $user_id, $time, "/");

            header("Location: index.php");
        }
        include ("views/loginview.php");
    }

    private function logOutAction()
    {
        $this->user_model->logOut();

        setcookie('user_name', "", time() - 3600, "/");
        setcookie('user_id', "", time() - 3600, "/");

        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();

        header("Location: index.php");
    }

    private function signUpAction()
    {
        if(isset($_POST['user_name'], $_POST['user_pass'])){
            $this->user_model->signUp($_POST['user_name'], $_POST['user_pass']);
            $this->logInAction();
        }
        include ("views/signupview.php");
    }
}
