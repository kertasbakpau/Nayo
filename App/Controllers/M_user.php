<?php
namespace App\Controllers;
use App\Models\M_users;
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
        // $data['model'] = $result;
        // $this->loadView('m_user/index', $data);
        
    }   

    public function add(){
        
        $users = new M_users();
        $data['model'] = $users;
        $this->loadView('m_user/add', $data);
    }

    public function addsave(){
        $name = $this->request->post('named');
        $description = $this->request->post('description');

        $users = new M_users();
        $users->GroupName = setisnull($name);
        $users->Description = setisnull($description);
        $users->save();

        redirect('M_user/add');

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

        redirect('M_user');
    }
}