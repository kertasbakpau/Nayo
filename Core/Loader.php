<?php
namespace Core;

class Loader{

// Load library classes

    public function library($libs = array()){

        foreach($libs as $lib){
            include LIB_PATH . ucfirst("$lib.php");
        }

    }


    // loader helper functions. Naming conversion is xxx_helper.php;

    public function coreHelper($helpers = array()){

        foreach($helpers as $helper){
            include HELPER_PATH . "{$helper}_helper.php";
        }

    }

    
    public function appHelper($helpers = array()){

        foreach($helpers as $helper){
            include APP_HELPER_PATH . "{$helper}_helper.php";
        }

    }

}