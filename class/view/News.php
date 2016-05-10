<?php
/**
 * Created by PhpStorm.
 * User: User12
 * Date: 04.05.16
 * Time: 20:17
 */

namespace view;


class News {

    public function showAllNews($articlesArr, $authorArr){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/news.php");
        include_once("pages/footer.php");
    }

    public function addNews(){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/addNews.php");
        include_once("pages/footer.php");
    }

    public function showSelectedNews($articlesArr, $commentsArr){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/newsWithComments.php");
        include_once("pages/footer.php");
    }

} 