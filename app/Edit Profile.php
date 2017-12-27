<?php
	session_start();
	include("../data/profile_handler.php");
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include("../data/edit_profile_handler.php");
		
		if(validation())
		{
			echo '<script language="javascript">';
			echo 'alert("Profile updated Successfully")';
			echo '</script>';
		}
	}
?>

<html>
	<body>
		<table border="1" height="80%" width="80%" cellpadding="20" align="center">
			<tr height="20%">
				<td colspan="9">
					<img align="center"  src="Logo.jpg" width="100" height="50"/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					&emsp;&emsp;&emsp;
					Logged in as <a href="View Profile.php"><?= $_SESSION['username']; ?></a> | 
					<a href="Login.php">Logout</a>
				</td>
			</tr>
			<tr height="200%">
				<td colspan="1" width="30%">
					Account
					<ul>
						<li><a href="Dashboard.php">Dashboard</a></li>
						<li><a href="View Profile.php">View Profile</a></li>
						<li><a href="Edit Profile.php">Edit Profile</a></li>
						<li><a href="Change Profile Picture.php">Change Profile Picture</a></li>
						<li><a href="Change Password.php">Change Password</a></li>
						<li><a href="Login.php">Logout</a></li>
					<ul>
				</td>
				<td colspan="8" valign="top">
					<form method="POST">
						<fieldset>
							<legend>PROFILE</legend>
							<br>
							Username&ensp;&emsp;&emsp;&emsp;&emsp; :<input name="username" value="<?= $user_data_array['username']; ?>"/><hr>
							Email &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; :<input name="email" value="<?= $user_data_array['email']; ?>"/> <img src="ex.png" height="20" width="20">
							<hr>
							Gender &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; :<input type="radio" name="gender" <?php if($user_data_array['gender'] == "Male"){echo "checked";} ?>/>Male <input type="radio" name="gender" <?php if($user_data_array['gender'] == "Female"){echo "checked";} ?>/>Female <input type="radio" name="gender" <?php if($user_data_array['gender'] == "Others"){echo "checked";} ?>/>Other 
							<hr>
							Date of Birth &emsp;&emsp;&emsp; :<input name="dob" value="<?= $user_data_array['dob']; ?>"/><br>
							&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i>(dd/mm/yyyy)</i> 
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