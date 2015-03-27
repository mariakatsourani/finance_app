<?php
class Home extends Controller{

    public function index(){
        $db = Database::getInstance();
        $sql = "SELECT * FROM stocks ORDER BY last_change_procent DESC LIMIT 5";
        $data = $db->query_sql($sql, []);
        $this->view('start_view', $data);
    }
}