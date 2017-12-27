<?php
	session_start();
	include("../data/gallery_handler.php");
?>

<form method="POST" enctype="multipart/form-data">
	<table border="1" cellpadding="0">
		<tr>
			<td>
				<input type="submit" name="cancel" value="Cancel"/>
			</td>
		</tr>
	</table>
</form>

<?php
	if(isset($_POST['cancel']))
	{
		echo '<script language="javascript">
			 window.location = "Gallery.php";
			 </script>';
	}
?>

<?php
		if($user_data != "")
		{
			$i = 0;
			
			echo '<table>';
			
			while($row = mysqli_fetch_assoc($user_data))
			{
					$i++;
					//if this is first value in row, create new row
					if ($i % 2 == 1) 
					{
						echo "<tr>";
					}
					echo "<td align='center'>";
					?>
					
						<img src="<?= $row['image_path']; ?>" height="300"/><br/>
						<a href='Delete Image.php?id=<?= $row['id']; ?>'>Delete</a>
					
					<?php
					echo "</td>";
					
					//if this is third value in row, end row
					if ($i % 2 == 0) 
					{
						$i = 0;
						echo "</tr>";
					}
			}
			
			echo "</table>";
		}
		else
		{
			echo "OOOPS !! No Images uploaded";
		}
?>