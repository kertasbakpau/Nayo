<?php
namespace App\Controllers;
use Core\Libraries\File;
use Core\Database\DBBuilder;

class Test extends Base_Controller{

    public function index(){
        // $ftp = new Ftp('192.168.1.30', 'Komputer', 'ratrace182');
        // if($ftp->connect()){
        //     // $ftp->download('D:\0.andik\20190329_134010_02_01_slide_nature.jpg','/uploads/images/20190329_134010_02_01_slide_nature.jpg');
        //     $ftp->mkdir('//uploads//','music');
        // }

        // $ftp->close();
        // $builder = new DBBuilder();
        // $test = $builder->query('select count(*) as Count from m_groupusers');
        // echo json_encode($test->Count);
        $this->loadView('test/test');
       
    }

    public function submittest(){
        $file = new File('/assets/', array('pdf, docx'));

        $file->upload($_FILES['file']);
        echo $file->getErrorMessage();
        // echo json_encode($_FILES);
    }

}