<?php
	session_start();
	include("../data/delete_user_handler.php");
	
	$username = $_GET['username'];
	$dirname = '../uploads/'.$username;
	$userInfo = retrieveInfo($username);
	//var_dump($GLOBALS);
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$res = deleteUser($username);
		
		if($res)
		{
			//remove user's directory
			
			array_map('unlink', glob("$dirname/*.*"));
			rmdir($dirname);
			echo '<script language="javascript"> alert("User Removed Successfully");
			window.location = "Userlist.php";
			</script>';
			die();
		}
		else
		{
			echo '<script language="javascript"> alert("Unknown Error Occured !!");
			window.location = "Userlist.php";
			</script>';
			die();
		}
	}
?>

<form method="POST">	
		<fieldset>
			<legend> ARE YOU SURE ? </legend>
				<table border="0" cellspacing="0" cellpadding="3">
				<tr>
					<td>Username :</td>
					<td><?= $userInfo['username']; ?></td>
				</tr>
				<tr>
					<td>Email :</td>
					<td><?= $userInfo['email']; ?></td>
				</tr>
				<tr>
					<td>Gender :</td>
					<td><?= $userInfo['gender']; ?></td> 
				</tr> 
				<tr>
					<td>Age :</td>
					<td><?= $userInfo['age']; ?></td> 
				</tr> 
				<tr>
					<td>Registration Date :</td>
					<td><?= $userInfo['register_date']; ?></td> 
				</tr>
				<tr>
					<td>Last Log In :</td>
					<td><?= $userInfo['last_log_in']; ?></td> 
				</tr> 
			</table>
			<hr/>
			<input type="submit" value="Delete"/>&emsp; <a href="Userlist.php">BACK</a>
		</fieldset>
</form>