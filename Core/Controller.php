<?php
namespace Core;
use Core\Request;

class Nayo_Controller{
    protected $request = false;
    protected $session = false;

    public function __construct(){
        if(!$this->request)
            $this->request = new Request();
        if(!$this->session)
            $this->session = new Session();
        
    }

    public function view($url = "", $datas = array()){
        // echo $url;
        foreach($datas as $key => $data){
            ${$key} = $data;
        }   
        include(APP_PATH."Views/".$url.".php");

    }

    public function input($var){
        return $_POST[$var];
    }

}