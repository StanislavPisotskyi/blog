<?php
/**
 * Created by PhpStorm.
 * User: User12
 * Date: 27.04.16
 * Time: 20:10
 */

function __autoload($className){
    $className = preg_replace("/\\\\/", '/', $className);
    if(file_exists("class/".$className.".php")){
        require_once("class/".$className.".php");
    }
}

