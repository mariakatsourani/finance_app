<?php

session_start();
echo "initializing...";

//autoload
require_once 'core/Router.php';
require_once 'core/Controller.php';
require_once 'core/Database.php';


//new router
new Router();
