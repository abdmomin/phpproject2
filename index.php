<?php
	include('connect.php');
	session_start();

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($con, "SELECT * FROM announcement WHERE id = $id");
		$record = mysqli_fetch_array($rec);
		$subject = $record['subject'];
		$announce = $record['announces'];
		$id = $record['id'];
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
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
		<h2>Admin</h2>
	</div>
	<div class="inner">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p style="text-align:center;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p style="text-align:center;">Today is <?php echo date("l, d M Y"); ?></p>
			<p style="text-align:center;"> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>
</div>
</aside>

<h2 style="text-align:center; color:#e8491d;padding-top:10px;">Manage Announcement</h2>
<table>
	<thead>
		<tr>
			<td><strong>Subject</strong></td>
			<td><strong>Announcement</strong></td>
			<td><strong>Action</strong></td>
		</tr>
	</thead>
	<tbody>
		<?php while($row = mysqli_fetch_array($result)){ ?>
			<tr>
				<td><?php echo $row['subject'] ?></td>
				<td><?php echo $row['announces'] ?></td>
				<td><a class="ed_btn" class="ed_btn" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
				<td><a class="del_btn" href="connect.php?del=<?php echo $row['id']; ?>">Delete</a></td>
			</tr>
		<?php } ?>

	</tbody>
</table>

<form class="annform" action="index.php" method="post">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="aninput">
		<label>Subject</label>
		<input type="text" name="ansubject" value="<?php echo $subject; ?>">
	</div>
	<div class="aninput">
		<label>Announcement</label>
		<input type="text" name="announ" value="<?php echo $announce; ?>">
	</div>
	<div class="aninput">
		<?php if ($edit_state == false): ?>
			<button type="submit" name="button" class="btn">Save</button>
		<?php else: ?>
			<button type="submit" name="update" class="btn">Update</button>
		<?php endif; ?>
	</div>
</form>
</div>
<footer>
	&copy; Abdullah Al Momin 2018
</footer>
</body>
</html>
