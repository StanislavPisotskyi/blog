<?php
/**
 * Created by PhpStorm.
 * User: дом
 * Date: 05.05.2016
 * Time: 14:43
 */

namespace controller;



use core\Controller;
use model\City;

class User  extends Controller {

    public function __construct(){
        $this->model = new \model\User();
        $this->view = new \view\User();
    }

    public function registration(){
        $city = new City();
        $cities = $city->getCitiesArray();
        $this->view->showAllForms($cities);
    }

    public function regAction(){
        $passwordStatus = $this->model->getPasswordStatus($_POST['passReg'], $_POST['confirmPass']);
        if($passwordStatus){
            $bool = $this->model->registrUser($_POST['emailReg'], $_POST['passReg'], $_POST['name'], $_POST['l_name'], $_POST['city'], $_FILES['avatar'], $_POST['phone'], $_POST['date']);
            if($bool){
                $this->allUsers();
            }
        }
        else{
            $this->registration();
        }
    }

    public function allUsers(){
        $bool = $this->model->getTrueUser();
        if($bool){
            $arr = $this->model->getAllUsers();
            $this->view->showAllUsers($arr);
        }
    }

    public function login(){
        $this->view->showLoginForm();
    }

    public function loginAction(){
        $bool = $this->model->login($_POST['email'], $_POST['pass']);
        if($bool){
            $this->allUsers();
        }
    }

    public function logout(){
        $this->view->showLogout();
    }

    public function logoutAction(){
        $bool = $this->model->logout();
        if($bool){
            $this->registration();
        }
    }

    public function addSub(){
        $bool = $this->model->addSubscribe($_GET['id']);
        if($bool){
            $this->allUsers();
        }
        else{
            $this->allUsers();
        }
    }

    public function personalSettings(){
        $user = $this->model->getCurrentUser($_COOKIE['key']);
        $bool = \model\User::getTrueUser();
        if($bool){
            $this->view->showSettings($user);
        }
    }

    public function avatarAction(){
        $bool = \model\User::getTrueUser();
        if($bool){
            $this->view->showAvatarSet();
            $this->model->changeAvatar($_COOKIE['key'], $_FILES['avatar']);
        }
    }

    public function nameAction(){
        $bool = \model\User::getTrueUser();
        if($bool){
            $this->view->showNameSet();
            $this->model->changeName($_COOKIE['key'], $_POST['name'], $_POST['l_name']);
        }
    }

    public function phoneAction(){
        $bool = \model\User::getTrueUser();
        if($bool){
            $this->view->showPhoneSet();
            $this->model->changePhone($_COOKIE['key'], $_POST['phone']);
        }
    }

    public function birthdayAction(){
        $bool = \model\User::getTrueUser();
        if($bool){
            $this->view->showDateSet();
            $this->model->changeDate($_COOKIE['key'], $_POST['date']);
        }
    }

    public function index(){
        $this->registration();
    }
}