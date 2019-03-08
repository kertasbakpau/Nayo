<?php
namespace Core\Database;

use Core\Database\Database;
class DBResult {
    protected $sql = "";
    protected $db = false;
    protected $conn = false;
    protected $result = array();
    protected $table = "";
    protected $fields = array();

    public function __construct($table){
        $this->table = $table;  
        if(!$this->db){
            $this->db = new Database();

        }
            
        $this->sql = "select * from ".$this->table;
        // field collected
        $this->getFields();
        
    }

    private function getFields(){

        $sql = "DESC ". $this->table;
        $result = $this->db->getAll($sql);
        $pk;
        if($result){
            foreach ($result as $v) {

                $this->fields[] = $v['Field'];

                if ($v['Key'] == 'PRI') {

                    // If there is PK, save it in $pk

                    $pk = $v['Field'];

                }

            }
        }
        // If there is PK, add it into fields list
        if (isset($pk)) {

            $this->fields['pk'] = $pk;

        }

    }

    public function pk(){
        return $this->fields['pk'];
    }

    public function query($sql){
        $query = $this->db->getAll($sql);
        return $query;
    }


    public function getAllData($append = ""){
        $query = $this->db->getAll($this->sql." ".$append); 
        // $result = mysqli_fetch_assoc($query);
        foreach($query as $row) {
            array_push($this->result, $row);
        }
        return $this->result;
    }

    public function getOneData(){

    }

    public function getById($id){
        $this->sql = "select * from ".$this->table. " where ".$this->pk()." = ".$id;
        $query = $this->db->getOne($this->sql);
        $this->result = $query;
        return $this->result;
    }

    public function insert($object){
        $field_list = array();  //field list string

        $value_list = array();  //value list string

        foreach($object as $key => $value){
            if(!empty($value)){
                $field_list[] = $key;
                $value_list[] = "'".$value."'";
            }
                
        }

        $this->sql = "INSERT INTO {$this->table} (".implode(",",$field_list).") VALUES(".implode(",",$value_list).")";
        if ($this->db->query($this->sql)) {
            return $this->db->getInsertId();
        } else {
            return false;

        }
    }

    public function update($object){
        $list = array();
        foreach($object as $key => $value){
            if(!empty($value) && $key != "Id"){
                
                $list[] = $key." = '".$value."'";
            }
                
        }
        $pk = $this->pk();
        $this->sql = "UPDATE {$this->table} SET ".implode(",",$list)." WHERE Id = ".$object->$pk;
        if ($this->db->query($this->sql)) {
            return $object->$pk;
        } else {
            return false;
        }
    }

    public function where($params){
        foreach($params as $param){
            $table = (isset($param['table']) ? $param['table'] : FALSE);
            $on = (isset($param['on']) ? $param['on'] : FALSE);
            $type = (isset($param['type']) ? $param['type'] : FALSE);

        }
    }

    //no finished
    public function join($params){

        foreach($params as $param){
            $table = (isset($param['table']) ? $param['table'] : FALSE);
            $on = (isset($param['on']) ? $param['on'] : FALSE);
            $type = (isset($param['type']) ? $param['type'] : FALSE);

        }
    }

}
