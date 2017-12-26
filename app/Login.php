<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		include("../data/login_handler.php");
		
		if(form_validation())
		{
			if($flag == "user")
			{
				header("location: Dashboard.php"); //user dashboard
			}
			else
			{
				header("location: Admin_Dashboard.php"); //admin dashboard
			}
			//var_dump($GLOBALS);
		}
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
						<form method="POST">
							<fieldset>
								<legend>LOGIN</legend>
								User Name/Email &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:<input name="username" type="text"/><br>
								Password&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;:<input name="password" type="password"/><hr>
								<input name="remember_me" type="checkbox"> Remember Me<br><br>
								<input type="submit"> <a href="Forgot Password.php">Forgot Password?</a>
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