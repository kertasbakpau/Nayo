<?php
// namespace App\Controllers;

use Core\Nayo_Controller;

class Home extends Nayo_Controller{
    
    public function index(){
        $this->loadView('home/home');
    }
}