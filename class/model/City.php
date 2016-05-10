<?php
/**
 * Created by PhpStorm.
 * User: дом
 * Date: 06.05.2016
 * Time: 10:38
 */

namespace model;


use core\DB;

class City {

    private $dbConnect;

    public function __construct(){
        $this->dbConnect = new DB();
    }

    private function getCity($name = false){
        if($name){
            $id = $this->dbConnect->select("city", ['id'], ["cityName" => $name], false);
            return $id;
        }
        else{
            $cities = $this->dbConnect->select("city", false, false, false);
            return $cities;
        }
    }

    public function add($name){
        $bool = $this->getCity($name);
        if($bool){
            return -1;
        }
        else{
            $result = $this->dbConnect->insert("city", ["cityName" => $name]);
            if($result){
                return 1;
            }
            else{
                return 0;
            }
        }
    }

    public function getCitiesArray(){
        $cities = $this->dbConnect->select("city", false, false, false);
        return $cities;
   }
}