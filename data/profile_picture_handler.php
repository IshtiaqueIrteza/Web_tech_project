<?php
	$conn = mysqli_connect("localhost","root","","photography_site",3306);
	
	$username = $_SESSION['username'];
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && $_FILES['file']['name'] != "")
	{
		$fileName = $_FILES['file']['name'];
		$fileExt = explode(".",$fileName);
		$fileActualExt = strtolower(end($fileExt));
		
		if($fileActualExt === "jpeg" || $fileActualExt == "jpg" || $fileActualExt == "png")
		{
			$image = addslashes(file_get_contents($_FILES['file']['tmp_name']));
			
			$query1 = "select profile_picture from users where username='$username'"; 
			$q1 = mysqli_query($conn,$query1);
			$q = mysqli_fetch_assoc($q1);
			
			if($q['profile_picture'] == null)
			{
				$query = "UPDATE users SET profile_picture='$image' WHERE users.username = '$username'"; 
				$result = mysqli_query($conn,$query);
				
				if($result)
				{
					echo '<script language="javascript">';
					echo 'alert("Profile_Picture uploaded successfully")';
					echo '</script>';
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
				$query = "UPDATE users SET profile_picture='$image' WHERE users.username = '$username'";
				$result = mysqli_query($conn,$query);
				
				if($result)
				{
					echo '<script language="javascript">';
					echo 'alert("Profile_Picture uploaded successfully")';
					echo '</script>';
				}
				else
				{
					echo '<script language="javascript">';
					echo 'alert("Unknown error occured !!!")';
					echo '</script>';
				}
			}	
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Please upload valid Images")';
			echo '</script>';
		}
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Upload Images First !!")';
		echo '</script>';
	}
?>