<?php
class Controller {

    public function view($view, $data){
        if(file_exists('../finance_app/views/' . $view . '.php')){
            require_once '../finance_app/views/' . $view . '.php';
        }else{
            $error = new Error();
            $error->viewNotFound();
        }

    }

}