<?php
	//var_dump($GLOBALS);
	$username = $_SESSION['username'];
	$conn = mysqli_connect("localhost","root","","photography_site",3306); 
	
	if(isset($_POST['upload']))
	{
		if($_FILES['file']['name'] != "")
		{
			//var_dump($GLOBALS);
			$fileName = $_FILES['file']['name'];
			$fileTmpName = $_FILES['file']['tmp_name'];
			$fileSize = $_FILES['file']['size'];
			$fileError = $_FILES['file']['error'];
			
			$fileExt = explode(".",$fileName);
			$fileActualExt = strtolower(end($fileExt));
			
			if($fileActualExt == "jpeg" || $fileActualExt == "jpg" || $fileActualExt == "png")
			{
				if($fileSize > 5242884)
				{
					echo '<script language="javascript">';
					echo 'alert("Your Image size is more than 5 Megabyte !!!")';
					echo '</script>';
				}
				else
				{
					if($fileError)
					{
						echo '<script language="javascript">';
						echo 'alert("An error occured while uploading the file !!")';
						echo '</script>';
					}
					else
					{
						//insert picture
						
						$fileNameNew = uniqid('',true).".".$fileActualExt;
						$destination = '../uploads/'.$username;
						$fileDestination = '../uploads/'.$username.'/'.$fileNameNew;
						
						$qry = "INSERT INTO user_images (username, id, image_path) VALUES ('$username', NULL, '$fileDestination')";
						
						$result = mysqli_query($conn,$qry);
						
						if($result)
						{
							if(move_uploaded_file($fileTmpName,$fileDestination))
							{
								echo '<script language="javascript">';
								echo 'alert("Upload Success")';
								echo '</script>';
							}
							else
							{
								echo '<script language="javascript">';
								echo 'alert("Upload Failed !!")';
								echo '</script>';
							}
						}
						else
						{
							echo '<script language="javascript">';
							echo 'alert("Upload Failed !!")';
							echo '</script>';
						}
					}
				}
			}
			else
			{
				echo '<script language="javascript">';
				echo 'alert("Please upload Image Files !!!")';
				echo '</script>';
			}
		}
	}
	
	$q1 = "select * from user_images where username = '$username'";
	$user_data = mysqli_query($conn,$q1);
	
	if($user_data)
	{
		//
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("An error occured !!")';
		echo '</script>';
	}
?>
