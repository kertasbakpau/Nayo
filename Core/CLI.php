<?php
namespace Core;

use Core\Nayo_Migration;
use Core\Database\Database;

class CLI {

    public function help(){
        $result = "The following are the available command line interface commands\n\n";
        $result .= "php index.php tools migration                       Create new migration file\n";
        $result .= "php index.php tools migrate                         Run all migrations.\n";
        $result .= "php index.php tools controller \"file_name\"        Creates a new controller file.\n";
        $result .= "php index.php tools model \"table_name\"            Creates a new model file.\n";

        echo $result . PHP_EOL;
    }

    public function model($modelname){
        $self = new self;
        $self->makeModelFile($modelname);
    }

    public function controller($filename){
        $self = new self;
        $self->makeControllerFile($filename);
    }

    public function migration(){
        $filename = date('YmdHis');
        $path = APP_PATH . "Database/Migrations/$filename.sql";

        $my_controller = fopen($path, "w") or die("Unable to create model file!");

        fwrite($my_controller, "");

        fclose($my_controller);

        echo "$path migration has successfully been created." . PHP_EOL;
    }

    public function migrate(){
        $migration = new Nayo_Migration();
        
        $migration->migrateAll();
    }

    private function makeControllerFile($filename){
        
        $path = APP_PATH . "Controllers/$filename.php";

        $my_controller = fopen($path, "w") or die("Unable to create model file!");

        $controller_template = "<?php
namespace App\Controllers;
use App\Controllers\Base_Controller;

class $filename extends Base_Controller {

    public function __construct(){
        parent::__construct();
    }

}";

        fwrite($my_controller, $controller_template);

        fclose($my_controller);

        echo "$path controller has successfully been created." . PHP_EOL;

    } 


    private function makeModelFile($tablename){

        $modelname = ucfirst($tablename);
        
        $path = APP_PATH . "Models/$modelname.php";

        $my_model = fopen($path, "w") or die("Unable to create model file!");

        $table = 'protected $table = "'.$tablename.'";';
        $property = "";

        foreach($this->readTableColumn($tablename) as $field){

            $property .= "public $".$field."\n";
        }

        $model_template = "<?php  
namespace App\Models;
use Core\Nayo_Model;

class $modelname extends Nayo_Model {

    $property
    
    $table

    public function __construct(){
        parent::__construct();
    }

}";

        fwrite($my_model, $model_template);

        fclose($my_model);

        echo "$path model has successfully been created." . PHP_EOL;
    }

    private function readTableColumn($tablename){
        $db = new Database();

        $sql = "DESC ". $tablename;
        $result = $db->getAll($sql);
        $fields = array();
        if($result){
            foreach ($result as $v) {

                $fields[] = $v['Field'].";";

            }
        }

        return $fields;
    }
}