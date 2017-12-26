<?php
	session_start();
	//var_dump($GLOBALS);
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
					<h3>Welcome <?= $_SESSION['username']; ?></h3>
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