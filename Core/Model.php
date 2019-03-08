<?php
namespace Core;
use Core\Database\DBResult;
use Core\Database\Database;

class Nayo_Model {
    protected $db = false;
    protected $db_result = false;
    protected $results = array();

    //filtering
    protected $append = "";
    protected $where = array();

    public function __construct(){
        if(!$this->db_result)
            $this->db_result = new DBResult($this->table);
        
        if(!$this->db)
            $this->db = new Database();

    }

    // get
    public function query($sql){
        $results = $this->db_result->query($sql);
        return $results;
    }

    public function findAll($filter = array()){

        $where = (isset($filter['where']) ? $filter['where'] : FALSE);
        $orwhere = (isset($filter['orwhere']) ? $filter['orwhere'] : FALSE);

        if($where)
            $this->where($where);
        
            
        if($orwhere)
            $this->orwhere($orwhere);

        $results = $this->db_result->getAllData($this->append);
        $this->append = "";
        // echo json_encode($results);
        foreach ($results as $result){
            $object = new $this;
            foreach($result as $key => $row){
                $object->$key = $row;
                // echo $object->$key;
            }
            array_push($this->results, $object);
        }
        return $this->results;
    }

    

    public function findOne($filter = array()){
        $result = $this->findAll($filter);
        if(count($result) > 0)
            return $result[0];
        return null;
    }

    public function find($id){

        $result = $this->db_result->getById($id);
        $object = new $this;
        foreach($result as $key => $row){
            $object->$key = $row;
            // echo $object->$key;
        }
        return $object;
    }

    public function save(){
        $newId;
        if(!isset($this->Id)){
            $newId = $this->db_result->insert($this);
        }
        else {
            // echo $this->Id;
            $newId = $this->db_result->update($this);
        }

        return $newId;
    }

    public function where($where){
        $qry="";
        if(count($this->where) == 0)
            $qry = " WHERE ";
        else 
            $qry = " AND ";
        
        $wheres = array();

        foreach($where as $k => $v){
            array_push($this->where, "{$k} '{$v}'") ;
            array_push($wheres, "{$k} '{$v}'") ;
        }

        $this->append .= $qry.implode(" AND ", $wheres);
        // echo $this->append;
        return $this;
    }

    public function orwhere($orwhere){
        $qry="";
        if(count($this->where) == 0)
            $qry = " WHERE ";
        else 
            $qry = " OR ";

        $wheres = array();

        foreach($orwhere as $k => $v){
            array_push($this->where, "{$k} '{$v}'") ;
            array_push($wheres, "{$k} '{$v}'") ;
        }

        $this->append .= $qry.implode(" OR ", $wheres);

        return $this;
    }
    
    
}