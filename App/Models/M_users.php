<?php
namespace App\Models;
use App\Models\Base_Model;

class M_users extends Base_Model {
    public $Id;
    public $M_Groupuser_Id;
    public $Username;
    public $Password;
    public $IsLoggedIn;
    public $IsActive;
    public $Language;

    protected $table = 'm_users';
    protected $entity = 'M_User';

    public function setPassword($password){
        $this->Password = encryptMd5(get_variable().$this->Username.$password);
        return $this->Password;
    }

}
