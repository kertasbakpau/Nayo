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

}
