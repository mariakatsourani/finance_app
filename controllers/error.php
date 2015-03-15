<?php
class Error extends Controller{

    public function index(){
        echo "Some error occurred.";
    }

    public function pageNotFound(){
        echo "The URL you requested is invalid.";
    }

    public function viewNotFound(){
        echo "Sorry but this file was not found in /views.";
    }
}