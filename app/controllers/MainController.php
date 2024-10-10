<?php
namespace sena\controllers;

use sena\libs\Controller;

class MainController extends Controller

{
    public function __construct()
    {}
    public function index(){
        $this->view('home','app');
    }
}