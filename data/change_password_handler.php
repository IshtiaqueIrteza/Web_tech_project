<?php
	$conn = mysqli_connect("localhost","root","","photography_site",3306);
	
	$username = $_SESSION['username'];
	$sql = "SELECT password from users where username='$username'";
	
	$data = mysqli_query($conn,$sql);
	
	$data_arr = mysqli_fetch_assoc($data);
	
	$password = $data_arr['password'];
	$message = "";
	
	if($_POST['current_password'] == "" || $_POST['new_password'] == "" || $_POST['retype_new_password'] == "")
	{
		$message.="Fields cannot be empty !!\\n";
	}
	else if($password !== $_POST['current_password'])
	{
		$message.="Your current password is wrong !!\\n";
	}
	else if($_POST['new_password'] !== $_POST['retype_new_password'])
	{
		$message.="New psssword & retype_new_password fields doesn't match !!\\n";
	}
	else if($_POST['current_password'] === $_POST['new_password'])
	{
		$message.="New passsword & Current password can't be same !!\\n";
	}
	else if(strlen($_POST['new_password']) < 8 )
	{
		$message.="Password must be at least 8 characters !!\\n";
	}
	else
	{
		$new_pass = $_POST['new_password']; 
		$sql = "UPDATE users SET password = '$new_pass' WHERE users.username = '$username'";
		$result = mysqli_query($conn,$sql);
		
		if($result)
		{
			echo '<script language="javascript">';
			echo 'alert("Password updated successfully")';
			echo '</script>';
		}
		else
		{
			$message.="Unknown error occured !!\\n";
		}
	}
	
	if($message != "")
	{
		echo '<script language="javascript">';
		echo 'alert("'.$message.'")';
		echo '</script>';
	}
?>