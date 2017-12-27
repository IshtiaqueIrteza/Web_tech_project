<?php
	session_start();
	$id = $_REQUEST['id'];
	$username = $_SESSION['username'];
?>

<?php
	if(isset($_POST['Delete']))
	{
		$conn1 = mysqli_connect("localhost","root","","photography_site",3306);
		$q2 = "select image_path from user_images where user_images.id = '$id'";
		$res2 = mysqli_query($conn1,$q2);
		
		if($res2)
		{
			$path = mysqli_fetch_assoc($res2);
			$o_path = $path['image_path'];
			
			if($o_path != "")
			{
				$q1 = "DELETE FROM user_images WHERE user_images.id = '$id'";
				$res1 = mysqli_query($conn1,$q1);
				
				if($res1)
				{
					if(!unlink("$o_path"))
					{
						echo '<script language="javascript">
							  alert("Image Deleted,unknown error occured !!")
							  window.location = "Delete Image Gallery.php";
							  </script>';
					}
					else
					{	
						echo '<script language="javascript">
							  alert("Image Deleted !")
							  window.location = "Delete Image Gallery.php";
							  </script>';
					}
				}
				else
				{
					echo '<script language="javascript">
							  alert("Unknown error !!")
							  window.location = "Delete Image Gallery.php";
							  </script>';
				}
			}
			else
			{
				echo '<script language="javascript">
							  alert("Unknown error !!")
							  window.location = "Delete Image Gallery.php";
							  </script>';
			}
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Unknown error !!")';
			echo '</script>';
		}
	}
?>


<form method="POST">
	<fieldset>
		<legend>ARE YOU SURE ?</legend>
		
		<?php
			$conn = mysqli_connect("localhost","root","","photography_site",3306);
			$q = "select image_path from user_images where id='$id'";
			$res = mysqli_query($conn,$q);
			$result = mysqli_fetch_assoc($res);
			$img_path = $result['image_path'];
		?>
		
		<img src="<?= $img_path ?>" height="200"/><br/><br/>
		
		<input type="submit" name="Delete" value="Delete"/> <a href="Delete Image Gallery.php"> BACK </a>
		
	</fieldset>
</form>