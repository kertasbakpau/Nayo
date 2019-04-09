<?php
namespace App\Controllers;
use Core\Libraries\Ftp;
use Core\Database\DBBuilder;

class Test {

    public function index(){
        // $ftp = new Ftp('192.168.1.30', 'Komputer', 'ratrace182');
        // if($ftp->connect()){
        //     // $ftp->download('D:\0.andik\20190329_134010_02_01_slide_nature.jpg','/uploads/images/20190329_134010_02_01_slide_nature.jpg');
        //     $ftp->mkdir('//uploads//','music');
        // }

        // $ftp->close();
        $builder = new DBBuilder();
        echo json_encode($builder->query('select * from m_userprofiles'));
    }

}