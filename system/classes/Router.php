<?php
namespace App;
    /*

         Класс роутера для ЧПУ

     */


class Router
{

    public static $Module = 'index';
    public static $Error = 404;
    public static $RealUrl = array();
    public static $Include = 0;

    /*

        Инициируем класс роутера

     */
    static function Init()
    {
        self::$RealUrl = explode('/', $_SERVER['REQUEST_URI']);
        /*

                Подключаем правила роутера

         * */

        $url = explode ('/', $_SERVER['REQUEST_URI']);

        if ($url[1]) {
            if (!preg_match('/user-(.*)/', $url[1], $input)) {


                self::$Module = $url[1];

            }

        }
            if (is_dir($_SERVER['DOCUMENT_ROOT'] . \App\Config::Modules . '/' . self::$Module))
            {

                $i = 0;
                $other_file = 0;

                foreach ($url as $item) {

                    if (isset(self::$RealUrl[$i])) {
                        $file = $_SERVER['DOCUMENT_ROOT'] . \App\Config::Modules . '/' . self::$Module . '/' . self::$RealUrl[$i] . '.php';

                        if (file_exists($file)) {

                            require_once ($file);

                            $other_file = 1;

                            break;


                        }
                    }

                    $i++;
                }

                if ($other_file == false) {
                    require_once(__DIR__ . '/../../' . \App\Config::Modules . ' /' . self::$Module . '/index.php');

                }
            } else {

                if (empty($url[1])) {

                    require_once(__DIR__ . '/../../' . \App\Config::Modules . ' /index/index.php');

                } else {

                    /*

                          Если правило не найдено, то выводим ошибку 404

                    */
echo $url[1];
                    include(__DIR__.'/../../404.html');

                }

            }
    }

    public static function Start($url = '')
    {


        if (!empty($url)) {

            $url = explode('/', $url);
            /*

                Ищем в URL переменные и создаем их

             */

            $i = 0;
            $return = array();
            if (count(self::$RealUrl) > 0) {

                foreach ($url as $item) {


                    $file = $_SERVER['DOCUMENT_ROOT'] . \App\Config::Modules . '/' . self::$Module . '/' . self::$RealUrl[$i] . '.php';
                    if (file_exists($file)) {
                        require_once($file);
                    } else {
                        if (preg_match('/({)(.*)(})/', $item, $vars)) {

                            ${$vars[2]} = self::$RealUrl[$i];
                            $return[$vars[2]] = ${$vars[2]};

                        }

                    }
                    $i++;
                }
            }

            return $return;


        }
    }
}