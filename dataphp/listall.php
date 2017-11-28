<?php
	session_start();
 	require_once "connect.php";
 	global $conn;
 	$query = "SELECT * FROM demophp.users";
 	$st = $conn->prepare($query);
 	$st->execute();
	$users = $st->fetchAll();
	$st->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>
	<title>All User</title>
</head>
<body>
	<h1>LIST ALL USER:<?php echo $_SESSION['loginuser'];?> </h1>
	<table border="1px">
		<tr>
			<th>STT</th>
			<th>Image</th>
			<th>Full Name</th>
			<th>User Name</th>
			<th>Email</th>
			<th>Password</th>
			<th>Delete</th>
		</tr>
	<?php foreach($users as $key=>$u):?>
		<tr>
			<td><?php echo ++$key;?></td>
			<td><img src="<?php $u['image']?>"></td>
			<td><?php echo $u['fullname'];?></td>
			<td><a href="edituser.php?id=<?php echo $u['id']?>"><?php echo $u['username'];?></a> </td>	
			<td><?php echo $u['email'];?></td>
			<td><?php echo $u['password'];?></td>
			<td><a href="delete.php?id=<?php echo $u['id']?>">Delete</a></td>			
		</tr>
	<?php endforeach ?>
	</table>
	<a href="register.php">Register</a>
	<a href="logout.php">Logout</a>
</body>
</html>