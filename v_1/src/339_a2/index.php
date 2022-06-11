<?php

require_once('config-ini.php');

session_start();

$controller;
if (!isset($_SESSION['controller']))
    $_SESSION['controller'] = new BaseController();

$controller = $_SESSION['controller'];

$controller->handleRequest();
