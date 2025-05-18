<?php

class DB{

    private $DB_HOST;
    private $DB_USER;
    private $DB_PASS;
    private $DB_PORT;
    private $DB_NAME;
    protected $co;

    public function __construct(){
        $this->getConfig("default");
        $this->connect();

    }

    private function connect(){
        $this->co = new PDO('mysql:host='.$this->DB_HOST.';port='.$this->DB_PORT.';dbname='.$this->DB_NAME, $this->DB_USER, $this->DB_PASS);
    }

    private function getConfig($Connection_Name){
        $config = include(ROOT.DS."config.php");
        $this->DB_HOST = $config["connections"][$Connection_Name]["host"];
        $this->DB_USER = $config["connections"][$Connection_Name]["user"];
        $this->DB_PASS = $config["connections"][$Connection_Name]["password"];
        $this->DB_PORT = $config["connections"][$Connection_Name]["port"];
        $this->DB_NAME = $config["connections"][$Connection_Name]["dbname"];
    }



}