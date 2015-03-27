<?php

?>
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
					<li id="startMenu"><a href="start_view.php" class="bt-icon icon-user-outline">Start</a></li>
                    <li id="nasdaqMenu"><a href="nasdaq_view.php" class="bt-icon icon-user-outline">Nasdaq</a></li>
					<li><a href="portfolio_view.php" class="bt-icon icon-sun">Portfolio</a></li>
					<li><a href="my_account_view.php" class="bt-icon icon-windows">My account</a></li>
                    <li id="aboutMenu"><a href="about_view.php" class="bt-icon icon-windows">About us</a></li>
					<li><a href="contact_view.php" class="bt-icon icon-bubble">Contact</a></li>
				</ul>
			</nav>
    </div><!-- /container -->

	</div>
	<div class="top">

		<ul id="acc">
			<li><h5><?php echo $exempelhär['username']?>MYACCOUNT</h5></li>
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
			<li>GOOGLE</li>
			<li>10,77</li>
			<li>11,07</li>
			<li>73 SEK</li>
			<li>0,08%</li>
			<li>10</li>
		</ul>
	</div>



	<div class="footer">
		<div class="footerButtons">
			<form method="" action="">
				<input id="buy" type="submit" value="BUY">
				<input id="sell"type="submit" value="SELL">
			</form>
		</div>	
	</div>
</body>
    <script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html>