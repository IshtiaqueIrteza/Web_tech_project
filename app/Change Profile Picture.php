<?php
	session_start();
	include("../data/profile_handler.php");
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include("../data/profile_picture_handler.php");
	}
?>

<html>
	<body>
		<table border="1" height="70%" width="80%" cellpadding="20" align="center">
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
					<form method="POST" enctype="multipart/form-data">
						<fieldset>
							<legend>PROFILE PICTURE</legend>
							<?php
								
								$pp = mysqli_query($conn,"select profile_picture from users where username='$username'");
								$res1 = mysqli_fetch_assoc($pp);
								
								if($res1['profile_picture'] == null)
								{
									echo '<img src="Face.png" height="200" width="200"><br><br>';
								}
								else
								{
									echo '<img src="data:image/jpeg;base64,'.base64_encode( $res1['profile_picture'] ).'" height="200" width="200"/>';
								}
							?>
							<br/>
							<input type="file" name="file"><hr>
							<input type="submit" name="submit">
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