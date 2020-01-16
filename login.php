<?php include('server.php');
			include('connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Announcement Portal</title>
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

<div class="container">
<aside>
<div class="widget">
	<div class="header">
		<h2>Login</h2>
		</div>
<div class="inner">
	<form method="post" class="logform" action="login.php">
		<?php include('errors.php'); ?>
		<div class="inputlog">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="inputlog">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="inputlog">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p><a href="register.php">Register</a></p>
	</form>
	</div>
	</div>
</aside>

<h2 style="text-align:center; color:#e8491d;padding-top:10px;">Announcement</h2>
<table>
	<thead>
		<tr>
			<td><strong>Subject</strong></td>
			<td><strong>Announcement</strong></td>
		</tr>
	</thead>
	<tbody>

		<?php while($row = mysqli_fetch_array($result)){ ?>
			<tr>
				<td><?php echo $row['subject'] ?></td>
				<td><?php echo $row['announces'] ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
</div>
<footer>
	&copy; Abdullah Al Momin 2018
</footer>
</body>
</html>
