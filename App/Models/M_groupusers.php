<?php
namespace App\Models;
use App\Models\Base_Model;
class M_groupusers extends Base_Model {
    public $Id;
    public $GroupName;
    public $Description;
    public $Deleted;

    protected $table = 'm_groupusers';

    public function isDataExist($groupName){
        $params = array(
            'where' => array(
                'GroupName' => $groupName
            )
        );

        if($this->count($params) > 0){
            return true;
        }
        return false;
    }

    public function validate($oldmodel = null){
        $nameexist = false;
        $warning = array();

        if(!empty($oldmodel))
        {
            if($this->GroupName != $oldmodel->GroupName)
            {
                $nameexist = $this->isDataExist($this->GroupName);
            }
        }
        else{
            if(!empty($this->GroupName))
            {
                $nameexist = $this->isDataExist($this->GroupName);
            }
            else{
                $warning = array_merge($warning, array(0=>'Error.group_name_can_not_null'));
            }
        }
        if($nameexist)
        {
            $warning = array_merge($warning, array(0=>'Error.name_exist'));
        }
        
        return $warning;
    }

    public function getdata(){
        return $this->query('SELECT * FROM m_groupusers');
    }

}
