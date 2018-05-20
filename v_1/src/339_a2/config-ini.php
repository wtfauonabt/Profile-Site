<?php

    require_once('controllers/basecontroller.php');
    require_once('controllers/usercontroller.php');
    require_once('controllers/acccontroller.php');
    require_once('controllers/trancontroller.php');

    require_once('models/connectdb.php');

    require_once('models/usermodel.php');
    require_once('models/accmodel.php');
    require_once('models/tranmodel.php');

    require_once("models/obj/user.php");
    require_once("models/obj/account.php");
    require_once("models/obj/transaction.php");

    define('ROOTPATH', __DIR__);
