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

	<div class="titlepage">
		
		<span class="bold2">NASDAQ</span><br/>
		<span class="fontSize">OVERVIEW</span>

	</div>
		

	<div class="container">
	
		<ul class="infoRow">
            <li id="index">INDEX</li>
			<li id="status">+/- %</li>
			<li id="latest">LATEST</li>
			<li id="time">TIME</li>
		</ul>
		<hr>
        <?php var_dump($data);
        foreach($data as $stock){
            echo "<div>" . $stock['name']. "</div>";
            echo "<span>" . $stock['last_change'] ."</span>";

        }
         ?>
	</div>



</body>
    <script src="/finance_app/views/js/classie.js"></script>
	<script src="/finance_app/views/js/borderMenu.js"></script>
</html>