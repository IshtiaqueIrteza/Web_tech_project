<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		include("../data/registration_handler.php");
		validation();
	}
?>

<html>
	<body>
		<table border="1" height="70%" width="80%" cellpadding="20">
			<tr height="20%">
				<td>
					<img align="center" src="Logo.png"/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					&emsp;&emsp;&emsp;
					<a href="Home.php"/>Home | </a>
					<a href="Login.php"/>Login | </a>
					<a href="Registration.php"/>Registration </a>
			</tr>
			<tr height="200%">
				<td>
						<form method="post">
							<fieldset>
								<legend>REGISTRATION</legend>
								<br>Name &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
								:<input name="name" type="text"/><hr>
								Email &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
								:<input name="email" type="text"/><hr>
								User Name&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;
								:<input name="username" type="text"/><hr>
								Password &emsp;&emsp;&emsp;&emsp;&emsp;&ensp;
								:<input name="password" type="text"/><hr>
								Confirm Password &emsp;&emsp;
								:<input name="confirm_password" type="text"/><hr>
								
								<fieldset>
									<legend>Gender</legend>
									<input name="gender" type="radio"/>Male
									<input name="gender" type="radio"/>Female
									<input name="gender" type="radio"/>Other
								</fieldset>
								<hr>
								<fieldset>
									<legend>Date of Birth</legend>
									<input name="day" type="text"/>/
									<input name="month" type="text"/>/
									<input name="year" type="text"/> (dd/mm/yyyy)
								</fieldset>
								<hr>
								
								<input type="submit"> <input type="reset">
								
							</fieldset>
							
					</form>
				</td>
			</tr>
			<tr height="10%">
				<td align="center">
					Copyright © 2017
				</td>
			</tr>
		</table>
	</body>
</html>