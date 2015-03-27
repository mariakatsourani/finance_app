<?php
include dirname(__FILE__) . '/../Database.php';

//get data
$url = 'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22AAPL%22%2C%20%22GOOG%22%2C%20%22MSFT%22%2C%20%22AMZN%22%2C%20%22FB%22%2C%20%22EBAY%22%2C%20%22HM-B.ST%22%2C%20%22TWTR%22%2C%20%22SNE%22%2C%20%22VOLV-B.ST%22)&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=';
$content = file_get_contents($url);
$info = json_decode($content, true);
$info = $info['query']['results']['quote'];

if($info){
    $db = Database::getInstance();

    foreach ($info as $stock){
        $sql = "UPDATE stocks
                    SET last_price =:last_price,
                        last_change_procent =:last_change_procent,
                        last_change =:last_change,
                        available_for_shop =:available_for_shop
                    WHERE symbol =:symbol";
        $params = [
            'last_price' => $stock['Ask'],
            'last_change_procent' => $stock['PercentChange'],
            'last_change' => $stock['Change'],
            'available_for_shop' => $stock['AverageDailyVolume'],
            'symbol' => $stock['Symbol']
        ];
        $db->query_sql($sql, $params);
    }

}


