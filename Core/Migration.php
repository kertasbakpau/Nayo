<?php
namespace Core;
use  Core\Database\Database;

class Nayo_Migration {
    protected $db = false;
    public $enable_auto_migration = FALSE;
    public function __construct(){

        include "App\Config\Config.php";

        $this->enable_auto_migration = $config['enable_auto_migration'];

        if(!$this->db)
            $this->db = new Database;
    }

    public function migrateAll(){
        if(!$this->isTableExist('migrations'))
            $this->createMigrationTable();
    
        $files = $this->readMigrationDatabaseFile();
        $version = $this->getMigrationVersion();

        foreach($files as $key => $file){
            if(!in_array($file, $version)) {
                $this->migrate($key);
            }
        }
        
        
    }

    public function isTableExist($table){
        $sql = "SELECT count(*) as count
        FROM information_schema.TABLES
        WHERE (TABLE_SCHEMA = '{$this->db->currentdb}') AND (TABLE_NAME = '{$table}')";

        $result = $this->db->query($sql);

        $data = mysqli_fetch_assoc($result);
        
        if($data['count'] > 0){
            return true;
        }

        return false;
    }

    private function createMigrationTable(){
        $sql = "
        CREATE TABLE `migrations` (
            `Id` int(11) NOT NULL AUTO_INCREMENT,
            `Version` varchar(50) DEFAULT NULL,
            `ExecutedAt` DATETIME DEFAULT NULL,
            PRIMARY KEY (`Id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8
        ";

        $result = $this->db->query($sql);

    }

    public function migrate($version){
        $path = APP_PATH . "Database\\Migrations\\".$version.".sql";
        $sql = file_get_contents($path);
        $result = $this->db->query($sql);


    }

    private function readMigrationDatabaseFile(){
        $path = APP_PATH . "Database/Migrations/";
        $version = array();
        if ($handle = opendir($path)) {

            while (false !== ($entry = readdir($handle))) {
        
                if ($entry != "." && $entry != "..") {
                    $version[explode(".", $entry)[0]] = $entry;
                }
            }
        
            closedir($handle);
        }
        // echo json_encode($version);
        return $version;
    }

    private function getMigrationVersion(){
        $sql = "SELECT * FROM migrations";
        $result = $this->db->query($sql);
        $data = mysqli_fetch_assoc($result);
        if($data)
            return count($data);
        return array();
    }
}