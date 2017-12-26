<?php
	session_start();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include("../data/admin_change_password_handler.php");
	}
?>

<html>
	<body>
		<table border="1" height="70%" width="80%" cellpadding="20">
			<tr height="20%">
				<td colspan="9">
					<img align="center" src="Logo.png"/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					&emsp;&emsp;&emsp;
					Logged in as <a href="Admin_View_Profile.php"><?= $_SESSION['username']; ?></a> | 
					<a href="Login.php">Logout</a>
				</td>
			</tr>
			<tr height="200%">
				<td colspan="1" width="30%">
					Account
					<ul>
						<li><a href="Admin_Dashboard.php">Dashboard</a></li>
						<li><a href="Userlist.php">View Userlist</a></li>
						<li><a href="Admin_View_Profile.php">View Profile</a></li>
						<li><a href="Admin_Change_Profile_Picture.php">Change Profile Picture</a></li>
						<li><a href="Admin_Change_Password.php">Change Password</a></li>
						<li><a href="Login.php">Logout</a></li>
					<ul>
				</td>
				<td colspan="8" valign="top">
					<form method="POST">
						<fieldset>
							<legend>CHANGE PASSWORD</legend>
							Current Password &emsp;&emsp; :<input name="current_password" type="password"/><br>
							New Password&emsp;&emsp;&emsp;&ensp;:<input name="new_password" type="password"/><br>
							Retype New Password : <input name="retype_new_password" type="password"/>
							<hr>
							<input type="submit">
						</fieldset>
					</form>
				</td>
			</tr>
			<tr height="10%">
				<td align="center" colspan="9">
					Copyright © 2017
				</td>
			</tr>
		</table>
	</body>
</html>