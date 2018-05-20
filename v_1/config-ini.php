<?php

    define("BASE_PATH", __DIR__);

    set_include_path(BASE_PATH);

    require_once('controllers/base_controller.php');

    require_once('modals/base/sql/connectdb.php');
    require_once('modals/base/base_modal.php');

