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
	<h1>LIST ALL USER:
    <?php
      echo $_SESSION["user_name"];
    ?>
</h1>
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
	<?php foreach($users as $key=>$user):?>
		<tr>
			<td><?php echo ++$key;?></td>
			<td><img src="img/.'<?php echo $user["image"];?>'" width="30px" height="30px"></td>
			<td><?php echo $user['fullname'];?></td>
			<td><a href="edit_user.php?id=<?php echo $user['id']?>"><?php echo $user['username'];?></a> </td>
			<td><?php echo $user['email'];?></td>
			<td><?php echo $user['password'];?></td>
			<td><a href="delete.php?id=<?php echo $user['id']?>">Delete</a></td>
		</tr>
	<?php endforeach ?>
	</table>
	<a href="logout.php">Logout</a>
  <a href="register.php">Register</a>
</body>
</html>
