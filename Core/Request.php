<?php
namespace Core;

class Request {

    public function post($var){
        if(isset($_POST[$var]))
            return $_POST[$var];
        return null;
    }

    public function get($var){
        if(isset($_GET[$var]))
            return $_GET[$var];
        return null;
    }
}