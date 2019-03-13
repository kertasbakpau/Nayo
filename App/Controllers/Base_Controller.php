<?php
namespace App\Controllers;
use Core\Nayo_Controller;

class Base_Controller extends Nayo_Controller{

    public function __construct(){
        parent::__construct();
        
        if(empty($this->session->get(get_variable().'userdata'))){
            redirect();
        }
    }

    public function loadView($url, $datas = array()){
        $this->view('shared/header');
        $this->view($url, $datas);
        $this->view('shared/footer');
    }
}