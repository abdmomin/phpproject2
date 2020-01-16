<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="stylesss.css">
</head>
<body>
	<header>
	<div class="container">
		<div class="branding">
			<h1><span class="highlight">X Titan</span> E-Comm</h1>
		</div>
	</div>
	</header>
	<div class="header">
		<h2>Register</h2>
	</div>
<div class="container">
	<form method="post" class="regform" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<p><a href="login.php">Sign in</a></p>
	</form>
</div>
<footer>
	&copy; Abdullah Al Momin 2018
</footer>
</body>
</html>
