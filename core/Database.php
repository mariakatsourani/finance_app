<?php

class Database { //to use Database class: $db = Database::getInstance();
    private $connection;
    private static $instance;

    private function __construct(){//private constructor to prevent multiple db objects
        $dsn = 'mysql:dbname=finance_app;host=127.0.0.1';
        $user = 'root';
        $password = '';
        try {
            $this->connection = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getInstance(){//if no instance exists create one otherwise return the existing one
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->connection;
    }


    //---- CRUD functions ----

    public function insert($table, $data){
        $fields = $this->formatFields($data);
        $values = $this->formatValues($data);
        //echo "INSERT INTO " .  $table . " (" . $fields .") VALUES " . $values;
        $insertStm = $this->connection->prepare("INSERT INTO $table ($fields) VALUES $values");
        $this->checkStmSuccess($insertStm);
    }

    public function query_sql($sql, $params){
        $queryStm = $this->connection->prepare($sql);
        foreach($params as $key => &$value){ //pass $value as a reference to the array item
            $queryStm->bindParam($key, $value);
        }
        $this->checkStmSuccess($queryStm);
        $result = $queryStm->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($result);
        return $result;
    }

    public function update(){

    }

    public function delete(){

    }

    //---- Helper functions ----

    public function formatFields($data){
        $fields = '';
        end($data); // move the internal pointer to the end of the array
        $lastElement = key($data); // fetches the key of the element pointed to by the internal pointer

        if ($data == "*"){
            $fields = "*";
        }else if ($this->isAssoc($data)){
            foreach($data as $key => $value){
                $fields .= $key;
                if ($key != $lastElement){
                    $fields .= ", ";
                }
            }
        }else{
            foreach($data as $key => $value){
                $fields .= $value;
                if ($key != $lastElement){
                    $fields .= ", ";
                }
            }
        }
        return $fields;
    }

    public function formatValues($data){
        $values= '(';
        end($data); // move the internal pointer to the end of the array
        $lastElement = key($data); // fetches the key of the element pointed to by the internal pointer

        foreach($data as $key => $value){
            $values .= "'" . $value . "'";
            if ($key != $lastElement){
                $values .= ", ";
            }else{
                $values .= ")";
            }
        }
        return $values;
    }

    public function isAssoc($arr)
    {
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    public function checkStmSuccess($stm){
        //var_dump($stm);
        if($stm->execute()){
            //echo "Successfully executed.";
            return true;
        }else{
            //echo "Execution failed.";
            return false;
        }
    }

}