<?php
class Home extends Controller{

    public function index(){
        //$db = Database::getInstance();
        $db = $this->db;
        $sql = "SELECT * FROM stocks ORDER BY last_change_procent DESC LIMIT 4";
        $data = $db->query_sql($sql, []);
        $this->view('start_view', $data);
    }

    public function contact(){
        $this->view('contact_view', []);
    }

    public function about(){
        $this->view('about_view', []);
    }
}

