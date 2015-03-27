<?php
class Controller {

    protected $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    protected function view($view, $data){
        if(file_exists('../finance_app/views/' . $view . '.php')){
            require_once '../finance_app/views/' . $view . '.php';
        }else{
            $error = new Error();
            $error->viewNotFound();
        }
    }

    protected function getUser(){
        //if($this->isLoggedin()){
            $db = Database::getInstance();
            $result = $db->query_sql('SELECT * FROM users WHERE user_id=:current_user',
                                        array('current_user' => $_SESSION['id']));
            return $result[0];
        /*}else{
            echo "not in";
            return false;
        }*/
    }

    protected function isLoggedin(){
        return (isset($_SESSION['status']) ? true : false);
    }

}