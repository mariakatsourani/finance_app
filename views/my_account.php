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

		<ul id="acc2">
			<li id="logout"><a href="http://localhost/finance_app/account/logout" >LOGOUT</a></li><br/>
			<li id="info">
			<span id="name_myaccount"><?php  echo $_SESSION['id'] ; ?>Samwise Lorenum</span><br/>
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
	</div>



	<div class="footer">
		<div class="footerButtons">
			<form method="post" action="/finance_app/user/addMoney">
				<input id="deposit" type="submit" value="DEPOSIT" name="addMoney">
			</form>
			<form method="post" action="/finance_app/user/withdraw">
				<input id="withdraw" type="submit" value="withdraw" name="withdraw" />
				<input type="text" name="amountMoney" />
			</form>
		</div>	
	</div>
</body>
    <script src="js/classie.js"></script>
	<script src="js/borderMenu.js"></script>
</html>