<?php
	ob_start();
	session_start();
	require_once "connect.php";
	if(isset($_SESSION['loginuser']))
	{
		header("Location: listall.php");
	}
	else
	{
		if(isset($_POST['login']))
		{
			global $conn;
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(!empty($username) && !empty($password))
			{
				$query = "SELECT * FROM users WHERE username = :username AND password = :password";
				$st = $conn->prepare($query);				
				$st->bindValue(':username', $username);
				$password1 = md5($password);
				$st->bindValue(':password', $password1);
				$st->execute();	
				$user = $st->fetch();
				if(count($user) > 0)
				{
					$_SESSION['loginuser'] = $user['username'];
					header("Location: listall.php");
				}
				else
				{
					$error = "Account not exits";
				}
			}
			else
			{
				echo "Please press username and password";
			}
		}
		
	}	
	ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN USER</title>
</head>
<body>
	<form method="POST" action="login.php">
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
				<td><input type="submit" name="login" value="Login"></td>
			</tr>
		</table>
	</form>
</body>
</html>
