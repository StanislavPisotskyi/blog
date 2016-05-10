<?php
/**
 * Created by PhpStorm.
 * User: дом
 * Date: 06.05.2016
 * Time: 10:36
 */

namespace view;


class City {

    public function showCitiesForm(){
        include_once("pages/head.php");
        include_once("pages/menu.php");
        include_once("pages/addCity.php");
        include_once("pages/footer.php");
    }
}