<?php

ini_set('error_reporting', E_ALL);
require_once(__DIR__.'/system/core.php');
#echo mysqli_stat(App\DB::connect());
    /*

        Запускаем роутер

     * */

$app = App\Router::Init();
#${'default_'.$field} = 'abc';
