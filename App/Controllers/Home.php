<?php
// namespace App\Controllers;
use App\Controllers\Base_Controller;

class Home extends Base_Controller{
    
    public function index(){
        $this->loadView('home/home');
    }
}