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

		<ul id="acc">
			<li id="myAccount"><h5><?php //echo $exempelhär['username']?>MYACCOUNT</h5></li>
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
        foreach($data as $stock){
            echo  "<div id='stockName'>" . $stock['symbol'] . "</div>" . "<div id='lastProcent'>" . $stock['last_change_procent']. "</div>" . "<div id='lastChangeProcent'>" . $stock['last_change']. "</div>" . "<div id='available'>" . $stock['available_for_shop']. "<div id='miniBuy'>" . "<input id='miniBuy' type='submit' value='BUY'>" . "</div>" . "</div>";
            //echo "<span id='stocks'>" . $stock['last_change'] ."</span>";

        }
         ?>
    
	</div>


</body>
    <script src="/finance_app/views/js/classie.js"></script>
	<script src="/finance_app/views/js/borderMenu.js"></script>
</html>