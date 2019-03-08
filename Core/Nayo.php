<?php
// use App\Controllers;

class Nayo{
    // protected static $controller = "controller";
    private static $args = array();

    public static function run(){

        self::init();

        self::autoload();

        self::autoloadfile();

        self::dispatch();
    }

    public static function init(){
        // Define path constants

        define("DS", DIRECTORY_SEPARATOR);

        define("ROOT", getcwd() . DS);
        
        define("BASE_PATH", ROOT);

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

        define("UPLOAD_PATH", PUBLIC_PATH . "Uploads" . DS);


        require CONFIG_PATH . "Config.php";
        require CONFIG_PATH . "Route.php";

        $base_url = $config['base_url'];
        $splitedbaseurl = explode("/", $base_url);
        
        $requerturi = explode("/",$_SERVER['REQUEST_URI']);
        $spliteduri = $requerturi;

        for($i = 4; $i < count($requerturi); $i++){
            array_push(self::$args, $spliteduri[$i]);
        }

        if(count($splitedbaseurl) == 5){
            $baseurlfolder = $splitedbaseurl[3];
            
            define("CONTROLLER", !empty($spliteduri[count($splitedbaseurl) - 3]) ? $spliteduri[count($splitedbaseurl) - 3] : $route['default']);
            
            define("ACTION", !empty($spliteduri[count($splitedbaseurl) - 2]) ? $spliteduri[count($splitedbaseurl) - 2] : 'index');
        }

        define("CURR_CONTROLLER_PATH", CONTROLLER_PATH);

        // require_once CURR_CONTROLLER_PATH . "$controller.php";

        define("CURR_VIEW_PATH", VIEW_PATH);

        // Load core classes

        require CORE_PATH . "Controller.php";

        require CORE_PATH . "Loader.php";

        require DB_PATH . "Database.php";

        require CORE_PATH . "Model.php";

        require CORE_PATH . "Request.php";

        require CORE_PATH . "Session.php";


        // Load configuration file

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
        $loader->coreHelper(array('url', 'language'));
        $loader->appHelper($autoload['helper']);
    }

    // Define a custom load method

    private static function load($classname){

        // Here simply autoload app’s controller and model classes
        // echo $classname;
        if(explode("\\", $classname)[1] == "Models"){
            $name = explode("\\", $classname)[2];
            require_once MODEL_PATH . "$name.php";

        } else if (explode("\\", $classname)[1] == "Database"){
            $name = explode("\\", $classname)[2];
            require_once  DB_PATH . "$name.php";

        } else if (explode("\\", $classname)[1] == "Controllers"){
            $name = explode("\\", $classname)[2];
            require_once  CONTROLLER_PATH . "$name.php";

        }

    }
 
    private static function dispatch() {
        // Instantiate the controller class and call its action method
        // echo json_encode(self::$args);
        $controller_name = CONTROLLER;

        $action_name = ACTION;

        require_once CURR_CONTROLLER_PATH . "$controller_name.php";

        $controller = new $controller_name;

        // if(count(self::$args) == 0)
        //     $controller->$action_name();
        // else {
            call_user_func_array(array($controller, $action_name), self::$args);
        // }

 
    }
}