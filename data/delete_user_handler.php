<?php
	//var_dump($GLOBALS);
	
	function retrieveInfo($username)
	{
		$conn = mysqli_connect("localhost","root","","photography_site",3306);
	
		$user_data_query = "select * from users where username='$username'";
		$user_data = mysqli_query($conn,$user_data_query);
		$user_info = mysqli_fetch_assoc($user_data);
		
		$dob = $user_info['dob'];
		
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
		$age = $age." Years";
		
		$user_info['age'] = $age;
		
		if($user_info['last_log_in'] == null)
			$user_info['last_log_in'] = "Never";
		
		return $user_info;
	}
	
	function deleteUser($username)
	{
		$conn = mysqli_connect("localhost","root","","photography_site",3306);
		$qry = "DELETE FROM users WHERE users.username = '$username'";
		
		$result = mysqli_query($conn,$qry);
		
		return $result;
	}
?>