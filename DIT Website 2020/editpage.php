<?php
$pagedecider = 3;
include("navigation.php");
if (isset($_SESSION['Username']) AND $_SESSION['Username'] == 'admin') { 
?>
	<!DOCTYPE html>
	<html>
		<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title>Websites</title>
			<link rel="stylesheet" type="text/css" href="Css/stylesheet.css">
		</head>
		<?php 
		include("setup.php");

		// print_r($_GET);
		$pageID = $_GET["id"];
		$pagenum1 = $_GET["id"];
		$sql = "SELECT * FROM pages where id= '$pageID'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$pagename = $row["pagename"];
			$pagenum = $row["pagenum"];
			$title1 = $row["title1"];
			$paragraph1 = $row["paragraph1"];
			$image1 = $row["image1"];
			$title2 = $row["title2"];
			$paragraph2 = $row["paragraph2"];
			$image2 = $row["image2"];
			$title3 = $row["title3"];
			$paragraph3 = $row["paragraph3"];
			$image3 = $row["image3"];
			$navlink1 = $row["navlink1"];
			$navlink2 = $row["navlink2"];
			$navlink3 = $row["navlink3"];
			$phone = $row["client_phone"];
			$email = $row["client_email"];
			$instagram = $row["client_instagram"];
			$facebook = $row["client_facebook"];
		} else {
			echo "0 Results";
		}

		?>
		<body>
			<div id="page_container" style="width: 80%; margin: auto;">
				<h1 id="title" style="left: 30.5vw; top: 9vw;">Edit Page</h1>
			    <form action="editaction_page.php" method="post">
			    	<div style="display: <?php if ($pagenum1 == 17 OR $pagenum1 == 9) {print("block");} else {print("none");}?>">
			    		<div class="indexpage">
							<input type="hidden" name="pageID" id="pageID" value="<?php print("$pageID"); ?>">
					    	<div style="grid-area: pagename;">
					<!--     		<div class="col-25">
						       		<label for="pagename">Page Name</label>
						        </div> -->
						      	<div>
						        	<input type="text" id="pagename" name="pagename" value="<?php print("$pagename"); ?>">
						      	</div>
					    	</div>
					    	<div style="grid-area: title1;">
					    		<!-- <div class="col-25">
						        	<label for="title1">Title 1</label>
						      	</div> -->
						        <input type="text" id="title1" name="title1" value="<?php print("$title1"); ?>">
					    	</div>
					    	<div style="grid-area: image1;">			      
						        <input style="float: left;" type="file" id="image1" name="file" value="<?php print("$image1"); ?>">
					    	</div>
					    	<div style="grid-area: para1;">
					    		<!-- <div class="col-25">
						        	<label for="paragraph1">Paragraph 1</label>
						      	</div> -->
						        <textarea id="paragraph1" name="paragraph1" style="height:200px"><?php print("$paragraph1"); ?></textarea>
					    	</div>
					    	<div style="grid-area: title2;">
					    		<!-- <div class="col-25">
						        	<label for="title1">Title 2</label>
						      	</div> -->
						        <input type="text" id="title2" name="title2" value="<?php print("$title2"); ?>">
					    	</div>
					    	<div style="grid-area: image2;">
					    		<!-- <div class="col-25">
						        	<label for="image2">Image 2</label>
						      	</div> -->
						        <input type="text" id="image2" name="image2" value="<?php print("$image2"); ?>">
					    	</div>
					    	<div style="grid-area: para2;">
					    		<!-- <div class="col-25">
						        	<label for="paragraph2">Paragraph 2</label>
						      	</div> -->
						        <textarea id="paragraph2" name="paragraph2" style="height:200px"><?php print("$paragraph2"); ?></textarea>
					    	</div>
					    	<div style="grid-area: title3;">
					    		<!-- <div class="col-25">
						        	<label for="title1">Title 3</label>
						      	</div> -->
						        <input type="text" id="title3" name="title3" value="<?php print("$title3"); ?>">
					    	</div>
					    	<div style="grid-area: image3;">
					    		<!-- <div class="col-25">
						        	<label for="image2">Image 2</label>
						      	</div> -->
						        <input style="float: left;" type="text" id="image3" name="image3" value="<?php print("$image3"); ?>">
					    	</div>
					    	<div style="grid-area: para3;">
					    		<!-- <div class="col-25">
						        	<label for="paragraph3">Paragraph 3</label>
						      	</div> -->
						        <textarea id="paragraph3" name="paragraph3" style="height:200px"><?php print("$paragraph3"); ?></textarea>
					    	</div>
					    	<div style="grid-area: submit_edit;">
					    		<div style=" margin-left:calc(50% - 100px); background-color: ">
					    			<button disabled style="float: left; margin-top: 10px; width: 20%; height: 35px; border: none; background-color: #EFEFEF;">
										<a href="admin.php" style="text-decoration: none; color: black;">Back</a> 
									</button>
								    <input type="submit" name="submit" value="Submit" style="width: 20%; height: 35px; border: none; margin-top: 10px; margin-left: 10px;">
								</div>
					    	</div>
				    	</div>
				    </div>

				    <div class="container" style="display: <?=$pagenum1 == 14 ? '' : 'none'?>; background-color: white;">
					    <div class="row">
					    	<div style="width: calc(100%/3); float: left; padding: 10px;">
					        	<input type="text" id="navlink1" name="navlink1" value="<?php print("$navlink1"); ?>">
					        </div>
					        <div style="width: calc(100%/3); float: left; padding: 10px;">
					        	<input type="text" id="navlink2" name="navlink2" value="<?php print("$navlink2"); ?>">
					        </div>
					        <div style="width: calc(100%/3); float: left; padding: 10px;">
					        	<input type="text" id="navlink1" name="navlink3" value="<?php print("$navlink3"); ?>">
					        </div>
					    </div>
					    <div class="row">
					    	<input type="submit" value="Submit" style="width: 20%; margin-left: 31vw; height: 35px; border: none; margin-top: 10px; margin-bottom: 10px;">
					    </div>
					</div>
					<div class="container" style="display: <?=$pagenum1 == 10 ? '' : 'none'?>; background-color: white;">
					    <div class="row">
					      	<div class="col-50" style="padding: 5px; margin: 0px;">
					        	<input type="text" id="navlink1" name="phone" value="<?php print("$phone"); ?>">
					      	</div>
					      	<div class="col-50" style="padding: 5px; margin: 0px;">
					        	<input type="text" id="navlink2" name="email" value="<?php print("$email"); ?>">
					      	</div>
					    </div>
					    <div class="row">
					      	<div class="col-50" style="padding: 5px; margin: 0px;">
					        	<input type="text" id="navlink3" name="instagram" value="<?php print("$instagram"); ?>">
					      	</div>
					      	<div class="col-50" style="padding: 5px; margin: 0px;">
					        	<input type="text" id="navlink1" name="facebook" value="<?php print("$facebook"); ?>">
					      	</div>
					    </div>
					    <div class="row">
					      	<input type="submit" value="Submit" class="editsubmit" style="width: 20%; margin-left: 31vw; height: 35px; border: none; margin-top: 10px; margin-bottom: 10px;">
					    </div>
					</div> 
			    </form>
			</div>			
		<?php 
		include("footer.php"); 
}
else {
	header("Location: index.php");
}
?>