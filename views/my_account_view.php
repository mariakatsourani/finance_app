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
					<li id="startMenu"><a href="http://localhost/finance_app/" class="bt-icon icon-user-outline">Start</a></li>
                    <li id="nasdaqMenu"><a href="http://localhost/finance_app/stock/" class="bt-icon icon-user-outline">Nasdaq</a></li>
					<li><a href="http://localhost/finance_app/user/viewPortfolio" class="bt-icon icon-sun">Portfolio</a></li>
					<li><a href="http://localhost/finance_app/account" class="bt-icon icon-windows">My account</a></li>
                    <li id="aboutMenu"><a href="http://localhost/finance_app/home/about" class="bt-icon icon-windows">About us</a></li>
					<li><a href="http://localhost/finance_app/home/contact" class="bt-icon icon-bubble">Contact</a></li>
				</ul>
			</nav>
    </div><!-- /container -->

	</div>
	<div class="top">

		<ul id="acc2">
			<li id="logout2"><a href="http://localhost/finance_app/account/logout">LOGOUT</a></li><br/>
			<li id="info">
			<span id="name_myaccount"><?php echo $data['first_name'];?>
									 <?php echo $data['last_name'];?></span><br/>
			<span id="mail_myaccount"><?php echo $data['email'];?></span><br/>
			<span id="address_myaccount"><?php echo $data['pnr'];?></span></li><br/>
		</ul>

	</div>

	<div class="titlepage">
		
		<span class="bold2">MY ACCOUNT</span><br/>
		<span class="fontSize">OVERVIEW</span>

	</div>
		

	<div class="container">
	
		<ul class="inlineOver">
			<li id="balance">BALANCE</li>
			<li id="vbalance">VIRTUAL BALANCE</li>
			<li id="bankAcc">BANK ACCOUNT</li>
			<li id="accNr">ACCOUNT NUMBER</li>
		</ul>
		<hr id="myAccHr">

		<ul class="inlineUnder">
			<li id="actualBalance"><?php echo $data['actual_balance'];?></li>
			<li id="virtualBalance"><?php echo $data['virtual_balance'];?></li>
			<li id="bank"><?php echo $data['bank'];?></li>
			<li id="accountNr"><?php echo $data['account_number'];?></li>
		</ul>

	</div>



	<div class="footer">
		<div class="footerButtons">
			<form method="" action="">
			<input id="inputfield" type="text" placeholder="AMOUNT">
				<input id="deposit" type="submit" value="DEPOSIT">
				<input id="withdraw" type="submit" value="WITHDRAW">
				
			</form>
		</div>	
	</div>
</body>
    <script src="/finance_app/views/js/classie.js"></script>
	<script src="/finance_app/views/js/borderMenu.js"></script>
</html>