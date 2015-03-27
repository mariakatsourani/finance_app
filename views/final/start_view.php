<?php

?>

<!DOCTYPE html>
<html>
    
<head>
  <meta charset="utf-8" />
  <title>Lorenum</title>
    <script type="text/javascript" src="main.js"></script>
    <link href="reset.css" rel="stylesheet" type="text/css">
    <link href="main1.css" rel="stylesheet" type="text/css">
    <script src="js/modernizr.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:700,400' rel='stylesheet' type='text/css'>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js'></script>
    <script src='jquery.color-RGBa-patch.js'></script>
    <script src='example.js'></script>
    
</head>

<body>

    <div id="container">
    <nav class="main-nav">
			<ul>
				<li><a class="cd-signin" href="#0">Sign in</a></li>
				<li><a class="cd-signup" href="#0">Sign up</a></li>
			</ul>
		</nav>
	<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
		<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
			<ul class="cd-switcher">
				<li><a href="#0">Sign in</a></li>
				<li><a href="#0">New account</a></li>
			</ul>

			<div id="cd-login"> <!-- log in form -->
				<form class="cd-form">
					<p class="fieldset">
						<label class="image-replace cd-email" for="signin-email">E-mail</label>
						<input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signin-password">Password</label>
						<input class="full-width has-padding has-border" id="signin-password" type="text"  placeholder="Password">
						<a href="#0" class="hide-password">Hide</a>
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<input type="checkbox" id="remember-me" checked>
						<label for="remember-me">Remember me</label>
					</p>

					<p class="fieldset">
						<input class="full-width" type="submit" value="Login">
					</p>
				</form>
				
				<p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div> <!-- cd-login -->

			<div id="cd-signup"> <!-- sign up form -->
				<form class="cd-form">
					<p class="fieldset">
						<label class="image-replace cd-username" for="signup-username">Username</label>
						<input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-email" for="signup-email">E-mail</label>
						<input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signup-password">Password</label>
						<input class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password">
						<a href="#0" class="hide-password">Hide</a>
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<input type="checkbox" id="accept-terms">
						<label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
					</p>

					<p class="fieldset">
						<input class="full-width has-padding" type="submit" value="Create account">
					</p>
				</form>

				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div> <!-- cd-signup -->

			<div id="cd-reset-password"> <!-- reset password form -->
				<p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

				<form class="cd-form">
					<p class="fieldset">
						<label class="image-replace cd-email" for="reset-email">E-mail</label>
						<input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<input class="full-width has-padding" type="submit" value="Reset password">
					</p>
				</form>

				<p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
			</div> <!-- cd-reset-password -->
			<a href="#0" class="cd-close-form">Close</a>
		</div> <!-- cd-user-modal-container -->
	</div> <!-- cd-user-modal -->
	        <img class="logo"  src="Logo/logo-lorenum.png"/>
        
        <h5 id="contact">Contact us</h5>
        <h5 id="search">Search</h5>
        <h5 id="register">Register</h5>
        <h5 id="login">Login</h5>

        
        <div class="nav-wrap">
            <ul class="group" id="example-one">
                <li class="current_page_item" selected><a href="#">NBK</a></li>
                <li><a href="#">NBK ARCA</a></li>
                <li><a href="#">NBK MKT</a></li>
                <li><a href="#">INDICES</a></li>
            </ul>
        </div>
        
    <div class="container">
		<ul class="row1">
			<li id="symbol">SYMBOL</li>
			<li id="volume">VOLUME</li>
			<li id="lastPrice">LAST PRICE</li>
			<li id="changeSek">CHANGE SEK (%)</li>
		</ul>
		<ul class="row2">
			<li>BAC</li>
			<li>93,632,718</li>
			<li>SEK 280</li>
			<li>-SEK 0,06(-0,360%)</li>
		</ul>
        <ul class="row2">
			<li>PBR</li>
			<li>51,284,568</li>
			<li>SEK 171</li>
			<li>-SEK 0,06(-0,360%)</li>
		</ul>
        <ul class="row2">
			<li>AXP</li>
			<li>34,874,386</li>
			<li>SEK 989</li>
			<li>-SEK 0,06(-0,360%)</li>
		</ul>
        <ul class="row2">
			<li>GER</li>
			<li>33,076,157</li>
			<li>SEK 398</li>
			<li>-SEK 0,06(-0,360%)</li>
		</ul>
        <ul class="row2">
			<li>SDR</li>
			<li>31,958,366</li>
			<li>SEK 536</li>
			<li>-SEK 0,06(-0,360%)</li>
		</ul>
	</div>
    </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main_login_register.js"></script> <!-- Gem jQuery -->
</body>
</html>