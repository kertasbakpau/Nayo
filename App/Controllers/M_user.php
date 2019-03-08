<?php
namespace App\Controllers;
use App\Base_Controller;
use App\Models\M_users;

class M_user extends Base_Controller{
    
    public function __construct(){
        // parent::__construct();
    }

    public function index(){
        $users = new M_users();
        $result = $users->findAll();
        foreach($result as $object){
            echo $object->get_M_Groupuser()->GroupName;
        }
        // $data['model'] = $result;
        // $this->loadView('m_user/index', $data);
        
    }

    public function addsave(){
        
        $users = new M_users();
        $users->GroupName = "Test";
        $users->Description = "Test";
        $users->save();
    }

    

    public function editsave(){
        
        $model = new M_users();
        $users = $model->find(6);
        $users->GroupName = "Tod";
        $users->Description = "Tod";
        // echo json_encode($users);
        $users->save();
    }
}