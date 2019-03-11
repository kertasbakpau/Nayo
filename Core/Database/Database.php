<?php
namespace Core\Database;

class Database {

    protected $conn = false;  //DB connection resources

    protected $sql;           //sql statement

   

    /**

     * Constructor, to connect to database, select database and set charset

     * @param $db string configuration array

     */

    public function __construct(){
        require 'App\Config\Database.php';

        $host = isset($db['default']['host'])? $db['default']['host'] : 'localhost';

        $user = isset($db['default']['user'])? $db['default']['user'] : 'root';

        $password = isset($db['default']['password'])? $db['default']['password'] : '';

        $dbname = isset($db['default']['dbname'])? $db['default']['dbname'] : '';

        $port = isset($db['default']['port'])? $db['default']['port'] : '3306';

        $charset = isset($db['default']['charset'])? $db['default']['charset'] : '3306';


        if (!$this->conn) {
            $this->conn = mysqli_connect("$host", $user, $password, $dbname) or die('Database connection error');
            // die("Connection failed: " . mysqli_connect_error());
        } 

    }

    public function getConnection(){
        return $this->conn;
    }

    public function query($sql){        

        $this->sql = $sql;

        // Write SQL statement into log

        $str = $sql . "  [". date("Y-m-d H:i:s") ."]" . PHP_EOL;

        file_put_contents("log.txt", $str,FILE_APPEND);
        $result = mysqli_query($this->conn, $this->sql);

        if (! $result) {

            die($this->errno().':'.$this->error().'<br />Error SQL statement is '.$this->sql.'<br />');

        }

        return $result;

    }

    public function getAll($sql){
        // echo $sql;
        $query = $this->query($sql);
        
        $list = array();
        if($query){
            while ($row = mysqli_fetch_assoc($query)){
                $list[] = $row;

            }
        }
        // echo json_encode($list);

        return $list;

    }

    public function getOne($sql){
        // echo $sql;
        $query = $this->query($sql);
        
        $single;
        if($query){
            $single = mysqli_fetch_assoc($query);
        }
        // echo json_encode($list);

        return $single;

    }

    /**

     * Get last insert id

     */

    public function getInsertId(){

        return mysqli_insert_id($this->conn);

    }

    /**

     * Get error number

     * @access private

     * @return error number

     */

    public function errno(){

        return mysqli_errno($this->conn);

    }

    /**

     * Get error message

     * @access private

     * @return error message

     */

    public function error(){

        return mysqli_error($this->conn);

    }
    
}