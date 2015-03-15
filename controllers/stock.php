<?php
class Stock extends Controller{

    public function index(){

    }

    public function show($stock){
        $data = ['name' => $stock ];
        $this->view('stock_summary', $data);
    }

    public function update(){

    }
}