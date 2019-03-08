<?php
namespace App\Controllers;
use Core\Nayo_Controller;

class Base_Controller extends Nayo_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function loadView($url, $datas = array()){
        $this->view('shared/header');
        $this->view($url, $datas);
        $this->view('shared/footer');
    }
}