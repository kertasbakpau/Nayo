<?php
namespace Core;

class Session {

    public function set($name, $value){
        $_SESSION[$name] = $value;
    }

    public function get($name){
        if(isset($_SESSION[$name]))
            return $_SESSION[$name];
        return null;
    }

    public function destroy(){
        session_destroy();
    }

    public function unset($name){
        unset($_SESSION[$name]);
    }
}