<?php
namespace Core;
use  Core\Database\Database;

class Nayo_Migration {
    protected $db = false;
    public $enable_auto_migration = FALSE;
    protected $files;
    protected $version = array();
    protected $countMigrated = 0;
    public function __construct(){

        include "App\Config\Config.php";

        $this->enable_auto_migration = $config['enable_auto_migration'];

        if(!$this->db)
            $this->db = new Database();
            
        if(!$this->isTableExist('migrations'))
            $this->createMigrationTable();

        $this->files = $this->readMigrationDatabaseFile();
        $this->version = $this->getMigrationVersion();

    }

    public function migrateAll(){

        foreach($this->files as $file){
            $this->migrate($file);
        }        

        echo "migration count : ". $this->countMigrated."<br>";
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

        if(!in_array($version, $this->version)) {
            $path = APP_PATH . "Database\\Migrations\\".$version.".sql";
            $strSql = file_get_contents($path);

            $sqls = explode(";", rtrim($strSql));
            foreach($sqls as $sql){
                $result = $this->db->query($sql.";");

            }
            echo $version. " : migrated successfuly <br>";
            $this->countMigrated ++;
            $insertversion = "INSERT INTO migrations VALUES(null, ".$version.", NOW())";
            $result = $this->db->query($insertversion);
        } else {
        }

    }

    private function readMigrationDatabaseFile(){
        $path = APP_PATH . "Database/Migrations/";
        $version = array();
        if ($handle = opendir($path)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    // echo $entry;
                    array_push($version, explode(".", $entry)[0]);
                }
            }
        
            closedir($handle);
        }
        return $version;
    }

    private function getMigrationVersion(){
        $sql = "SELECT * FROM migrations";
        $result = $this->db->query($sql);
        $data = mysqli_fetch_assoc($result);
        if($data)
            return $data;
        return array();
    }
}