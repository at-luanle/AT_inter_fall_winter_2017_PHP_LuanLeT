
<!DOCTYPE html>
<html>
<head>
	<title>Register Users</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="process_adduser.php" method="POST" enctype="multipart/form-data">
		<table class="form">
			<tr>
				<td colspan="2"><h1>Register Users</h1></td>
			</tr>
			<tr>
				<td>Full Name</td>
				<td>
					<input type="text" name="fullname" placeholder="Full Name" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname']; ?>">
					<span id="error_fullname" class="error">
						<?php
							if(isset($errors['fullname1'])) echo $errors['fullname1']; 
						?>
					</span>
				</td>
			</tr>
			<tr>
				<td>User Name</td>
				<td>
					<input type="text" name="username" placeholder="User Name" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
					<span class="error" id="error_username">
						<?php
							if(isset($errors['username1'])) echo $errors['username1']; 
						?>
					</span>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					<input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
					<span class="error" id="error_emailname">
						<?php
							if(isset($errors['email1'])) echo $errors['email1']; 
						?>
					</span>
				</td>
			</tr>
			<tr>
				<td>Password</td>
				<td>
					<input type="password" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
					<span id="error_password" class="error">
						<?php
							if(isset($errors['password1'])) echo $errors['password1']; 
						?>
						<?php
							if(isset($errors['password2'])) echo $errors['password2']; 
						?>
					</span>
				</td>
			</tr>
			<tr>
				<td>Image</td>
				<td>
					<input type="file" name="image" placeholder="image">
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" name="save" value="Save" class="btn"></td>
			</tr>
		</table>
	</form>
</body>
</html>

