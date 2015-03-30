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
					<li><a href="http://localhost/finance_app/user/portfolio" class="bt-icon icon-sun">Portfolio</a></li>
					<li><a href="http://localhost/finance_app/account" class="bt-icon icon-windows">My account</a></li>
                    <li id="aboutMenu"><a href="http://localhost/finance_app/home/about" class="bt-icon icon-windows">About us</a></li>
					<li><a href="http://localhost/finance_app/home/contact" class="bt-icon icon-bubble">Contact</a></li>
				</ul>
			</nav>
    </div><!-- /container -->

	</div>
	<div class="top">

		<ul id="acc">
			<li id="myAccount"><h5><a href="http://localhost/finance_app/account">MYACCOUNT</a></h5></li>
			<li id="logout"><a href="http://localhost/finance_app/account/logout">LOGOUT</a> </li><br/>
		</ul>

	</div>

	<div class="titlepage">
		<div id="myAccLogout">
		<span class="bold">PORTFOLIO</span><br/>
		<span class="fontSize">OVERVIEW</span>
		</div>
	</div>
		

	<div class="containerPortfolio">
	
		<ul class="inlineOver">
			<li id="nameOver">NAME</li>
			<li id="priceOver">PRICE</li>
			<li id="priceTodayOver">PRICE - TODAY</li>
			<li id="returnOver">RETURN</li>
			<li id="changeOver">CHANGE</li>
			<li id="amountOver">AMOUNT</li>
		</ul>
		<hr id="portfolioHr">


        <?php
        if($data):
            foreach ($data as $stock):?>
            <ul class="inlineUnder">
                <li id="namePortfolio"><?php echo $stock['symbol'] ?></li>
                <li id="pricePortfolio"><?php echo abs($stock['price']) ?></li>
                <li id="priceTodayPortfolio"><?php echo $stock['last_price'] ?></li>
                <li id="returnPortfolio"><?php echo $stock['last_price'] - abs($stock['price']) ?></li>
                <li id="changePortfolio"><?php echo $stock['last_change_procent'] ?></li>
                <li id="amountPortfolio"><?php echo $stock['total_stocks'] ?></li>
                <div id="portfolioInputs">
	                <form method="post" action="http://localhost/finance_app/user/sell/" class="amount_form">
	                   	<input name="sell" id="miniSell" type="submit" value="SELL">
	                    <input name="price" type="text" class="stock_amountPrice" placeholder="PRICE"/>
	                    <input name="stock_amount" type="text" class="stock_amountPortfolio" placeholder="AMOUNT"/>
	                    <input name="stock_id" type="hidden" value="<?php echo $stock['stock_id'] ?>" />
	                </form>
                </div>
            </ul>
        <?php endforeach;
        endif?>

	</div>

	<!---<div class="footer">
		<div class="footerButtons">
			<form method="" action="">
				<input id="buy" type="submit" value="BUY"> not needed here

				<input id="sell"type="submit" value="SELL"> 
			</form>
		</div>	
	</div>-->
</body>
    <script src="/finance_app/views/js/classie.js"></script>
	<script src="/finance_app/views/js/borderMenu.js"></script>
</html>