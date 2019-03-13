<?php
namespace App\Controllers;
use Core\Nayo_Migration;

class Db_migration {

    public function migrate(){
        $migration = new Nayo_Migration();
        
        if($migration->enable_auto_migration){
            $migration = new Nayo_Migration();
            $migration->migrateAll();
        }
    }


}