<?php
	require_once "connect.php";
	global $conn;
	$id = $_GET['id'];
	if(isset($id))
	{
		$query = "SELECT * FROM demophp.users WHERE id = :id ";
		$st = $conn->prepare($query);
		$st->bindValue(':id', $id);
		$st->execute();
		$user = $st->fetch();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Users</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="process_edituser.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $user['id']; ?>" class="btn">
		<table class="form">
			<tr>
				<td colspan="2"><h1>Edit User</h1></td>
			</tr>
			<tr>
				<td>Full Name</td>
				<td>
					<input type="text" name="fullname" placeholder="Full Name" value="<?php echo $user['fullname']; ?>">
				</td>
			</tr>
			<tr>
				<td>User Name</td>
				<td>
					<input type="text" name="username" placeholder="User Name" value="<?php echo $user['username']; ?>">
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					<input type="email" name="email" placeholder="Email" value="<?php echo $user['email']; ?>">
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="password" name="password" placeholder="Password" value="<?php echo $user['password']; ?>">
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="edit" value="Save" class="btn"></td>
			</tr>
		</table>
	</form>
</body>
</html>
