<?php
	session_start();
	include("../data/userlist_handler.php");
	//var_dump($GLOBALS);
	$flag = 0;
	
	if(isset($_POST['submit']))
	{
		if($_POST['searchkey'] != "")
		{
			$personName = $_POST['searchkey'];
			$personList = getPersonsByName($personName);
			
			if(mysqli_num_rows($personList) == 0)
			{
				echo '<script>
						 alert("Nothing found !");
				      </script>';
			}
			else
			{
				$flag = 1;
			}
		}
	}
?>
<html>
	<form method="POST">
		<body>
			<table border="1" height="70%" width="100%" cellpadding="20" align="center">
				<tr height="20%">
					<td colspan="9">
						<img align="center"  src="Logo.jpg" width="100" height="50"/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
						Logged in as <a href="Admin_View_Profile.php"><?= $_SESSION['username']; ?></a> | 
						<a href="Login.php">Logout</a>
					</td>
				</tr>
				<tr height="200%">
					<td colspan="1" width="20%">
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
						<h3>Welcome <?= $_SESSION['username']; ?></h3> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;<input type="text" name="searchkey"/> <input type="submit" name="submit" value="Search"/> <input type="submit" value="Refresh"/>
						
						<table border="1" cellspacing="0" cellpadding="3" align="center">
							<tr>
								<th>Username</th>
								<th>Email</th>
								<th>Gender</th>
								<th>Age</th>
								<th>Registration Date</th>
								<th>Last Login</th>
								<th>Remove User</th>
							</tr>
							
							<?php
								if($flag == 0)
								{
									if(mysqli_num_rows($user_data) != 0)
									{
										while($row = mysqli_fetch_assoc($user_data))
										{
											echo "<tr>";
												echo "<td align='center'>";
													echo $row['username'];
												echo "</td>";
												echo "<td align='center'>";
													echo $row['email'];
												echo "</td>";
												echo "<td align='center'>";
													echo $row['gender'];
												echo "</td>";
												echo "<td align='center'>";
													$dob = $row['dob'];
													
													for($i=0;$i<strlen($dob);$i++)
													{
														if($dob[$i] == '/')
														{
															$dob[$i] = '-';
														}
													}
													
													$today = date("Y-m-d");
													$diff = date_diff(date_create($dob), date_create($today));
													$age = $diff->format('%y');
													
													echo $age." Years";
													
												echo "</td>";
												echo "<td align='center'>";
													echo $row['register_date'];
												echo "</td>";
												echo "<td align='center'>";
													if($row['last_log_in'] == null)
														echo "Never";
													else
														echo $row['last_log_in'];
												echo "</td>";
												echo "<td align='center'>";
													$username = $row['username'];
													echo "<a href='Delete User Confirmation.php?username=$username'>Remove</a>";
												echo "</td>";
											echo "</tr>";
										}
									}
									else
									{
										echo "No Registered Users Found !!";
									}
								}
								else
								{
									while($row = mysqli_fetch_assoc($personList))
									{
										echo "<tr>";
											echo "<td align='center'>";
												echo $row['username'];
											echo "</td>";
											echo "<td align='center'>";
												echo $row['email'];
											echo "</td>";
											echo "<td align='center'>";
												echo $row['gender'];
											echo "</td>";
											echo "<td align='center'>";
												$dob = $row['dob'];
												
												for($i=0;$i<strlen($dob);$i++)
												{
													if($dob[$i] == '/')
													{
														$dob[$i] = '-';
													}
												}
												
												$today = date("Y-m-d");
												$diff = date_diff(date_create($dob), date_create($today));
												$age = $diff->format('%y');
												
												echo $age." Years";
												
											echo "</td>";
											echo "<td align='center'>";
												echo $row['register_date'];
											echo "</td>";
											echo "<td align='center'>";
												if($row['last_log_in'] == null)
													echo "Never";
												else
													echo $row['last_log_in'];
											echo "</td>";
											echo "<td align='center'>";
												$username = $row['username'];
												echo "<a href='Delete User Confirmation.php?username=$username'>Remove</a>";
											echo "</td>";
										echo "</tr>";
									}
								}
							?>
						</table>
						
					</td>
					
				</tr>
				<tr height="10%">
					<td align="center" colspan="9">
						Copyright © 2017
					</td>
				</tr>
			</table>
		</body>
	</form>
</html>