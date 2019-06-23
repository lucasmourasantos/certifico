<?php

namespace app;

class DB extends \PDO
{
    public function __construct($dsn = null, $username = null, $password = null, $options = array())
    {
        $dsn = ($dsn != null) ? $dsn : sprintf('mysql:dbname=%s;host=%s', MYSQL_DBNAME, MYSQL_HOST);
        $username = ($username != null) ? $username : MYSQL_USER;
        $password = ($password != null) ? $password : MYSQL_PASS;

        parent::__construct($dsn, $username, $password, $options);
    }
}

/*
private $server;
   private $database;
   private $username;
   private $password;

   function __construct(){
       $url = parse_url(getenv("mysql://b5ee2adc25aa24:2ed683a3@us-cdbr-iron-east-02.cleardb.net/heroku_78a881d13ca0c35?reconnect=true"));

       $this->$server = $url["us-cdbr-iron-east-02.cleardb.net"];
       $this->$username = $url["b5ee2adc25aa24"];
       $this->$password = $url["2ed683a3"];
       $this->$database = substr($url["heroku_78a881d13ca0c35"], 1);

   }

   function connection(){
       mysqli_report(MYSQLI_REPORT_STRICT);

       try{
           $mysqli = new mysqli($this->server, $this->username, $this->password, $this->database);
       }
       catch (Exception $e ) {
           echo file_get_contents("Pagine/ContattiInizio.xhtml");
           echo "message: " . $e->getMessage();   //This show a "no such a file or directory" error
           exit;
       }

       return $mysqli;
   }
*/
