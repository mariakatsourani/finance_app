<?php
class Home extends Controller{

    public function index(){
        $data = ['test'];
        $this->view('index', $data);
    }
}