<?php 
if(isset($_POST["save"]))
	{
		$errors = [];
		if(empty($_POST["fullname"]))
		{
			$errors["fullname1"] = "Please, Press Full Name";
		}
		if(empty($_POST["username"]))
		{
			$errors["username1"] = "Please, Press User Name";
		}
		if(empty($_POST["email"]))
		{
			$errors["email1"] = "Please, Press Email";
		}
		if(empty($_POST["password"]))
		{
			$errors["password1"] = "Please, Press Password";
		}
		if(strlen($_POST["password"]) < 6)
		{
			$errors["password2"] = "Password atleast 6 characters long";
		}
	}

?>