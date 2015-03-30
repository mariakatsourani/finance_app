<?php

class User extends Controller{

    public function shop(){
        if(!$this->isLoggedin()){
            header('location: /finance_app/');
        }
        if(isset($_POST["shop"])){
            $user_id = $_SESSION["id"];
            $stock_id = $_POST["stock_id"];// get the value from the template by a hidden input
            $stock = $this->db->query_sql('SELECT * FROM stocks WHERE stock_id=:id', ['id' => $stock_id]);
            $price = $stock[0]['last_price'];
            $available = $stock[0]['available_for_shop'];

            //check amount of stocks
            if($_POST["stock_amount"] <= $available){
                $stock_amount = $_POST["stock_amount"];// get the value from the template
                $total_price = $stock_amount*$price;
                //check if balance is lower than total price
                $user_details = $this->getUser();
                if($total_price <= $user_details['actual_balance']){
                    //insert new transaction
                    $sql = 'INSERT INTO transactions(user_id, stock_id, price, stock_amount, total_price)
                            VALUES (:user_id, :stock_id, :price, :stock_amount, :total_price)';
                    $params = array(
                        'user_id' => $user_id,
                        'stock_id' => $stock_id,
                        'price' => -$price,
                        'stock_amount' => $stock_amount,
                        'total_price' => -$total_price
                    );
                    $this->db->query_sql($sql, $params);


                    //update balance
                    $updateBalance = 'UPDATE users SET actual_balance = (actual_balance - :total_price)
                                      WHERE user_id=:user_id';
                    $params = array('total_price' => $total_price, 'user_id' => $user_id);
                    $this->db->query_sql($updateBalance, $params);


                    // check whether this stock already exists
                    $sql = 'SELECT * FROM users_stocks WHERE user_id = :user_id AND stock_id = :stock_id';
                    $params = array('user_id' => $user_id, 'stock_id' => $stock_id);
                    $result = $this->db->query_sql($sql, $params);

                    if(!$result)
                    {   // have not bought this stock before;
                        // it should be inserted into the database;
                        //add stock to users owned stocks
                        $sql = 'INSERT INTO users_stocks (user_id, stock_id, total_stocks)
                        VALUES (:user_id, :stock_id, :total_stocks)';
                        $params = array(
                            'user_id' => $user_id,
                            'stock_id' => $stock_id,
                            'total_stocks' => $stock_amount
                        );
                        $this->db->query_sql($sql, $params);

                    }
                    else {
                        // have bought this stock before;
                        // it should update the old database;
                        $sql = 'UPDATE users_stocks SET total_stocks =(total_stocks + :stock_amount)
                                WHERE user_id =:user_id AND stock_id = :stock_id';
                        $params = array(
                            'stock_amount' => $stock_amount,
                            'user_id' => $user_id,
                            'stock_id' => $stock_id
                        );
                        $this->db->query_sql($sql, $params);
                    }

                    header ("Location:/finance_app/user/portfolio");// decided by frontend
                }else{
                    header ("Location:/finance_app/account");
                }
            }else{
                header ("Location:/finance_app/account");
            }

        }

    }

    public function sell(){
        if(!$this->isLoggedin()){
            header('location: /finance_app/');
        }
        if(isset($_POST["sell"])){
            $price = $_POST['price'];
            $stock_amount = $_POST["stock_amount"];// get the value from the template
            $total_price = $stock_amount * $price;
            $user_id = $_SESSION["id"];
            $stock_id = $_POST["stock_id"];// get the value from the template by a hidden input

            //get total number of owned stocks
            $total_stocks = $this->db->query_sql('SELECT total_stocks FROM users_stocks
                                                  WHERE user_id=:user_id AND stock_id=:stock_id',
                array('user_id' => $user_id, 'stock_id' => $stock_id));
            if(($stock_amount <= $total_stocks[0]['total_stocks']) && ($stock_amount > 0)){
                var_dump($price, $stock_amount, $total_price, $stock_id);
                //insert transaction
                //insert new transaction
                $sql = 'INSERT INTO transactions(user_id, stock_id, price, stock_amount, total_price)
                        VALUES (:user_id, :stock_id, :price, :stock_amount, :total_price)';
                $params = array(
                    'user_id' => $user_id,
                    'stock_id' => $stock_id,
                    'price' => $price,
                    'stock_amount' => $stock_amount,
                    'total_price' => $total_price
                );
                $this->db->query_sql($sql, $params);

                //update balance
                $updateBalance = 'UPDATE users SET actual_balance = (actual_balance + :total_price)
                                      WHERE user_id=:user_id';
                $params = array('total_price' => $total_price, 'user_id' => $user_id);
                $this->db->query_sql($updateBalance, $params);

                //if user sold all the stocks delete entry from users_stocks
                $result = $this->db->query_sql('SELECT total_stocks FROM users_stocks
                                      WHERE user_id=:user_id AND stock_id=:stock_id',
                    array('user_id' => $user_id, 'stock_id' => $stock_id));
                if($result[0]['total_stocks'] - $stock_amount == 0){
                    $deleteStock = 'DELETE FROM users_stocks
                                    WHERE user_id =:user_id AND stock_id = :stock_id';
                    $params = array(
                        'user_id' => $user_id,
                        'stock_id' => $stock_id
                    );
                    $this->db->query_sql($deleteStock, $params);
                }else{echo "update";
                    //update users_stocks total_stocks
                    $sql = 'UPDATE users_stocks SET total_stocks =(total_stocks - :stock_amount)
                            WHERE user_id =:user_id AND stock_id = :stock_id';
                    $params = array(
                        'stock_amount' => $stock_amount,
                        'user_id' => $user_id,
                        'stock_id' => $stock_id
                    );
                    $this->db->query_sql($sql, $params);
                }

                header('location:http://localhost/finance_app/user/portfolio');

            }else{
                header('location:http://localhost/finance_app/user/portfolio');
                //echo "You dont have that many";

            }
            /*
            $price = 5 ;
            $stock_amount = $_POST["stock_amount"];// get the value from the template
            $total_price = $stock_amount * $price;
            $user_id = $_SESSION["user_id"];
            $stock_id = $_POST["stock_id"];// get the value from the template by a hidden input

            $db = new PDO("mysql:host=localhost;dbname=finance_app", "root", "");
            $sell = $db->prepare('UPDATE transactions SET price = :price, stock_amount = (stock_amount-:stock_amount),
                                  date = NOW(), total_price = (total_price-:total_price)
                                  WHERE user_id =:user_id AND stock_id =:stock_id');
            $sell->execute();

            require_once "views/userTemplate";// decided by frontend
            header ("Location:user");// decided by frontend
            */

        }

    }

