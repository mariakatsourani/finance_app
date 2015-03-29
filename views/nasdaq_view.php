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
			<li id="myAccount"><h5><a href="http://localhost/finance_app/account">MYACCOUNT</a> </h5></li>
			<li id="logout"><a href="http://localhost/finance_app/account/logout">LOGOUT</a> </li><br/>
		</ul>

	</div>

	<div class="titlepage">
		
		<span class="bold2">NASDAQ</span><br/>
		<span class="fontSize">OVERVIEW</span>

	</div>
		

	<div class="container">
	
		<ul class="infoRow">
            <li id="index">INDEX</li>
			<li id="lastChange">LAST CHANGE</li>
			<li id="latestPrice">LATEST PRICE</li>
			<li id="availability">AVAILABILITY</li>
		</ul>
		<hr>
		
        <?php //var_dump($data);
        echo "<div id='allStocks'>";
        foreach($data as $stock): ?>

            <div id='stockName'><?php echo $stock['symbol'] ?> </div>
            <div id='lastProcent'><?php echo $stock['last_change_procent'] ?></div>
            <div id='lastChangeProcent'><?php echo $stock['last_price'] ?></div>
            <div id='available'><?php echo $stock['available_for_shop'] ?></div>

            <form method="post" action="http://localhost/finance_app/user/shop/" class="amount_form">
                <input class='stock_amount' name='stock_amount' type='test' placeholder="Amount"/>
                <input name="shop" id='miniBuy' type='submit' value='BUY'/>
                <input name="stock_id" type="hidden" value="<?php echo $stock['stock_id']?>" />
            </form>

    <?php endforeach;
        echo "</div>";
        ?>
    
	</div>


</body>
    <script src="/finance_app/views/js/classie.js"></script>
	<script src="/finance_app/views/js/borderMenu.js"></script>
</html>