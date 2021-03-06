<?php
namespace App\Controllers;
use App\Models\M_users;
use App\Models\M_groupusers;
use App\Controllers\Base_Controller;

class M_user extends Base_Controller{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $users = new M_users();
        $params = array(
            'where' => array(
                'Username !' => 'superadmin'
            )
        );

        $result = $users->findAll($params);
        // echo json_encode($result);
        $data['model'] = $result;
        $this->loadView('m_user/index', $data);
        
    }   

    public function add(){
        
        $users = new M_users();
        $data['model'] = $users;
        $this->loadView('m_user/add', $data);
    }

    public function addsave(){

        $groupid    = $this->request->post('groupid');
        $username   = $this->request->post('named');
        $password   = $this->request->post('password');

        $model = new M_users();
        $model->M_Groupuser_Id = $groupid;
        $model->Username = $username;
        $model->setPassword($password);
        $model->IsLoggedIn = 0;
        $model->IsActive = 1;
        $model->Language = 'indonesia';
        $model->CreatedBy = $_SESSION[get_variable().'userdata']['Username'];
        $model->save();

        redirect('muser/add');

    }

    public function edit($id){
        $model = new M_users();
        $users = $model->find($id);
        $data['model'] = $users;
        $this->loadView('m_user/edit', $data);
    }

    public function editsave(){
        
        $id = $this->request->post('iduser');
        $name = $this->request->post('named');
        $description = $this->request->post('description');

        $model = new M_users();
        $users = $model->find($id);
        $users->GroupName = setisnull($name);
        $users->Description = setisnull($description);
        // echo json_encode($users);
        $users->save();

        redirect('muser');
    }
}