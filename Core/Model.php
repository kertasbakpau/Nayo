<?php
namespace Core;
use Core\Database\DBResult;
use Core\Database\Database;
use Core\Session;
use Core\Libraries\ClsList;

class Nayo_Model {
    protected $db = false;
    protected $db_result = false;
    protected $session = false;
    // protected $table = false;
    //filtering
    protected $append = "";
    protected $where = array();
    protected $order = array();

    public function __construct(){
        // if(!$this->table)
        //     $this->table = $table;

        if(!$this->db_result)
            $this->db_result = new DBResult($this->table);
        
        if(!$this->db)
            $this->db =  $this->db_result->db;

        if(!$this->session)
            $this->session = new Session();

    }

    public function count($filter = array()){
        $result = $this->findAll($filter);
        return count($result);
    }

    public function findAll($filter = array()){

        $where = (isset($filter['where']) ? $filter['where'] : FALSE);
        $orwhere = (isset($filter['orwhere']) ? $filter['orwhere'] : FALSE);
        $order = (isset($filter['order']) ? $filter['order'] : FALSE);

        if($where)
            $this->where($where);
        
        if($orwhere)
            $this->orWhere($orwhere);

        if($order)
            $this->orderBy($order);

        $results = $this->db_result->getAllData($this->append);
        $this->append = "";

        $clsList = new ClsList(new $this);

        foreach ($results as $result){
            $object = new $this;
            foreach($result as $key => $row){
                $object->$key = $row;
            }
            // array_push($this->results, $object);
            $clsList->add($object);
        }
        return $clsList->collections();
        // return $this->re;
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
        }
        return $object;
    }

    public function save(){
        $fields = $this->db_result->getFields();
        $userdata = $this->session->get(get_variable().'userdata');

        $newId;
        if(!isset($this->Id)){

            if(in_array("Created", $fields))
                $this->Created = mysqldatetime();

            if(in_array("CreatedBy", $fields))
                $this->CreatedBy = $userdata['Username'];

            $newId = $this->db_result->insert($this);
        }
        else {
            
            if(in_array("Modified", $fields))
                $this->Modified = mysqldatetime();

            if(in_array("ModifiedBy", $fields))
                $this->ModifiedBy = $userdata['Username'];

            $newId = $this->db_result->update($this);
        }

        return $newId;
    }

    public function delete(){
        $this->db_result->delete($this->Id);
        // return $this;
    }

    private function where($where){
        $qry="";
        if(count($this->where) == 0)
            $qry = " WHERE ";
        else 
            $qry = " AND ";
        
        $wheres = array();

        foreach($where as $k => $v){
            $newVal = escapeString($v);
            array_push($this->where, "{$k}= '{$newVal}'") ;
            array_push($wheres, "{$k}= '{$newVal}'") ;
        }

        $this->append .= $qry.implode(" AND ", $wheres);
        // echo $this->append;
        return $this;
    }

    private function orWhere($orwhere){
        $qry="";
        if(count($this->where) == 0)
            $qry = " WHERE ";
        else 
            $qry = " OR ";

        $wheres = array();

        foreach($orwhere as $k => $v){
            $newVal = escapeString($v);
            array_push($this->where, "{$k}= '{$newVal}'") ;
            array_push($wheres, "{$k}= '{$newVal}'") ;
        }

        $this->append .= $qry.implode(" OR ", $wheres);

        return $this;
    }

    private function orderBy($order){
        $qry = " ORDER BY ";

        foreach($order as $k => $v){
            array_push($this->order, "{$k} {$v}") ;
        }

        $this->append .= $qry.implode(" , ", $this->order);
        
        return $this;
    }

    public function __call($name, $argument){
        // echo $name;

        if (substr($name, 0, 4) == 'get_' && substr($name, 4, 5) != 'list_' && substr($name, 4, 6) != 'first_' )
		{
			$entity = 'App\\Models\\'.table(substr($name, 4));
            $field = substr($name, 4).'_Id';
            
            $entityobject = new $entity;

			if(isset($this->$field)){
                $result = $entityobject->find($this->$field);
                return $result;
			} else {
				return $entityobject;
			}
			
		} else if (substr($name, 0, 4) == 'get_' && substr($name, 4, 5) == 'list_') {
            
            $entity = 'App\\Models\\'.table(substr($name, 9));
            $field = entity($this->table).'_Id';
			if(isset($this->Id)){
                $entityobject = new $entity;
                $params = array(
                    'where' => array(
                        $field => $this->Id
                    )
                );
                $result = $entityobject->findAll($params);
				return $result;
			}
            return array();

        } else if (substr($name, 0, 4) == 'get_' && substr($name, 4, 6) == 'first_') {

            $entity = 'App\\Models\\'.table(substr($name, 10));
            $field = entity($this->table).'_Id';

            $entityobject = new $entity;
			if(isset($this->Id)){
                $params = array(
                    'where' => array(
                        $field => $this->Id
                    )
                );
                $result = $entityobject->findOne($params, true);

				return $result;
            }
            
            return null;

		} else {
			trigger_error('Call to undefined method '.__CLASS__.'::'.$name.'()', E_USER_ERROR);
		}
        
    }

}


if (!defined('MYSQL_EMPTYDATE')) define('MYSQL_EMPTYDATE', '0000-00-00');
if (!defined('MYSQL_EMPTYDATETIME')) define('MYSQL_EMPTYDATETIME', '0000-00-00 00:00:00');

if (!function_exists('table'))
{
	function table($entity)
	{
		return pluralize($entity);
	}
}  

if (!function_exists('table'))
{
	function entity($table)
	{
        $word = titleize(singularize($table));
        $split = explode(" ", $word);
        return implode("_", $split);
	}
}  
    
