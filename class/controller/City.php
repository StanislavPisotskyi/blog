<?php
/**
 * Created by PhpStorm.
 * User: дом
 * Date: 06.05.2016
 * Time: 10:50
 */

namespace controller;


use core\Controller;

class City extends Controller {

    public function __construct(){
        $this->model = new \model\City();
        $this->view = new \view\City();
    }

    public function addCity(){
        $this->view->showCitiesForm();
    }

    public function cityAction(){
        $bool = $this->model->add($_POST['city']);
        if($bool === 1){
            $this->addCity();
        }
        else{
            echo "ERROR!";
        }
    }

    public function index(){
        $this->addCity();
    }

}