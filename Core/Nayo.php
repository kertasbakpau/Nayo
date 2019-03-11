<?php


class Nayo{
    protected static $controller = "";
    protected static $action = "";
    protected static $routes = array();
    private static $args = array();

    public function __construct(){
        
    }

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

        // if (preg_match("/php/", "PHP is the web scripting language of choice.")) {
        //     echo "A match was found.";
        // } else {
        //     echo "A match was not found.";
        // }
        self::urlInitialize();

        define("CURR_CONTROLLER_PATH", CONTROLLER_PATH);

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
        $loader->coreHelper(array('url', 'language', 'helper'));
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

        } 
        else if (explode("\\", $classname)[1] == "Controllers"){
            $name = explode("\\", $classname)[2];
            self::$controller = $name; 
            require_once  CONTROLLER_PATH . self::$controller.".php";
        }

    }
 
    private static function dispatch() {
        // Instantiate the controller class and call its action method

        // require_once  CONTROLLER_PATH . self::$controller.".php";
        
        // echo self::$action;
        $controller_name = self::$controller;
        // echo $controller_name;

        $action_name = self::$action;

        $controllerpath = "App\\Controllers\\".$controller_name;

        $controller = new $controllerpath;
            
        call_user_func_array(array($controller, $action_name), self::$args);

 
    }

    private static function urlInitialize(){

        require CORE_PATH . "Routes.php";
        require CONFIG_PATH . "Config.php";
        require CONFIG_PATH . "Routes.php";

        self::$routes = $routes->routeCollections;
        // echo json_encode(self::$routes);

        // $base_url = $config['base_url'];
        // $splitedbaseurl = explode("/", $base_url);
        // $requerturi = explode("/",$_SERVER['REQUEST_URI']);
        // $spliteduri = $requerturi;
        // echo json_encode($_SERVER, JSON_PRETTY_PRINT);
        self::isRouteMatch($_SERVER['PATH_INFO']);
        // echo $_SERVER['SCRIPT_NAME'];
        // if(count($splitedbaseurl) == 5){
        //     $word = array_slice($spliteduri, 2);
        //     $routepath = implode("/",$word);
        //     // echo $routepath;
        //     if(!self::isRouteMatch($routepath)){
            
        //         self::$controller = !empty($spliteduri[count($splitedbaseurl) - 3]) ? $spliteduri[count($splitedbaseurl) - 3] : self::$routess['defaultController'];
                
        //         self::$action = !empty($spliteduri[count($splitedbaseurl) - 2]) ? $spliteduri[count($splitedbaseurl) - 2] : self::$routes['defaultMethod'];
            
        //     }
            
        // }
        
        // for($i = 4; $i < count($requerturi); $i++){
        //     array_push(self::$args, $spliteduri[$i]);
        // }
        // echo self::$controller;

    }

    private function isRouteMatch($routeName){
        // echo $routeName;
        foreach(self::$routes as $key => $route){
            // echo $key;
            if(preg_match($routeName."/", $key, $match)){
                echo "match ".$key."<br>";
            } else {
                echo "not "."<br>";
            }
        }
        // if(isset(self::$routes[$routeName])){
        //     $route = explode("/", self::$routes[$routeName]);
        //     if(count($route) == 1){
        //         self::$controller = $route[0];
        //         self::$action = 'index';
        //     } else if(count($route) == 2){
        //         self::$controller = $route[0];
        //         self::$action = $route[1];
        //     } else if(count($route) > 2) {

        //     }
        //     return true;
        // } else {
        //     self::$controller = $routeName;
        //     self::$action = 'index';
        //     // echo self::$controller;
        //     return false;
        // }

    }
}