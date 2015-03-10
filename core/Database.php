<?php

class Database { //to use Database class: $db = Database::getInstance();
    private $_connection;
    private static $_instance;

    private function __construct(){//private to prevent multiple db objects
        $dsn = 'mysql:dbname=finance_app;host=127.0.0.1';
        $user = 'root';
        $password = '';
        try {
            $this->_connection = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getInstance(){
        if(!self::$_instance){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getConnection(){
        return $this->_connection;
    }
}