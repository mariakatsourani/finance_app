<?php
class Stock extends Controller{
    public function index(){
        $db = Database::getInstance();
        $sql = "SELECT * FROM stocks";
        $data = $db->query_sql($sql, []);
        $this->view('nasdaq_view', $data);
    }
    /*public function show($symbol){
        $db = Database::getInstance();
        $sql = "SELECT * FROM stocks WHERE symbol=:symbol";
        $params = ['symbol' => $symbol];
        $stock = $db->query_sql($sql, $params);
        //var_dump($stock[0]);
        $data = $stock[0];
        $this->view('nasdaq_view', $data);
    }*/
    public function insert()
    {
        $db = Database::getInstance();
        //get data
        $url = 'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22AAPL%22%2C%20%22GOOG%22%2C%20%22MSFT%22%2C%20%22AMZN%22%2C%20%22FB%22%2C%20%22EBAY%22%2C%20%22HM-B.ST%22%2C%20%22TWTR%22%2C%20%22SNE%22%2C%20%22VOLV-B.ST%22)&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=';
        $content = file_get_contents($url);
        $info = json_decode($content, true);
        $info = $info['query']['results']['quote'];
        var_dump($info);
        /*foreach($info as $stock){
            $data = array(
                "name" => $stock['Name'],
                "symbol" => $stock['Symbol'],
                "last_price" => $stock['Ask'],
                "last_change_procent" => $stock['PercentChange'],
                "last_change" => $stock['Change'],
                "available_for_shop" => $stock['AverageDailyVolume'],
            );
            $db->insert('stocks', $data);
        }
        */
    }
}