<?php
namespace App;
use \App\Config;
class DB
{


    public static function connect()
    {
        $connect = mysqli_connect(
            \App\Config::DBhost,
            \App\Config::DBusername,
            \App\Config::DBpassword,
            \App\Config::DBtable
        );
        return $connect;
    }

    public function __construct()
    {

    }
}