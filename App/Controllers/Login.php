<?php
use Core\Nayo_Controller;
use App\Models\M_users;

class Login extends Nayo_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view('login/login');
    }

    public function dologin(){
        $username = $this->request->post('loginUsername');
        $password = $this->request->post('loginPassword');
        $user = new M_users();

        $params = array(
            'where' => array(
                'password =' => encryptMd5(get_variable().$username.$password)
            )
        );

        $model = $user->findOne($params);
        echo json_encode($model);
    }
}