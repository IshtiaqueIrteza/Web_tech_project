<?php
	session_start();
?>

<form method="POST" enctype="multipart/form-data">
	<table border="1" cellpadding="0">
		<tr>
			<td>
				<img src="" style="display:none" height="200" id="image"/>
				<input type="file" name="file" onchange="showImage.call(this)"/>
				<input type="submit" name="upload" value="Upload"/> <input type="submit" name="cancel" value="Cancel"/> <input type="submit" name="delete" value="Delete"/> <a href="Dashboard.php"/>BACK</a>
			</td>
		</tr>
	</table>
</form>

<?php
	include("../data/gallery_handler.php");
	
	if(isset($_POST['delete']))
	{
		echo '<script language="javascript">
			 window.location = "Delete Image Gallery.php";
			 </script>';
	}
?>

<script>
	function showImage()
	{
		if(this.files && this.files[0])
		{
			var obj = new FileReader();
			obj.onload = function(data)
			{
				var imaage = document.getElementById("image");
				image.src = data.target.result;
				image.style.display = "block";
			}
			obj.readAsDataURL(this.files[0]);
		}
	}
</script>

<?php
		if(mysqli_num_rows($user_data) != 0)
		{
			while($row = mysqli_fetch_assoc($user_data))
			{
				?>
					<img src="<?= $row['image_path']; ?>" height="300"/>
				<?php
			}
		}
		else
		{
			echo "OOOPS !! No Images found";
		}
?>