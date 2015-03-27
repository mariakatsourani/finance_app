<?php
//initialize app

session_start();
//check if class exists in core or controllers folders and if it does include the file
function autoloader($class) {
    if(file_exists('../finance_app/core/' . $class . '.php')){
        include 'core/' . $class . '.php';
    }else if(file_exists('../finance_app/controllers/' . $class . '.php')){
        include 'controllers/' . $class . '.php';
    }else{
        echo "Could not include file";
    }
}

spl_autoload_register('autoloader');


//new router
$router = new Router();
