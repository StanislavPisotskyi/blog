<?php
/**
 * Created by PhpStorm.
 * User: дом
 * Date: 05.05.2016
 * Time: 15:06
 */

namespace model;


use core\DB;

class User {

    private $dbConnect;

    public function __construct(){
        $this->dbConnect = new DB();
    }

    public function login($email = "",$pass = ""){
        $request = $this->dbConnect->select("user_login", false, ["email" => $email, "pass" => md5($pass)], false)[0];
        if($request){
            setcookie("key", $request['id'], time() + 60 * 60 * 24, "/");
            setcookie("auth", $request['email'], time() + 60 * 60 * 24, "/");
            setcookie("token", md5("security_key".$request['email']), time() + 60 * 60 * 24, "/");
            return true;
        }
        else{
            return false;
        }
    }

    public function logout(){
        setcookie("key", $_COOKIE['key'], -10000, "/");
        setcookie("auth", $_COOKIE['auth'], -10000, "/");
        setcookie("token", md5("security_key".$_COOKIE['auth']), -10000, "/");
        return true;
    }

    public function getPasswordStatus($pass1, $pass2){
        if($pass1 == $pass2){
            return true;
        }
        else{
            return false;
        }
    }

    public function registrUser($email = "", $pass = "", $name = "", $surname = "", $city, $avatar, $phone, $birthday){
        $bool = $this->getUserExist($email);
        if(!$bool){
            if($avatar){
                $av = $avatar['name'];
                $tmp = $avatar['tmp_name'];
                copy($tmp, "images/".$av);
                $path = "../images/".$av;
            }
            else{
                $path = "";
            }
            $userId = $this->dbConnect->insert("user_login", ["email" => $email, "pass" => md5($pass)]);
            $this->dbConnect->insert("user_data", ["id" => $userId, "name" => $name, "lastName" => $surname, "idCity" => $city, "avatar" => $path, "phone" => $phone, "regTime" => date('Y-m-d H:i:s'), "birthDate" => $birthday]);
            $this->login($email, $pass);
            return true;
        }
    }

    private function getUserExist($email = ""){
        $request = $this->dbConnect->select("user_login", false, ["email" => $email], false);
        if($request){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getTrueUser(){
        if(md5("security_key".$_COOKIE['auth']) === $_COOKIE['token']){
            return true;
        }
        else{
            echo "Fuck you!";
            return false;
        }
    }

    public function getAllUsers(){
        $arr = $this->dbConnect->select("user_data", false, false, false);
        return $arr;
    }

    public function addSubscribe($author){
        $user = $_COOKIE['key'];
        $bool = $this->dbConnect->select("subscribe", false,  ["idUser" => $user, "idAuthor" => $author], false);
        if($bool){
            return false;
        }
        else{
            $subscribe = $this->dbConnect->insert("subscribe", ["idUser" => $user, "idAuthor" => $author]);
            return $subscribe;
        }
    }

    public function getCurrentUser($key){
        $user = $this->dbConnect->select("user_data", false, ["id" => $key], false);
        return $user;
    }

    public function changeAvatar($key, $avatar){
        if($avatar){
            $av = $avatar['name'];
            $tmp = $avatar['tmp_name'];
            copy($tmp, "images/".$av);
            $path = "../images/".$av;
        }
        else{
            $path = "";
        }
        $bool = $this->dbConnect->update("user_data", ["id" => $key], ["avatar" => $path]);
        return $bool;
    }

    public function changeName($key, $name, $lastName){
        $bool = $this->dbConnect->update("user_data", ["id" => $key], ["name" => $name, "lastName" => $lastName]);
        return $bool;
    }

    public function changePhone($key, $phone){
        $bool = $this->dbConnect->update("user_data", ["id" => $key], ["phone" => $phone]);
        return $bool;
    }

    public function changeDate($key, $date){
        $bool = $this->dbConnect->update("user_data", ["id" => $key], ["birthDate" => $date]);
        return $bool;
    }

}