<?php
namespace Core;

class Request {

    /**
     * @param string $var 
     */
    public function post(string $var){
        if(isset($_POST[$var]))
            return $_POST[$var];
        return null;
    }

    /**
     * @param string $var 
     */
    public function get(string $var){
        if(isset($_GET[$var]))
            return $_GET[$var];
        return null;
    }

    /**
     * 
     */
    public function body(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $_POST;
       } else {
            return $_GET;
       }
    }

    public function files(){
        return $_FILES;
    }
}