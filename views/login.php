<!DOCTYPE html>
<html>
	<head lang="en">
	    <meta charset="UTF-8">
	    <title></title>
	</head>
	<body>
	<?php 
		
		echo $data;
		
	?>
		<form action="/finance_app/account/login" method="post">
			<input type="text" name="email" placeholder="email" />
			<input type="password" name="password" placeholder="password" />
			<input type="submit" name="login_btn" value="Sign in" />	
		</form>
	</body>
</html>