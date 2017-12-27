<?php
	$conn = mysqli_connect("localhost","root","","photography_site",3306);
	$message = "";
	
	$main_user = $_SESSION['username'];
	$sql_query = "SELECT username , email , dob from users where username='$main_user'";
	$user_data = mysqli_query($conn,$sql_query);
	$user_data_arr = mysqli_fetch_assoc($user_data);
	//var_dump($user_data_arr);
	
	$flag1 = true;
	$flag2 = true;
	
	function email_validation()
	{
		global $message;
		global $user_data_arr;
		
		if(isset($_POST['email']))
		{
			$email = $_POST['email'];
			
			if($user_data_arr['email'] != $email)
			{
				$t1 = explode("@",$email);
			    //var_dump($t1);
			
				if($email == "")
				{
					$message.="Email required !!\\n";
					return false;
				}
				
				if(count($t1) != 2)
				{
					$message.="Invalid email !!\\n";
					return false;
				}
				
				$index = strlen($t1[0])-1;
				
				if($index<0 || $t1[0][$index] == '.')
				{
					$message.="Invalid email !!\\n";
					return false;
				}
				
				if($t1[1][0] == '.')
				{
					$message.="Invalid email !!\\n";
					return false;
				}
				
				$t2 = explode(".com",$t1[1]);
				//var_dump($t2);
				
				if(count($t2) != 2)
				{
					$message.="Invalid email !!\\n";
					return false;
				}
				
				if(strlen($t2[1]) != 0)
				{
					$message.="Invalid email !!\\n";
					return false;
				}
				
				$index = strlen($t2[0])-1;
				
				if($index<0 || $t2[0][$index] == '.')
				{
					$message.="Invalid email !!\\n";
					return false;
				}
				
				global $conn;
				
				$data = mysqli_query($conn,"select email from users where email='$email'");
				$row = mysqli_fetch_array($data);
				$data1 = mysqli_query($conn,"select email from admin where email='$email'");
				$row1 = mysqli_fetch_array($data1);
				
				if(count($row) == 0 && count($row1) == 0)
				{
					return true;
				}
				else
				{
					$message.="Email already exists !!\\n";
					return false;
				}
			}
			else
			{
				return true;
			}
		}
	}
	
	function username_validation()
	{
		global $conn;
		global $message;
		global $user_data_arr;
		
		if(isset($_POST['username']))
		{
			$username = $_POST['username'];
			
			if($username != $user_data_arr['username'])
			{
				if($username == "")
				{
					$message.="Username required !!\\n";
					return false;
				}
				else
				{
					$data = mysqli_query($conn,"select username from users where username='$username'");
					$row = mysqli_fetch_array($data);
					$data1 = mysqli_query($conn,"select username from admin where username='$username'");
					$row1 = mysqli_fetch_array($data1);
					
					if(count($row) == 0 && count($row1) == 0)
					{
						return true;
					}
					else
					{
						$message.="Username already exists !!\\n";
						return false;
					}
				}
			}
			else
			{
				return true;
			}
		}
	}
	
	function dob_validation()
	{
		global $message;
		global $user_data_arr;
		
		if(isset($_POST['dob']))
		{
			if($_POST['dob'] != $user_data_arr['dob'])
			{
				if($_POST['dob'] == "")
				{
					$message.="Date of Birth field can't be empty !!\\n";
					return false;
				}
				
				$data2 = explode("/",$_POST['dob']);
				
				if(count($data2) != 3)
				{
					$message.="Wrong DOB !!\\n";
					return false;
				}
				
				$day = $data2[0];
				$month = $data2[1];
				$year = $data2[2];
				
				if($day<'1' || $day>'31')
				{
					$message.="Wrong Birthdate !!\\n";
					return false;
				}
				
				if($month<'1' || $month>'12')
				{
					$message.="Wrong Birthmonth !!\\n";
					return false;
				}
				
				if($year<'1917' || $year>'2017')
				{
					$message.="Wrong Birthyear !!\\n";
					return false;
				}
				
				return true;
			}
			else
			{
				return true;
			}
		}
	}
	
	$user_data_query;
	$user_data;
	$user_data_array;
	
	//main validation
	function validation()
	{
		global $message;
		global $conn;
		global $user_data_query;
		global $user_data;
		global $user_data_array;
		
		$f3 = username_validation();
		$f2 = email_validation();
		$f6 = dob_validation();
		
		if($f3 && $f2 && $f6)
		{
			$user = $_SESSION['username'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$dob = $_POST['dob'];
			$sql = "UPDATE users SET username = '$username', email = '$email' , dob = '$dob' WHERE users.username = '$user'";
			$result = mysqli_query($conn,$sql);
			
			if($result)
			{
				$_SESSION['username'] = $username;
				
				$destination = '../uploads/'.$user.'/';
				$newDestination = '../uploads/'.$username.'/';
				
				if(is_dir($destination))
				{
					rename($destination,$newDestination); //renaming new directory
					//var_dump($destination);
				}
				//changing every picture directory from database
				$query = "select * from user_images where username='$username'";
				$ans = mysqli_query($conn,$query);
				
				if(mysqli_num_rows($ans) != 0)
				{
					while($row6 = mysqli_fetch_array($ans))
					{
						$id = $row6['id'];
						$path = $row6['image_path'];
						$path1 = str_replace($user,$username,$path);
						
						$tmp_qry = "UPDATE user_images SET `image_path` = '$path1' WHERE user_images.id = '$id'";
						
						mysqli_query($conn,$tmp_qry);
					}
				}
				
				//end updating
				
				$user_data_query = "select * from users where username='$username'";
				$user_data = mysqli_query($conn,$user_data_query);
			
				$user_data_array = mysqli_fetch_assoc($user_data);
				return true;
			}
			else
			{
				echo '<script language="javascript">';
				echo 'alert("Unknown error occured !!!")';
				echo '</script>';
			}
		}
		else
		{
			//var_dump($message);
			echo '<script language="javascript">';
			echo 'alert("'.$message.'")';
			echo '</script>';
		}
	}
?>