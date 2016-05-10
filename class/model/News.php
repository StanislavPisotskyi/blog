<?php
/**
 * Created by PhpStorm.
 * User: User12
 * Date: 04.05.16
 * Time: 19:34
 */

namespace model;


use core\DB;

class News {

    private $dbConnect;

    public function __construct(){
        $this->dbConnect = new DB();
    }

    public function getAllNewsFromDB(){
        $news = $this->dbConnect->select("articles", false, false, false);
        $news = array_reverse($news);
        return $news;
    }

    public function getAllAuthorsFromDB(){
        $author = $this->dbConnect->select("user_data", false, false, false);
        return $author;
    }


    public function getAllNewsOfCurrentUser(){
        $news = $this->dbConnect->select("articles", false, ["idUser" => $_COOKIE['key']], false);
        $news = array_reverse($news);
        return $news;
    }

    public function addNewArticle($title, $cover, $text){
        if($cover){
            $av = $cover['name'];
            $tmp = $cover['tmp_name'];
            copy($tmp, "images/".$av);
            $path = "../images/".$av;
        }
        else{
            $path = "";
        }
        $id = $_COOKIE['key'];
        $bool = $this->dbConnect->insert("articles", ["text" => $text, "title" => $title, "createDate" => date('Y-m-d H:i:s'), "idUser" => $id, "image" => $path]);
        return $bool;
    }

    public function getSubscribeNews(){
        $idUser = $_COOKIE['key'];
        $subscribesArr = $this->dbConnect->send_query("SELECT * FROM `articles` WHERE `idUser` IN (SELECT `idAuthor` FROM `subscribe` WHERE `idUser` = ?)", [$idUser]);
        $subscribesArr = array_reverse($subscribesArr);
        return $subscribesArr;
    }

    public function getSelectedArticle(){
        $article = $this->dbConnect->select("articles", false, ["id" => $_GET['article']], false);
        return $article;
    }

    public function getComments(){
        $comments = $this->dbConnect->select("comments", false, ["idArticle" => $_GET['article']], false);
        return $comments;
    }

    public function addCommentToNews(){
        $bool = $this->dbConnect->insert("comments", ["text" => $_POST['text'], "idUser" => $_COOKIE['key'], "idArticle" => $_POST['article'], "DateTime" => date('Y-m-d H:i:s')]);
        return $bool;
    }

    public function deleteComment($id){
        $bool = $this->dbConnect->delete("comments", ["id" => $id]);
        return $bool;
    }

    public function deleteArticle($id){
        $bool = $this->dbConnect->delete("articles", ["id" => $id]);
        return $bool;
    }

} 