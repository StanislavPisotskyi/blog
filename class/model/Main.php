<?php
/**
 * Created by PhpStorm.
 * User: User12
 * Date: 04.05.16
 * Time: 19:48
 */

namespace model;


use core\DB;

class Main {

    private $dbConnect;

    public function __construct(){
        $this->dbConnect = new DB();
    }

    public function getAllForMainPage(){
        $news = $this->dbConnect->select("articles", false, false, false);
        $news = array_reverse($news);
        return $news;
    }

    public function getAllAuthorsForMainPage(){
        $author = $this->dbConnect->select("user_data", false, false, false);
        return $author;
    }
} 