<?php

 /*

  * Автозагрузка классов системы

    */
function autoload($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';

    if ($lastNsPos = strrpos($className, '\\')) {

        $className = substr($className, $lastNsPos + 1);

    }
    $fileName = __DIR__.'/classes/'.$className . '.php';

    require $fileName;
}
spl_autoload_register('autoload');


?>