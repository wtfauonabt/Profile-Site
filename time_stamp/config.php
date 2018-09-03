<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 8/13/2018
 * Time: 11:37 PM
 */

class Config {

    public static $db = array();

    private static $initialized = FALSE;

    public static function init() {
        if (self::$initialized)
            return;

        // Global
        self::$db["hostname"] = "localhost";
        self::$db["username"] = "id2942155_syeung527";
        self::$db["password"] = "syBB1209";
        self::$db["database"] = "id2942155_db";


        self::$db["time_stamp"]["table"] = "time_stamp";

        // Make changes to order and name will affect table displayed
        self::$db["time_stamp"]["field"]["id"]       = "ID";
        self::$db["time_stamp"]["field"]["user"]     = "User";
        self::$db["time_stamp"]["field"]["purpose"]  = "Purpose";
        self::$db["time_stamp"]["field"]["start"]    = "Start";
        self::$db["time_stamp"]["field"]["end"]      = "End";
        self::$db["time_stamp"]["field"]["time"]     = "Time Used";
    }
}

Config::init();