    public function portfolio(){
        if(!$this->isLoggedin()){
            header('location: /finance_app/');
        }

        $getIdsOwned = 'SELECT stock_id FROM users_stocks WHERE user_id=:user_id';
        $params = array('user_id' => $_SESSION['id']);
        $ownedStockIds = $this->db->query_sql($getIdsOwned, $params);
        if($ownedStockIds){
            $stocks = $this->onedimensionalArray($ownedStockIds);

            foreach($stocks as $id){
                $getInfoOwned = 'SELECT s.stock_id, s.symbol, t.price, s.last_price, s.last_change_procent, us.total_stocks
                            FROM transactions AS t
                            JOIN users_stocks AS us ON t.stock_id = us.stock_id
                            JOIN stocks AS s ON t.stock_id = s.stock_id
                            WHERE (t.user_id=:user_id AND t.stock_id=:stock_id)
                            ORDER BY t.date DESC
                            LIMIT 1';
                $params = array('user_id' => $_SESSION['id'], 'stock_id' => $id);
                $ownedStocks[] = $this->db->query_sql($getInfoOwned, $params);
            }
            $data = $this->onedimensionalArray($ownedStocks);
            //var_dump($data);
            $this->view('portfolio_view', $data);
            //var_dump($data);
        }else{
            $this->view('portfolio_view', []);
        }

    }

    public function manageBalance(){
        if(!$this->isLoggedin()){
            header('location: /finance_app/');
        }

        if(isset($_POST['amount'])){
            $amount = $_POST['amount'];
        }

        if(isset($_POST['deposit'])){ //form input button
            //update balance
            $updateBalance = 'UPDATE users SET actual_balance = (actual_balance + :amount)
                              WHERE user_id=:user_id';
            $params = array('amount' => $amount, 'user_id' => $_SESSION['id']);
            $this->db->query_sql($updateBalance, $params);
        }
        else if(isset($_POST['withdraw'])){
            $user_details = $this->getUser();
            if($amount <= $user_details['actual_balance']){
                //update balance
                $updateBalance = 'UPDATE users SET actual_balance = (actual_balance - :amount)
                                  WHERE user_id=:user_id';
                $params = array('amount' => $amount, 'user_id' => $_SESSION['id']);
                $this->db->query_sql($updateBalance, $params);
            }
        }

        header ("Location:/finance_app/account");
    }

    /*public function deposit(){
        if(isset($_POST['deposit'])){ //form input button
            $amount = $_POST['amount'];
            //update balance
            $updateBalance = 'UPDATE users SET actual_balance = (actual_balance + :amount)
                              WHERE user_id=:user_id';
            $params = array('amount' => $amount, 'user_id' => $_SESSION['id']);
            $this->db->query_sql($updateBalance, $params);
        }
    }

    public function withdraw(){
        if(isset($_POST['withdraw'])){ //form input button
            if(isset($_SESSION))//check if session exists
            { $db = new PDO("mysql:host=localhost;dbname=finance_app", "root", "");
              $stm = $db->prepare("UPDATE users SET actual_balance= actual_balance - :money where user_id= :user_id");
              $stm->bindParam(":money", $_POST['amountMoney']); //value of the input what the person writes like -100 kr
              $stm->bindParam(":user_id", $_SESSION['id']);

                if ($stm->execute()) {
                    header("location: /finance_app/views/my_account.php"); //TODO fix header location back to portfolio
                        } else {
                            echo "<p>Some Unknown Error!</p>";
                        }
            }
        }
    }
    */

}
	
	