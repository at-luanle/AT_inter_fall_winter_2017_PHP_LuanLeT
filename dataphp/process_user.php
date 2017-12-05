<?php

require_once "connect.php";
session_start();

if(isset($_POST["save"]))
	{
		$errors = [];
		if (empty($_POST["fullname"])) {
			$errors["fullname1"] = "Please, Press Full Name";
		}
		if (empty($_POST["username"])) {
			$errors["username1"] = "Please, Press User Name";
		}
		if (empty($_POST["email"])) {
			$errors["email1"] = "Please, Press Email";
		}
		if (empty($_POST["password"])) {
			$errors["password1"] = "Please, Press Password";
		}
		if (strlen($_POST["password"]) < 6) {
			$errors["password2"] = "Password atleast 6 characters long";
		}
	}

if (isset($_POST["register"])) {
  $fullname = filter_input(INPUT_POST,'fullname');
	$username = filter_input(INPUT_POST,'username');
	$email    = filter_input(INPUT_POST,'email');
	$password = filter_input(INPUT_POST,'password');

  $file_name     = $_FILES['image']['name'];
  $file_tmp      = $_FILES['image']['tmp_name'];
  $path_upload   = 'img/'.$file_name;
  move_uploaded_file($file_tmp, $path_upload);
  $image = $file_name;

  global $conn;
  $query = "INSERT INTO users (fullname, username, email, password, image)
            VALUES ('$fullname', '$username', '$email', '$password', '$image')";
  $st    = $conn->prepare($query);

  if ($st->execute()) {
    ob_start();
      header("Location: list_user.php");
  }
  else {
    header("Location: register.php");
    $_SESSION["error_register"] = "Have a error when you register";
    ob_end_flush();
  }
}


if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (!empty($username) && !empty($password)) {
    global $conn;
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $st    = $conn->prepare($query);
    $st->execute();
    $user  = $st->fetch();

    if (($user)) {
      ob_start();
      $_SESSION['user_name'] = $user['username'];
      header("Location: list_user.php");
    }
    else
    {
      header("Location: login.php");
      $_SESSION['error'] = "Account error";
      ob_end_flush();
    }
  }
  else
  {
    echo "Please press username and password";
  }
}

if (isset($_POST['edit'])) {
  //get id use edit a user by id
  $id = $_POST["id"];

  $fullname = filter_input(INPUT_POST,'fullname');
  $username = filter_input(INPUT_POST,'username');
  $email    = filter_input(INPUT_POST,'email');
  $password = filter_input(INPUT_POST,'password');

  if (isset($id)) {
    global $conn;
    $query = "UPDATE  users
              SET     fullname = '$fullname',
                      username = '$username',
                      email    = '$email',
                      password = '$password'
              WHERE   id = '$id'";
    $st = $conn->prepare($query);

  if ($st->execute()) {
      ob_start();
      header("Location: list_user.php");
      ob_end_flush();
  }
  else {
      ob_start();
      header("Location: edit_user.php");
      ob_end_flush();
    }
  }
}
