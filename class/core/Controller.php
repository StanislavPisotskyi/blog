<?php
/**
 * Created by PhpStorm.
 * User: User12
 * Date: 04.05.16
 * Time: 19:16
 */

namespace core;


abstract class Controller {

    public $model;
    public $view;

    abstract function index();

} 