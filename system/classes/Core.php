<?php
namespace App;


    /*

        Класс содержащий переменные и загружает модули с библиотеками

    */

    class Core{

        public static $is_mobile = 0;

        function __construct()
        {

            $is_mobile = new \Detection\Mobile_Detect();

            self::$is_mobile = $is_mobile->isMobile();
        }

    }