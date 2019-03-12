<?php
namespace App\Controllers;
use App\Models\M_groupusers;
use App\Controllers\Base_Controller;

class M_groupuser extends Base_Controller{
    
    public function __construct(){
        parent::__construct();

    }

    public function index(){
        $groupusers = new M_groupusers();
        
        $params = array(
            'order' => array(
                'GroupName' => 'DESC'
            )
        );

        $result = $groupusers->findAll($params);
        // echo json_encode($result);
        $data['model'] = $result;
        $this->loadView('m_groupuser/index', $data);
        
    }

    public function create(){
        $groupusers = new M_groupusers();
        $data['model'] = $groupusers;
        $this->loadView('m_groupuser/add', $data);
    }

    public function store(){
        // $name = $this->request->post('named');
        // $description = $this->request->post('description');

        // $groupusers = new M_groupusers();
        // $groupusers->GroupName = setisnull($name);
        // $groupusers->Description = setisnull($description);
        // $groupusers->save();

        // redirect('M_groupuser/add');

        // echo $id;

    }

    public function edit($id){
        $model = new M_groupusers();
        $groupusers = $model->find($id);
        $data['model'] = $groupusers;
        $this->loadView('m_groupuser/edit', $data);
    }

    public function editsave(){
        
        $id = $this->request->post('idgroupuser');
        $name = $this->request->post('named');
        $description = $this->request->post('description');

        $model = new M_groupusers();
        $groupusers = $model->find($id);
        $groupusers->GroupName = setisnull($name);
        $groupusers->Description = setisnull($description);
        // echo json_encode($groupusers);
        $groupusers->save();

        redirect('M_groupuser');
    }
}