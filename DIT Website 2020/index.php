<!DOCTYPE html>
<html> <!-- Start of HTML tag (END IN FOOTER) -->
	<head> <!-- Start of Head tag (END IN NAVIGATION) -->
		<title>Home</title> <!-- Website title -->
		<link rel="stylesheet" type="text/css" href="Css/stylesheet.css"> <!-- Link to Stylesheet -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	    <?php 
	    	$pagedecider = 1;
			include("navigation.php"); // Link to navigtion page

		    // Initialising Error related variables

		    // Retrieving page information from 'pages' database
			$sql = "SELECT * FROM pages where pagenum = 1";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// Output the data of each row
			    $row = $result->fetch_assoc(); 
			   	$title1 = $row["title1"];
			   	$title2 = $row["title2"];
			   	$title3 = $row["title3"];
			   	$paragraph1 = $row["paragraph1"];
			   	$paragraph2 = $row["paragraph2"];
			   	$paragraph3 = $row["paragraph3"];
			   	$image1 = $row["image1"];
			   	$image2 = $row["image2"];
			   	$image3 = $row["image3"];
			} else {
			    echo "0 results";
			}
			$conn->close();
		?>

			<!-- header HTML Begins -->
			<h1 id="title">Pakiri Clay </h1></div>
			<div class="buttons"><a href="store.php">Shop Now</a></div>

			<div>
				<div id="myID" class="hide">
					<div class="index_arrange">
						<h2 class=""><?php print $title1 ?></h2>
						<p class=""><?php print $paragraph1 ?></p>
					</div>
					<div class="index_arrange">
						<img src="Images/<?php print $image1 ?>">
					</div>
				</div>
				<div id="myID1" class="hide">
					<div class="index_arrange leftheader" style="float: right;">
						<h2 class=""><?php print $title2 ?></h2>
						<p class=""><?php print $paragraph2 ?></p>
					</div>
					<div class="index_arrange" style="float: left;">
						<img class="" src="Images/<?php print $image2 ?>">
					</div>
				</div>
				<div id="myID2" class="hide">
					<div class="index_arrange">
						<h2 class=""><?php print $title3 ?></h2>
						<p class=""><?php print $paragraph3 ?></p>
					</div>
					<div class="index_arrange">
						<img class="" src="Images/<?php print $image3 ?>">
					</div style="background-color: black;" class="index_arrange">
				</div>
			</div>

			<div style="display: none;">
			<div id="myID" class="section group bottomMenu hide"> <!-- Start of Index Section 1 -->
				<div class="col span_1_of_2">
					<h2 class="indexheader rightheader"><?php print $title1 ?></h2>
					<p class="indextext"><?php print $paragraph1 ?></p>
				</div>
				<div class="col span_1_of_2 imagebox">
					<img class = "Image3" src="Images/<?php print $image1 ?>">
				</div>
			</div> <!-- End of Index Section 1 -->
			<div id="myID1" class="section group bottomMenu hide"> <!-- Start of Index Section 2 -->
				<div class="col span_1_of_2 imagebox">
				<img class = "Image2" src="Images/<?php print $image2 ?>">
				</div>
				<div class="col span_1_of_2">
					<h2 class="indexheader leftheader"><?php print $title2 ?></h2>
					<p class="indextext1"><?php print $paragraph2 ?></p>
				</div>
			</div> <!-- End of Index Section 2 -->
			<div class="section group"> <!-- Start of Index Section 3 -->
				<div id="myID2" class="bottomMenu hide">
					<div class="col span_1_of_2">
						<h2 class="indexheader rightheader"><?php print $title3 ?></h2>
						<p class="indextext"><?php print $paragraph3 ?></p>			
					</div>
					<div class="col span_1_of_2 imagebox">
						<img class="Image3" src="Images/<?php print $image3 ?>">
					</div>
				</div>
			</div> <!-- End of Index Section 3 -->
			</div>
		
	<?php 
		include("footer.php"); //Link to Footer Page
	?> 