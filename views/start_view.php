<?php

?>

<!DOCTYPE html>
<html>
    
<head>
  <meta charset="utf-8" />
  <title>Lorenum</title>
    <script type="text/javascript" src="js/main.js"></script>
    <link href="/finance_app/views/css/reset.css" rel="stylesheet" type="text/css">
    <link href="/finance_app/views/css/main1.css" rel="stylesheet" type="text/css">
    <script src="/finance_app/views/js/modernizr.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:700,400' rel='stylesheet' type='text/css'>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js'></script>
    <script src='/finance_app/views/js/jquery.color-RGBa-patch.js'></script>
    <script src='/finance_app/views/js/example.js'></script>
    
</head>

<body>
   <div id="container">
    <nav class="main-nav" >
			<ul>
				<li id="signIn"><a class="cd-signin" href="#0">SIGN IN</a></li>
				<li id="signUp"><a class="cd-signup" href="#0">SIGN UP</a></li>
			</ul>
		</nav>
	<div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
		<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
			<ul class="cd-switcher">
				<li><a href="#0">Sign in</a></li>
				<li><a href="#0">New account</a></li>
			</ul>

			<div id="cd-login"> <!-- log in form -->
				<form class="cd-form" method="post" action="http://localhost/finance_app/account/login">
					<p class="fieldset">
						<label class="image-replace cd-email" for="signin-email">E-mail</label>
						<input name="email" class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signin-password">Password</label>
						<input name="password" class="full-width has-padding has-border" id="signin-password" type="text"  placeholder="Password">
						<a href="#0" class="hide-password">Hide</a>
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<input type="checkbox" id="remember-me" checked>
						<label for="remember-me">Remember me</label>
					</p>

					<p class="fieldset">
						<input class="full-width" type="submit" name="login_btn" value="Login">
					</p>
				</form>
				
				<p class="cd-form-bottom-message"><a href="#0">Forgot your password?</a></p>
				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div> <!-- cd-login -->

			<div id="cd-signup"> <!-- sign up form -->
				<form class="cd-form" method="post" action="http://localhost/finance_app/account/register">

                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-first_name">First Name</label>
                        <input name="first_name" class="full-width has-padding has-border" id="signup-first_name" type="text" placeholder="First Name">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-last_name">Last Name</label>
                        <input name="last_name" class="full-width has-padding has-border" id="signup-last_name" type="text" placeholder="Last Name">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-pnr">Social Security Nr</label>
                        <input name="pnr" class="full-width has-padding has-border" id="signup-pnr" type="text" placeholder="Social Security Nr">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

					<p class="fieldset">
						<label class="image-replace cd-email" for="signup-email">E-mail</label>
						<input name="email" class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-bank">Bank</label>
                        <input name="bank" class="full-width has-padding has-border" id="signup-bank" type="text" placeholder="Bank">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-account">Account Nr</label>
                        <input name="account" class="full-width has-padding has-border" id="signup-account" type="text" placeholder="Account Nr">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signup-password">Password</label>
						<input name="password" class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Password">
						<a href="#0" class="hide-password">Hide</a>
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signup-password">Confirm Password</label>
						<input name="re_password" class="full-width has-padding has-border" id="signup-password" type="text"  placeholder="Confirm Password">
						<a href="#0" class="hide-password">Hide</a>
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<input type="checkbox" id="accept-terms">
						<label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
					</p>

					<p class="fieldset">
						<input name = "singup_btn" class="full-width has-padding" type="submit" value="Create account">
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
	        <img class="logo"  src="/finance_app/views/Logo/logo-lorenum.png"/>
        


        <!--
        <div class="nav-wrap">
            <ul class="group" id="example-one">
                <li class="current_page_item" selected><a href="#">NBK</a></li>
                <li><a href="#">NBK ARCA</a></li>
                <li><a href="#">NBK MKT</a></li>
                <li><a href="#">INDICES</a></li>
            </ul>
        </div> -->   
        
        <hr class="fancy-line"></hr>
        

    <div class="container">
		<ul class="row1">
			<li id="symbol">SYMBOL</li>
			<li id="changeSek">CHANGE (%)</li>
			<li id="lastPrice">LAST PRICE</li>
			<li id="volume">VOLUME</li>
		</ul>
		<ul class="row2">
			<li>

				<?php
                foreach($data as $stock){
                    echo "<div id='stockName'>" . $stock['symbol'] . "</div>" .
                            "<div id='available'>" . $stock['available_for_shop'] . "</div>" .
                            "<div id='lastChangeProcent'>" . $stock['last_price'] . "</div>" .
                            "<div id='lastProcent'>" . $stock['last_change_procent'] . "</div>" ;
                }
                ?>

       		</li>

		</ul>
	</div>
    </div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/finance_app/views/js/main_login_register.js"></script> <!-- Gem jQuery -->
</body>
</html>