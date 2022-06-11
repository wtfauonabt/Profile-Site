<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 8/13/2018
 * Time: 11:30 PM
 */
require_once(__DIR__.'/config.php');
require_once(__DIR__.'/TimeStampController.php');

$controller = new TimeStampController();

$controller->index();