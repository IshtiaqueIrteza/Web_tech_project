<?php
	//var_dump($GLOBALS);
	$conn = mysqli_connect("localhost","root","","photography_site",3306);
	$username = $_SESSION['username'];
	
	$user_data_query = "select * from users where username='$username'";
	$user_data = mysqli_query($conn,$user_data_query);
	
	$user_data_array = mysqli_fetch_assoc($user_data);
	//var_dump($user_data_array);
	
	$dob = $user_data_array['dob'];
	
	for($i=0;$i<strlen($dob);$i++)
	{
		if($dob[$i] == '/')
		{
			$dob[$i] = '-';
		}
	}
	
	//var_dump($dob);
	
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
	$age = $diff->format('%y');
	//var_dump($age);
?>