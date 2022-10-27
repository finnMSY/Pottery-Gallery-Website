<!DOCTYPE html>
<html> <!-- Start of HTML tag (END IN FOOTER) -->
	<head> <!-- Start of Head tag (END IN NAVIGATION) -->
		<title>About</title> <!-- Website title -->
		<link rel="stylesheet" type="text/css" href="Css/stylesheet.css"> <!-- Link to Stylesheet -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	    <?php 
    	$pagedecider = 3;
		include("navigation.php"); // Link to navigtion page

	    // Initialising Error related variables

	    // Retrieving page information from 'pages' database
		$sql = "SELECT * FROM pages where pagenum = 2";
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
			<div><h1 id="title" style="left: 38vw; top: 18%;">About</h1></div>

			<div class="section group bottomMenu about">  <!-- Start of Index Section 1 -->
				<div class="col span_1_of_2" style="">
					<h2 class="indexheader rightheader"><?php print $title1 ?></h2>
					<p class="indextext"><?php print $paragraph1 ?></p>
				</div>
				<div class="col span_1_of_2 imagebox">
					<img class = "Image3" src="Images/<?php print($image1); ?>" >
				</div>
			</div> <!-- End of Index Section 1 -->
			<div class="section group bottomMenu about"> <!-- Start of Index Section 2 -->
				<div class="col span_1_of_2 imagebox">
				<img class = "Image2" src="Images/<?php print $image2 ?>">
				</div>
				<div class="col span_1_of_2">
					<h2 class="indexheader leftheader"><?php print $title2 ?></h2>
					<p class="indextext1"><?php print $paragraph2 ?></p>
				</div>
			</div> <!-- End of Index Section 2 -->
			<div class="section group"> <!-- Start of Index Section 3 -->
				<div class="bottomMenu about">
					<div class="col span_1_of_2">
						<h2 class="indexheader rightheader"><?php print $title3 ?></h2>
						<p class="indextext"><?php print $paragraph3 ?></p>			
					</div>
					<div class="col span_1_of_2 imagebox">
						<img class = "Image3" src="Images/<?php print $image3 ?>">
					</div>
				</div>
			</div> <!-- End of Index Section 3 -->
		
	<?php 
		include("footer.php"); //Link to Footer Page
	?> 