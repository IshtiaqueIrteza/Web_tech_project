<?php
	$conn = mysqli_connect("localhost","root","","photography_site",3306);
	$message = "";
	
	$flag1 = true;
	$flag2 = true;
	
	function name_validation()
	{
		global $message;
		
		if(isset($_POST['name']))
		{
			global $flag1;
			global $flag2;
			$name = $_POST['name'];
			//var_dump($name);
			
			if(strlen($name)<8)
			{
				$message.="Name must be at least 8 characters !!\\n";
				$flag1 = false;
			}
			
			for($i=0;$i<strlen($name);$i++)
				{
					if($name[$i] == '0' || $name[$i] == '1' || $name[$i] == '2' || $name[$i] == '3' || $name[$i] == '4' || $name[$i] == '5' || $name[$i] == '6' || $name[$i] == '7' || $name[$i] == '8' || $name[$i] == '9')
					{
						$message.="Name cannot contain numeric value !!\\n";
						$flag2 = false;
						break;
					}
				}
			
			if($flag1 == false || $flag2 == false)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}
	
	function email_validation()
	{
		global $message;
		
		if(isset($_POST['email']))
		{
			$email = $_POST['email'];
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
	}
	
	function username_validation()
	{
		global $conn;
		global $message;
		
		if(isset($_POST['username']))
		{
			$username = $_POST['username'];
			
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
	}
	
	function password_validation()
	{
		global $message;
		
		if(isset($_POST['password']))
		{
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			
			if($password == "" || $confirm_password == "")
			{
				$message.="Password field is required !!\\n";
				return false;
			}
			
			if(strlen($password)<8)
			{
				$message.="Password must be at least 8 characters !!\\n";
				return false;
			}
			
			if($password !== $confirm_password)
			{
				$message.="Password fields doesn't match !!\\n";
				return false;
			}
			
			return true;
		}
	}
	
	$gender;
	
	function gender_validation()
	{
		global $message;
		global $gender;
		
		if(isset($_POST['gender']))
		{
			$gender = $_POST['gender'];
			
			if($gender == 'm')
			{
				$gender = "Male";
			}
			else if($gender == "f")
			{
				$gender = "Female";
			}
			else
			{
				$gender = "Others";
			}
			
			return true;
		}
		else
		{
			$message.="Gender is not selected !!\\n";
			return false;
		}
	}
	
	function dob_validation()
	{
		global $message;
		
		if(isset($_POST['day']) && isset($_POST['month']) && isset($_POST['year']))
		{
			$day = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			
			if($day == "" || $month == "" || $year == "")
			{
				$message.="Date of Birth field can't be empty !!\\n";
				return false;
			}
			
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
			
			if((int)$month%2 == 0 && $day>'30')
			{
				$message.="Wrong Birthdate !!\\n";
				return false;
			}
			
			$current_year = date("Y");
			//var_dump($current_year);
			
			if($year<'1917' || $year>$current_year)
			{
				$message.="Wrong Birthyear !!\\n";
				return false;
			}
			
			$current_day = date("Y/m/d");
			$input = $year."/".$month."/".$day;
			
			if($input > $current_day)
			{
				$message.="Wrong DOB !!!\\n";
				return false;
			}
			
			if($month == '2')
			{
				$year = (int)$year;
				
				if((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0))
				{
					if($day > '29')
					{
						$message.="Wrong Birthdate !!\\n";
						return false;
					}
				}
				else if($day > '28')
				{
					$message.="Wrong Birthdate !!\\n";
					return false;
				}
			}
			
			return true;
		}
	}
	
	//main validation
	function validation()
	{
		global $message;
		global $conn;
		global $gender;
		
		$f1 = name_validation();
		$f2 = email_validation();
		$f3 = username_validation();
		$f4 = password_validation();
		$f5 = gender_validation();
		$f6 = dob_validation();
		
		if($f1 && $f2 && $f3 && $f4 && $f5 && $f6)
		{
			date_default_timezone_set('Asia/Dhaka');
			$today = date("Y-m-d H:i:s");
			$name = $_POST['name'];
			$email = $_POST['email'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$dob = $_POST['day'].'/'.$_POST['month'].'/'.$_POST['year'];
			$sql = "INSERT INTO users (name, email, username, password, gender, dob, profile_picture, register_date, last_log_in) VALUES ('$name', '$email', '$username', '$password', '$gender', '$dob', NULL, '$today', NULL)";
			$result = mysqli_query($conn,$sql);
			
			if($result)
			{
				$destination = '../uploads/'.$username;
				
				if(!is_dir($destination))
				{
					mkdir($destination,"0777",true); // creating a new directory
				}
				
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