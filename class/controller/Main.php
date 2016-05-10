<?php
/**
 * Created by PhpStorm.
 * User: User12
 * Date: 04.05.16
 * Time: 19:26
 */

namespace controller;


use core\Controller;

class Main extends Controller{

    public function index(){
        $this->model = new \model\Main();
        $news = $this->model->getAllForMainPage();
        $authors = $this->model->getAllAuthorsForMainPage();
        $this->view = new \view\News();
        $this->view->showAllNews($news, $authors);
    }
} 