<?php
namespace App\Controllers;
use Core\Nayo_Controller;
use App\Models\M_users;

class Login extends Nayo_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $userSession = $this->session->get(get_variable().'userdata');
        if(!isset($userSession))
            $this->view('login/login');
        else 
            redirect('home');
    }

    public function dologin(){
        $username = $this->request->post('loginUsername');
        $password = $this->request->post('loginPassword');
        $user = new M_users();

        $params = array(
            'where' => array(
                'password' => encryptMd5(get_variable().$username.$password)
            )
        );
        // print_r($user);
        $query = $user->findOne($params);
        // echo json_encode(get_object_vars($query));
        if ($query)  
        {    
            if($query->IsActive == 1){
                //print_r($query->get_list_M_User());  
                $this->session->set(get_variable().'userdata',get_object_vars($query));
                // $this->session->set_userdata(get_variable().'usersettings',get_object_vars($query->get_list_M_Usersetting()[0]));
                // $this->session->set_userdata(get_variable().'userprofile',get_object_vars($query->get_list_M_Userprofile()[0]));
                // $this->session->set_userdata(get_variable().'languages',get_object_vars($query->get_list_M_Usersetting()[0]->get_G_Language()));
                // $this->session->set_userdata(get_variable().'colors',get_object_vars($query->get_list_M_Usersetting()[0]->get_G_Color()));echo json_encode($query);
                redirect('home');
            } else {
                redirect('login');
            }
        }
        else{
            redirect('login');
        }
    }

    public function dologout(){
        $this->session->destroy();
        redirect();
    }
}