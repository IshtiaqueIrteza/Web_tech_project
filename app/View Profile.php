<?php
	session_start();
	include("../data/profile_handler.php");
?>

<html>
	<body>
		<table border="1" height="70%" width="80%" cellpadding="20">
			<tr height="20%">
				<td colspan="9">
					<img align="center" src="Logo.png"/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
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
					<fieldset>
						<legend>PROFILE</legend>
						<br>
						Username &emsp;&emsp;&emsp;&emsp; :<?= $user_data_array['username']; ?><hr>
						Email &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; :<?= $user_data_array['email']; ?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; &emsp;&emsp;&emsp; 
						<?php 
							if($user_data_array['profile_picture'] == null)
							{
								echo '<img src="Face.png" height="100" width="100"><br><br>';
							}
							else
							{
								echo '<img src="data:image/jpeg;base64,'.base64_encode( $user_data_array['profile_picture'] ).'" height="100" width="100"/>';
							}
						?>
						<hr>
						Gender &emsp;&emsp;&emsp;&emsp;&emsp;&ensp; :<?= $user_data_array['gender']; ?> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp; <a href="Change Profile Picture.php">Change</a> 
						<hr>
						Date of Birth &emsp;&emsp;&emsp; :<?php echo $user_data_array['dob']; echo ",   Age: "; echo $age." years"; ?><hr>
						<a href="Edit Profile.php">Edit Profile</a>
					</fieldset>
				</td>
			</tr>
			<tr height="10%">
				<td align="center" colspan="9">
					Copyright � 2017
				</td>
			</tr>
		</table>
	</body>
</html>