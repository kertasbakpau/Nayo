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

    public function add(){
        $groupusers = new M_groupusers();
        $data = setPageData_paging($groupusers);
        $this->loadView('m_groupuser/add', $data);
    }

    public function addsave(){
        $name = $this->request->post('named');
        $description = $this->request->post('description');

        $groupusers = new M_groupusers();
        $groupusers->GroupName = setisnull($name);
        $groupusers->Description = setisnull($description);

        $validate = $groupusers->validate();
        if($validate){
            
            $data = setPageData_paging($groupusers);
            $this->session->setFlash('add_warning_msg', $validate);
            $this->loadView('m_groupuser/add', $data);
        } else {

            $groupusers->save();
            $this->session->setFlash('success_msg', array(0=>'Form.datasaved'));
            redirect('mgroupuser/add');
        }

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

        redirect('mgroupuser');
    }

    public function delete(){
        $id = $this->request->post("id");
        $groupuser = new M_groupusers();
        $model = $groupuser->find($id);
        $model->delete();
        // echo json_encode($model);
        // $form = $this->paging->get_form_name_id();
        // if($this->M_groupusers->is_permitted($_SESSION[get_variable().'userdata']['M_Groupuser_Id'],$form['m_groupuser'],'Delete'))
        // {   
        //     $deleteData = $this->M_groupusers->get($id);
        //     $delete = $deleteData->delete();
        //     if(isset($delete)){
        //         $deletemsg = $this->helpers->get_query_error_message($delete['code']);
        //         //$this->session->set_flashdata('warning_msg', $deletemsg);
        //         echo json_encode(delete_status($deletemsg, FALSE));
        //     } else {
        //         $deletemsg = $this->paging->get_delete_message();
        //         //$this->session->set_flashdata('delete_msg', $deletemsg);
        //         echo json_encode(delete_status($deletemsg));
        //     }
        // } else {
        //     echo json_encode(delete_status("", FALSE, TRUE));
        // }
    }
}