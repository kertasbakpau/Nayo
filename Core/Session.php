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

    public function setFlash($name, $value = array()){
        if (!isset($_SESSION['flash'])) {
            $_SESSION['flash'] = array();
        }
        $_SESSION['flash'][$name] = $value;
    }

    public function getFlash($name){
        if (isset($_SESSION['flash'][$name])) {
            $flash = $_SESSION['flash'][$name];
            unset($_SESSION['flash'][$name]);
            return $flash;
        }
        return array();
    }

    public function isFlashExist($name){
        if (isset($_SESSION['flash'][$name])) {
           
            return true;
        }
        return false;
    }
}