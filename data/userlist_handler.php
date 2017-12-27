<?php
	//var_dump($GLOBALS);
	$conn = mysqli_connect("localhost","root","","photography_site",3306);
	
	$user_data_query = "select * from users";
	$user_data = mysqli_query($conn,$user_data_query);
	
	 function getPersonsByName($personName)
	 {
		global $conn;
		
		$sql = "SELECT * FROM users WHERE username LIKE '%$personName%'";
        $result = mysqli_query($conn,$sql);
        
        return $result;
	 }
?>