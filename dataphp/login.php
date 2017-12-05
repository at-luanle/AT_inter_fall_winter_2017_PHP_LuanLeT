<?php
	session_start();
	if (isset($_SESSION['loginuser'])) {
		ob_start();
		header("Location: list_user.php");
		ob_end_flush();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN USER</title>
</head>
<body>
	<form method="POST" action="process_user.php">
		<table>
			<tr><td><h1>LOGIN USER</h1></td></tr>
			<tr>
				<td>User Name</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Pass Word</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="login" value="Login"><a href="register.php">Register</a></td>
			</tr>
			<tr>
				<td><?php $_SESSION['error'];?></td>
			</tr>
		</table>
	</form>
</body>
</html>
