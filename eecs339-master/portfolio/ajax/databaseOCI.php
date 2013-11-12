<?php
header('Content-type: text/html; charset=utf-8');
include_once "./vars.php";

class DatabaseOCI
{
    private static $_instance = null;

    static function getInstance ()
    {
        PutEnv("ORACLE_SID=CS339");

        PutEnv("ORACLE_HOME=/raid/oracle11g/app/oracle/product/11.2.0.1.0/db_1");

        PutEnv("ORACLE_BASE=/raid/oracle11g/app/oracle/product/11.2.0.1.0");

        if (!self::$_instance) {
            // $iters = 0;

            // while (!self::$_instance && $iters < 20) {
                self::$_instance = oci_connect($GLOBALS['USERNAME'], $GLOBALS['PASSWORD']);
            //     echo "waiting";
            //     usleep(5000);
            //     $iters++;
            // }

            if (!self::$_instance) {
                $e = oci_error();

                echo "Connection to Oracle Failed for some reason ".$e['message'];
                die();
            }
        }

        return self::$_instance;
    }
}