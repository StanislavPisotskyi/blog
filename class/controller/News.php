<?php
/**
 * Created by PhpStorm.
 * User: User12
 * Date: 27.04.16
 * Time: 21:18
 */

namespace controller;

use core\Controller;
use model\User;

class News extends Controller{

    public function __construct(){
        $this->model = new \model\News();
        $this->view = new \view\News();
    }

    public function getAll(){
        $news = $this->model->getAllNewsFromDB();
        $authors = $this->model->getAllAuthorsFromDB();
        $this->view->showAllNews($news, $authors);
    }

    public function add(){
        $bool = User::getTrueUser();
        if($bool){
            $this->view->addNews();
        }
    }

    public function addAction(){
        $article = $this->model->addNewArticle($_POST['title'], $_FILES['cover'], $_POST['text']);
        if($article){
            $bool = User::getTrueUser();
            if($bool){
                $this->add();
            }
        }
    }

    public function wall(){
        $news = $this->model->getAllNewsOfCurrentUser();
        $authors = $this->model->getAllAuthorsFromDB();
        $bool = User::getTrueUser();
        if($bool){
            $this->view->showAllNews($news, $authors);
        }
    }

    public function subscribes(){
        $news = $this->model->getSubscribeNews();
        $authors = $this->model->getAllAuthorsFromDB();
        $bool = User::getTrueUser();
        if($bool){
            $this->view->showAllNews($news, $authors);
        }
    }

    public function readNews(){
        $article = $this->model->getSelectedArticle();
        $comments = $this->model->getComments();
        $this->view->showSelectedNews($article, $comments);
    }

    public function commentAction(){
        $bool = User::getTrueUser();
        if($bool){
            $comment = $this->model->addCommentToNews();
            if($comment){
                $this->getAll();
            }
        }
    }

    public function deleteComment(){
        $bool = $this->model->deleteComment($_GET['id']);
        if($bool){
            $this->getAll();
        }
    }

    public function deleteArticle(){
        $bool = $this->model->deleteArticle($_GET['id']);
        if($bool){
            $this->getAll();
        }
    }

    public function index(){
        $this->getAll();
    }
} 