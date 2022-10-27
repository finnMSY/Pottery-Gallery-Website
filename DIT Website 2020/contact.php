<!DOCTYPE html>
<html>
	<head class="contactpage">
		<title>Contact</title>
		<link rel="stylesheet" type="text/css" href="Css/stylesheet.css"> <!-- Link to Stylesheet -->
		
		<?php 
		$pagedecider = 3;
		include("navigation.php"); // Link to navigtion page>
		$sql = "SELECT * FROM pages where pagenum= '3'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$phone = $row["client_phone"];
			$email = $row["client_email"];
			$instagram = $row["client_instagram"];
			$facebook = $row["client_facebook"];
		} else {
			echo "0 Results";
		}
		?>
			<h1 id="title" style="left: 34vw; top: 9vw;">Contact</h1>

			<div class="contact_grid_wrapper">
				<div class="contact_message">
					<h2>If you have an questions or queries about the items sold on this website or the way this website is run, please fill out the form below or contact us on through our contact details listed below.</h2>
					<p> 
						PHONE: <u><?php print("$phone"); ?></u> | 
						EMAIL: <u><?php print("$email"); ?></u> | 
						FACEBOOK: <u><?php print("$facebook"); ?></u> | 
						INSTAGRAM: <u><?php print("$instagram"); ?></u>
					</p>
				</div>

				<div class="contact_form">
					<form action="contactaction_page.php" method="post">
						<div class="contactform_grid_wrapper">
							<div class="contactform_box_1"> 
								<input type="hidden" id="" name="" placeholder="Page Number...">
						        <?php 
					        	if (isset($_SESSION['Username'])) {
					        		print($_SESSION['Username']);
					        	}
					        	else {
					        		print("Guest");
					        	}
						        ?>
							</div>

							<div class="contactform_box_2">
								<input type="text" id="email" name="email" placeholder="Your Email Address..." required>
							</div>

							<div class="contactform_box_3">
								<input type="number" id="phone" name="phone" placeholder="Your Phone Number..." required>
							</div>

							<div class="contactform_box_4">
								<textarea id="query" name="query" placeholder="Your Query..." style="height:200px" required></textarea>
							</div>
							<div class="contactform_box_5">
								<button type="submit" value="Submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>	
			<?php include('footer.php'); ?>
	</body>
</html>
<script src="Js/javascript.js"> </script> <!-- External Javascript Script -->	   