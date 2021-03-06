<?php

use Core\Loader;
use Core\Nayo_Migration;

class Nayo{
    protected static $controller = "";
    protected static $action = "";
    protected static $routes = array();
    private static $args = array();

    public function __construct(){
        
    }

    public static function run($argv){

        if(empty($argv)){
            self::init();

            self::autoload();

            self::autoloadfile();

            // self::migrate();

            self::dispatch();
            
        } else {

            self::define();

            $function = "";
            $params = array();
            $i = 0;
            foreach ($argv AS $arg){
                if($i > 0){
                    if($i == 1){
                        $function = $arg;
                    } else {
                        $params[] = $arg;
                    }
                }
                $i++;
            }
            
            call_user_func_array(array("Core\\CLI", $function), $params);
            
        }
    }

    public function model(){
        
    }

    public static function init(){
        // Define path constants
        self::define();        
    }

    public static function define(){
        define("APP_PATH", ROOT . 'App' . DS);

        define("CORE_PATH", ROOT . "Core" . DS);

        define("PUBLIC_PATH", ROOT . "Public" . DS);

        define("CONFIG_PATH", APP_PATH . "Config" . DS);

        define("CONTROLLER_PATH", APP_PATH . "Controllers" . DS);

        define("MODEL_PATH", APP_PATH . "Models" . DS);

        define("VIEW_PATH", APP_PATH . "Views" . DS);

        define("APP_HELPER_PATH", APP_PATH . "Helpers" . DS);

        define("APP_LANGUAGE_PATH", APP_PATH . "Languages" . DS);

        define('DB_PATH', CORE_PATH . "Database" . DS);

        define("LIB_PATH", CORE_PATH . "Libraries" . DS);

        define("HELPER_PATH", CORE_PATH . "Helpers" . DS);

        define("CORE_LANGUAGE_PATH", CORE_PATH . "Languages" . DS);

        define("UPLOAD_PATH", PUBLIC_PATH . "Uploads" . DS);

        define("CURR_CONTROLLER_PATH", CONTROLLER_PATH);

        define("CURR_VIEW_PATH", VIEW_PATH);

        // Load core classes

        require CORE_PATH . "Controller.php";

        require CORE_PATH . "Loader.php";

        require CORE_PATH . "Model.php";

        require CORE_PATH . "Request.php";

        require CORE_PATH . "Session.php";

        require CORE_PATH . "Migration.php";

        require CORE_PATH . "Exception.php";
        
        require CORE_PATH . "CLI.php";

        require DB_PATH . "DBResult.php";

        require DB_PATH . "Database.php";

        $GLOBALS['config'] = include CONFIG_PATH . "Config.php";

        // Start session

        session_start();
    }

    private static function autoload() {
        spl_autoload_register(array(__CLASS__,'load'));

    }

    private static function autoloadfile(){
        require CONFIG_PATH . "Autoload.php";
        $loader = new Loader();
        $loader->coreHelper(array('url', 'language', 'helper', 'inflector', 'string'));
        $loader->coreLibrary(array('ftp'));
        $loader->appHelper($autoload['helper']);
        $loader->appLibrary($autoload['library']);
    }

    // Define a custom load method

    private static function load($classname){

        // Here simply autoload app’s controller and model classes
        // echo $classname;

        if(explode("\\", $classname)[1] == "Models"){
            $name = explode("\\", $classname)[2];
            require_once MODEL_PATH . "$name.php";

        } 

    }
 
    private static function dispatch() {

        require "App\Config\Routes.php";
 
    }

    private static function migrate(){

    }
}