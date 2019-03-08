<?php
namespace App\Models;
use Core\Nayo_Model;

class Base_Model extends Nayo_Model {
    
    public $CreatedBy;
    public $ModifiedBy;
    public $Created;
    public $Modified;

    public function __call($name, $argument){

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
            $field = $this->table.'_Id';

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
            $field = $this->table.'_Id';

            $entityobject = new $entity;
			if(isset($this->Id)){
                $params = array(
                    'where' => array(
                        $field => $this->Id
                    )
                );
                $result = $entityobject->first($params, true);

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
if (!function_exists('mysqldatetime'))
{
	function mysqldatetime($timestamp)
	{
		$date = new DateTime();
		$date->setTimezone(new DateTimeZone('Asia/Jakarta'));
		return $date->format('Y-m-d H:i:s');
		//return date('Y-m-d H:i:s', $timestamp);
	}
}
if (!function_exists('model'))
{
	function model($entity)
	{
		helper('inflector');
		return ucfirst(plural($entity)).'_model';
		//return plural($entity);
	} 
}
if (!function_exists('table'))
{
	function table($entity)
	{
		return $entity."s";
	}
}