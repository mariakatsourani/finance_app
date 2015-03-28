<?php

class User extends Controller{

		public function shop(){
			
			if(isset($_POST["shop"])){
				$price = //api value;
				$stock_amount = $_POST["stock_amount"];// get the value from the template
				$total_price = $stock_amount * $price;
				$user_id = $_SESSION["user_id"];
				$stock_id = $_POST["stock_id"];// get the value from the template by a hidden input
				
				// check whether this stock already exists 
				$db = new PDO("mysql:host=localhost;dbname=finance_app", "root", "root");
				$checkStock = $db->prepare('SELECT COUNT(*) FROM transactions WHERE user_id = :user_id AND stock_id = :stock_id');
				$checkStock->bindParam(":user_id", $user_id, PDO::PARAM_INT);
				$checkStock->bindParam(":stock_id", $stock_id, PDO::PARAM_INT);
				$checkStock->execute();
				$row = $checkStock->fetchColumn();

				if(!$row)
					{
						// have not bought this stock before;
						// it should be inserted into the database;
						$db = new PDO("mysql:host=localhost;dbname=finance_app", "root", "root");
						$shop = $db->prepare('INSERT INTO transactions(stock_id, price, stock_amount, date, total_price)
											VALUES (:stock_id, :price, :stock_amount, NOW(), :total_price) 
											WHERE user_id=:user_id');
						$shop->execute();

					
				}else{
					// have bought this stock before;
					// it should update the old database;
						$db = new PDO("mysql:host=localhost;dbname=finance_app", "root", "root");
						$shop = $db->prepare('UPDATE transactions SET price = :price, stock_amount =(stock_amount + :stock_amount), 
											  date = NOW(), total_price = (total_price +:total_price)
											  WHERE user_id =:user_id AND stock_id = :stock_id');
						$shop->execute();
					}
				
				require_once "views/userTemplate";// decided by frontend;
				header ("Location:user");// decided by frontend
			}
		
		}
		
		
		public function sell(){
			
			if(isset($_POST["sell"])){ 
				$price = 5 ;
				$stock_amount = $_POST["stock_amount"];// get the value from the template
				$total_price = $stock_amount * $price; 
				$user_id = $_SESSION["user_id"]; 
				$stock_id = $_POST["stock_id"];// get the value from the template by a hidden input
				
				$db = new PDO("mysql:host=localhost;dbname=finance_app", "root", "root");
				$sell = $db->prepare('UPDATE transactions SET price = :price, stock_amount = (stock_amount-:stock_amount), 
									  date = NOW(), total_price = (total_price-:total_price)
									  WHERE user_id =:user_id AND stock_id =:stock_id');
				$sell->execute();
			
			require_once "views/userTemplate";// decided by frontend
			header ("Location:user");// decided by frontend
			
			}
		
		}
			public function viewPortfolio(){
				$user_id = $_SESSION["id"]; 
				
			
				
				$db = new PDO("mysql:host=localhost;dbname=finance_app", "root", "root");
				$showAll = $db->prepare("SELECT * FROM transactions
				join stocks on transactions.stock_id=stocks.stock_id
									  WHERE user_id =:user_id");
				$showAll->bindParam(":user_id", $user_id, PDO::PARAM_INT);
				
				if($showAll->execute()) {
				
					$result = $showAll->fetchAll(PDO::FETCH_ASSOC);
					//$data = "";
					
					/*foreach ($result as $row){
						$res = $row['price'];
						
						//$stock_id = $row["stock_id"];
						
						
					}*/
					$this->view("portfolio_view", $result);
					
				} else {
					echo "fel";
				}
				
				//insert php code in template in order to see information on portfolio
				
			}
	
	
	
	
			public function addMoney(){ 
				if(isset($_POST['addMoney'])){ //form input button 
					//if(isset($_SESSION))//check if session exists { 
					$db = new PDO("mysql:host=localhost;dbname=finance_app", "root", "root"); 
					$stm = $db->prepare("UPDATE users SET actual_balance= actual_balance +50000 where user_id= :user_id"); 
					$stm->bindParam(":user_id", $_SESSION['id']);
					//var_dump($_SESSION);
						if ($stm->execute()) {
							header("location: /finance_app/views/my_account.php"); //TODO fix header location back to portfolio
							} else { 
								echo "<p>Some Unknown Error!</p>";
							} 
				} 
			}
			
			public function withdraw(){ 
				if(isset($_POST['withdraw'])){ //form input button 
					if(isset($_SESSION))//check if session exists 
					{ $db = new PDO("mysql:host=localhost;dbname=finance_app", "root", "root"); 
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

}
	
	