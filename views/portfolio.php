<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="reset.css">
	<link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="style3.css" />
	<meta charset="UTF-8">
    <script src="js/modernizr.custom.js"></script>

</head>
<body>	



	<div class="header">
        
    <div class="container2">
			<header class="codrops-header">
			<nav id="bt-menu" class="bt-menu">
				<a href="#" class="bt-menu-trigger"><span>Menu</span></a>
				<ul>
					<li><a href="index.html" class="bt-icon icon-user-outline">Start</a></li>
					<li><a href="portfolio.html" class="bt-icon icon-sun">Portfolio</a></li>
					<li><a href="my_account.html" class="bt-icon icon-windows">My account</a></li>
					<li><a href="contact.html" class="bt-icon icon-bubble">Contact</a></li>
				</ul>
			</nav>
    </div><!-- /container -->

	</div>
	<div class="top">

		<ul id="acc">
			<li><h5><?php echo $_SESSION["first_name"]; ?></h5></li>
			<li><h5>LOGOUT</h5></li>
		</ul>

	</div>

	<div class="titlepage">
		
		<span class="bold">PORTFOLIO</span><br/>
		<span class="fontSize">OVERVIEW</span>

	</div>
		

	<div class="container">
	
		<ul class="inlineOver">
			<li>NAME</li>
			<li>PRICE</li>
			<li>PRICE - TODAY</li>
			<li>RETURN</li>
			<li>CHANGE</li>
			<li>AMOUNT</li>
		</ul>
		<hr>
		<ul class="inlineUnder">
			<?php 
			foreach($data as $row){
			?>
				<li><?php echo $row['price'];?></li>
				<li><?php echo $row['symbol'];?></li>
				<li><?php echo $row['name'];?></li>
				<li><?php echo $row['total_price'];?></li>
				<?php
			}
			 ?>
		</ul>
	</div>



	<div class="footer">
		<div class="footerButtons">
			<form method="post" action="/finance_app/shop" />
				<input id="buy" type="submit" name="buy_btn" value="BUY" />
			</form>
			<form method="post" action="/finance_app/sell" />
				<input id="sell"type="submit" name="sell_btn" value="SELL">
			</form>
		</div>	
	</div>
</body>
    <script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html>