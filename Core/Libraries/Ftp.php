<?php
namespace Core\Libraries;

class Ftp {
    protected $connection; 
    protected $host = false;
    protected $user = false;
    protected $password = false;
    protected $port = 21;

    public function __construct($host, $user, $password, $port = 21){

        if(!$this->host)
            $this->host = $host;
            
        if(!$this->user)
            $this->user = $user;
        
        if(!$this->password)
            $this->password = $password;
            
        $this->port = $port;
    }

    private function login(){
        if(ftp_login($this->connection, $this->user, $this->password))
            return true;
        return false;
    }

    public function connect() : bool{
        $this->connection = ftp_connect($this->host, $this->port, 90);
        if($this->connection) {
            if($this->login())
                return true;
            return false;
        }
        return false;
    }

    public function download($localpath, $remotefile){
        ftp_get($this->connection, $localpath, $remotefile, FTP_ASCII, 0);
    }

    public function upload($localpath, $remotefile){
        ftp_get($this->connection, $localpath, $remotefile, FTP_ASCII, 0);
    }

    public function mkdir($dirname, $currentdir = null){
        if(!empty($currentdir))
            ftp_chdir($this->connection, $currentdir);

        ftp_mkdir($this->connection, $dirname);
    }

    public function close(){
        ftp_close($this->connection);
    }

}