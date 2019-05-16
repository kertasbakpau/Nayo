<?php
namespace App\Controllers;
use Core\Libraries\File;
use Core\Database\DBBuilder;
use Core\Libraries\ClsList;
use App\Models\M_users;
use Core\Nayo_Controller;
use Core\Libraries\Dictionary;

class Test extends Nayo_Controller{

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
        // $this->loadView('test/test');
        // echo "sdfsdf";
        $arr = new Dictionary();
        $arr->add("a",10);
        $arr->add("b",20);
        $arr->add("c",30);
        // echo json_encode($arr->find("c"));
        $t = $arr->where(function($value, $key){
            return $value > 10;
        });
        echo json_encode($t);
        // $list = new ClsList(new M_users);
        // echo $list->getCollectionType();
       
    }

    public function submittest(){
        $file = new File('/assets/', array('pdf, docx'));

        $file->upload($_FILES['file']);
        echo $file->getErrorMessage();
        // echo json_encode($_FILES);
    }

}