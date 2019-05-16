<?php
namespace App\Models;
use Core\Nayo_Model;

class Base_Model extends Nayo_Model {
    
    public $CreatedBy;
    public $ModifiedBy;
    public $Created;
    public $Modified;

    public function __construct(){
        parent::__construct();
    }

}