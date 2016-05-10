<?php
/**
 * Created by PhpStorm.
 * User: дом
 * Date: 05.05.2016
 * Time: 14:48
 */

namespace view;


class User {

    public function showAllForms($cities){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/registration.php");
        include_once("pages/footer.php");
    }

    public function showAllUsers($authorsArr){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/allUsers.php");
        include_once("pages/footer.php");
    }

    public function showLogout(){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/logout.php");
        include_once("pages/footer.php");
    }

    public function showLoginForm(){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/login.php");
        include_once("pages/footer.php");
    }

    public function showSettings($authorsArr){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/person.php");
        include_once("pages/footer.php");
    }

    public function showAvatarSet(){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/avatar.php");
        include_once("pages/footer.php");
    }

    public function showNameSet(){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/name.php");
        include_once("pages/footer.php");
    }

    public function showPhoneSet(){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/phone.php");
        include_once("pages/footer.php");
    }

    public function showDateSet(){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/birthday.php");
        include_once("pages/footer.php");
    }

}