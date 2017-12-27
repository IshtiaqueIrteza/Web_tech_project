<html>
	<body>
		<table border="1" height="70%" width="80%" cellpadding="20" align="center">
			<tr height="20%">
				<td>
					<img align="center"  src="Logo.jpg" width="100" height="50"/>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					&emsp;&emsp;&emsp;
					<a href="Home.php"/>Home | </a>
					<a href="Login.php"/>Login | </a>
					<a href="Registration.php"/>Registration </a>
				</td>
			</tr>
			<tr height="200%">
				<td>
					<h3>Welcome to Phototalk</h3>
						<script src ="slideshow.js">showSlides();</script>
						<meta name="viewport" content="width=device-width, initial-scale=1">
								</head>
								<body>
								<div class="slideshow-container">
								<div class="mySlides fade">
								  
								  <img src="home_images/img1.jpg" width="100%" height="400">
								  <div align="center"><h1>Upload</h1></div>
								</div>
								<div class="mySlides fade">
								
								  <img src="home_images/img2.jpg" width="100%" height="400">
								  <div align="center"><h1>Share</h1></div>
								</div>
								<div class="mySlides fade">
								 
								  <img src="home_images/img3.jpg" width="100%" height="400">
								  <div align="center"><h1>Donate</h1></div>
								</div>
								</div>
								<br>
								<div align="center">
								  <span class="dot"></span> 
								  <span class="dot"></span> 
								  <span class="dot"></span> 
								</div>
						<script>
							var slideIndex = 0;
		showSlides();

			function showSlides() {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("dot");
			for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";  
			}
			slideIndex++;
			if (slideIndex > slides.length) {slideIndex = 1}    
			for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex-1].style.display = "block";  
			dots[slideIndex-1].className += " active";
			setTimeout(showSlides, 2500); // Change image every 2 seconds
			
}
</script>
					
				</td>
			</tr>
			<tr height="10%">
				<td align="center">
					Copyright © 2017
				</td>
			</tr>
		</table>
	</body>
</html>