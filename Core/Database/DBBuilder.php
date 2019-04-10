<?php
namespace Core\Database;

class DBBuilder {
    
    protected $db_result = false;
    
    public function __construct(){
        if(!$this->db_result)
            $this->db_result = new DBResult();
    }

    public function query(string $sql){
        $results = $this->db_result->query($sql);
        return $results;
    }
    
}
