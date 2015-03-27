<?php

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/finance_app/views/css/reset.css">
	<link rel="stylesheet" type="text/css" href="/finance_app/views/css/main.css">
    <link rel="stylesheet" type="text/css" href="/finance_app/views/css/style3.css" />
	<meta charset="UTF-8">
    <script src="/finance_app/views/js/modernizr.custom.js"></script>

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

		<ul id="acc2">
			<li id="logout"><a href="http://localhost/finance_app/account/logout">LOGOUT</a> </li><br/>
			<li id="info">
			<span id="name_myaccount">Samwise Lorenum</span><br/>
			<span id="mail_myaccount">samwise@lorenum.com</span><br/>
			<span id="address_myaccount">Ipsum Street 12</span></li><br/>
			<li id="edit">EDIT</li>
		</ul>

	</div>

	<div class="titlepage">
		
		<span class="bold2">MY ACCOUNT</span><br/>
		<span class="fontSize">OVERVIEW</span>

	</div>
		

	<div class="container">
	
		<ul class="inlineOver">
			<li id="account">ACCOUNT</li>
			<li id="buys">AVAILABLE BUYS</li>
			<li id="tot">TOTAL</li>
		</ul>
		<hr>

        <?php //var_dump($data);
        echo $data['email'];?>
	</div>



	<div class="footer">
		<div class="footerButtons">
			<form method="" action="">
				<input id="deposit" type="submit" value="DEPOSIT">
			</form>
		</div>	
	</div>
</body>
    <script src="/finance_app/views/js/classie.js"></script>
	<script src="/finance_app/views/js/borderMenu.js"></script>
</html>