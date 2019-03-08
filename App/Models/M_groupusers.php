<?php
namespace App\Models;
use App\Models\Base_Model;
class M_groupusers extends Base_Model {
    public $Id;
    public $GroupName;
    public $Description;
    public $Deleted;

    protected $table = 'm_groupusers';

    public function getdata(){
        return $this->query('SELECT * FROM m_groupusers');
    }

}
