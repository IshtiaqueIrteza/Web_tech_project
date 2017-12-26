<?php
	$conn = mysqli_connect("localhost","root","","photography_site",3306);
	$flag; // determine whether user or admin
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$username = $_POST['username']; //also email
		$password = $_POST['password'];
	}
	
	function form_validation() //all
	{
		global $conn;
		global $username;
		global $password;
		
		if($username == "" || $password == "")
		{
			echo '<script language="javascript">';
			echo 'alert("Fields cannot be empty !!")';
			echo '</script>';

			return false;
		}
		
		//user id
		$sql_username = "select username from users where username='$username' and password='$password'";
		$sql_email = "select email from users where email='$username' and password='$password'";
		
		$data = mysqli_query($conn,$sql_username);
		$row = mysqli_fetch_array($data);
		
		$data1 = mysqli_query($conn,$sql_email);
		$row1 = mysqli_fetch_array($data1);
		
		if(count($row) == 0 && count($row1) == 0)
		{
			//admin id
			$sql_username1 = "select username from admin where username='$username' and password='$password'";
			$sql_email1 = "select email from admin where email='$username' and password='$password'";
			
			$data2 = mysqli_query($conn,$sql_username1);
			$row2 = mysqli_fetch_array($data2);
			
			$data3 = mysqli_query($conn,$sql_email1);
			$row3 = mysqli_fetch_array($data3);
			
			if(count($row2) == 0 && count($row3) == 0)
			{
				echo '<script language="javascript">';
				echo 'alert("Invalid username or password !!")';
				echo '</script>';
				return false;
			}
			else
			{
				//admin login with username
				
				if(count($row2) == 2)
				{	
					session_start();
					$username = $row2[0];
					
					$_SESSION['username'] = $username;
				}
				else
				{
					//admin has provided email
					//fetching username
					
					$query = "select username from admin where email='$username'";
					$data5 = mysqli_query($conn,$query);
					$row5 = mysqli_fetch_array($data5);
					
					$username = $row5[0];
					session_start();
					$_SESSION['username'] = $username;
				}
				
				global $flag;
				$flag = "admin";
				
				$_SESSION['usertype'] = "admin";
				
				return true;
			}
		}
		else
		{
			//user login with username
			
			date_default_timezone_set('Asia/Dhaka');
			$current_time = date("Y-m-d H:i:s");
			
			if(count($row) == 2)
			{	
				session_start();
				$username = $row[0];
				
				$last_logged_in = "UPDATE users SET last_log_in = '$current_time' WHERE users.username = '$username'";
				mysqli_query($conn,$last_logged_in); //inserting last login time
				
				$_SESSION['username'] = $username;
			}
			else
			{
				//user has provided email
				//findind users username
				$query = "select username from users where email='$username'";
				
				$data4 = mysqli_query($conn,$query);
				
				$row4 = mysqli_fetch_array($data4);
				
				$username = $row4[0];
				
				$last_logged_in = "UPDATE users SET last_log_in = '$current_time' WHERE users.username = '$username'";
				mysqli_query($conn,$last_logged_in); //inserting last login time
				
				session_start();
				$_SESSION['username'] = $username;
			}
			
			global $flag;
			$flag = "user";
			
			$_SESSION['usertype'] = "user";
			
			return true;
		}
	}
?>