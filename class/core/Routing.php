<?php
/**
 * Created by PhpStorm.
 * User: User12
 * Date: 27.04.16
 * Time: 20:10
 */

namespace core;

class Routing {
    public static function getPath(){
        $path = explode("/", $_SERVER['REQUEST_URI']);
        $className = false;
        $methodName = false;
        if(isset($path[1])){
            $className = $path[1];
        }
        if(isset($path[2])){
            $methodName = $path[2];
            $methodName = preg_replace("/\?.*/", "", $methodName);
        }
        $resultArr = [$className, $methodName];
        return $resultArr;
    }

    public static function rout(){
        $arr = self::getPath();
        $className = $arr[0] ?ucfirst($arr[0]) : "Main";
        $methodName = $arr[1] ? $arr[1] : "index";
        $className = "\\controller\\".$className;
        if(class_exists($className)){
            $obj = new $className;
            if(method_exists($obj, $methodName)){
                $obj->$methodName();
            }
            else{
                echo "404";
            }
        }
        else{
            echo "404";
        }
    }
}