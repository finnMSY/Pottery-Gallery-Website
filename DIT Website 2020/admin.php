<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="Css/stylesheet.css">
	<style>
		table {
		  border-collapse: collapse;
		  border-spacing: 0;
		  width: 100%;
		  border: 1px solid #ddd;
		}

		th, td {
		  text-align: left;
		  padding: 8px;
		}

		
	</style>

	<?php 
	$pagedecider = 3;
	include("navigation.php"); // Link to navigtion page 
	
if(isset($_SESSION['Username']) AND $_SESSION['Username'] == 'admin') { 

	if (isset($_GET['ready']) AND $_GET['ready'] = 1) {
		unset($_SESSION['contact']);
		header("Location: admin.php?pagechooser=3");
	}

	?>
	<body>
		<?php
			$sql = "SELECT * FROM pages where pagenum= '5'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
				$navlink1 = $row["navlink1"];
				$navlink2 = $row["navlink2"];
				$navlink3 = $row["navlink3"];
			} else {
				echo "0 Results";
			}
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
		<div id="page_container">
			<h1 id="title" style="left: 38vw; top: 9vw;">Admin</h1>
			<div class="section group">
				<!-- <a href="newpage.php" class="newpagebutton">New</a> -->
				<?php 
				$pagechooser = 1;
				$valuecounter = 1;
				?>  
				<form name="myform">
					<select name="pagechooser" onchange="myform.submit();" style="width: 90%; float: left;">
			        	<option selected disabled>Page...</option>
			            <?php
			            	$variable = 1;
			            	$sql = "SELECT * FROM pages ORDER BY pagenum DESC LIMIT 1";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								$row = $result->fetch_assoc();
								$numP = $row["pagenum"];
							} else {
								echo "0 Results";
							}
			            
			              	do {
				            	$sql = "SELECT * FROM pages where pagenum= '$variable'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									$row = $result->fetch_assoc();
									$nameP = $row["pagename"];
								} else {
									echo "0 Results";
								}
				                ?>
				                  <option value="<?php print($variable); ?>"><?php print($nameP); ?></option>
				                <?php
				                $variable = $variable + 1;
				            }
			              while ($variable < ($numP + 1));
			         ?> 
			        </select>
				</form>
			    <div style="width: 10%; float: left;" class="adminbutton"><a href="accounts.php">Admin Details</a></div>
				<?php
				if (isset($_GET['pagechooser'])) {
					$pagechooser = $_GET['pagechooser'];
				}
				?> 
				<?php
					$sql = "SELECT * FROM pages where pagenum= '$pagechooser'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						$pagename = $row["pagename"];
						$pageID = $row["id"];
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
					} else {
						echo "0 Results";
					}
					?>

				<div class="col span_2_of_2">
					<table id="table1" style="display: <?=$pagenum <= 2 ? '' : 'none'?>">
					  <tr>
					    <th><u>Page Number</u> <a href="editpage.php?id=<?php print($pageID);?>"><img src="Images/edit.png" width="20" alt="Edit"></a><!--  | <a href="deletepage.php?id=<?php print($pageID);?>"><img src="Images/delete.png" width="20" alt="Edit"></a> --></th>
					    <td><?php print("$pagenum"); ?></td>
					  </tr>
					  <tr>
					    <th>Title 1</th>
					    <td><?php print("$title1"); ?></td>
					  </tr>
					  <tr>
					  	<th>Paragraph 1</th>
					    <td><?php print("$paragraph1"); ?></td>
					  </tr>
					  <tr>
					  	<th>Image 1</th>
					    <td><?php print("$image1"); ?></td>
					  </tr>
					 <tr>
					    <th>Title 2</th>
					    <td><?php print("$title2"); ?></td>
					  </tr>
					  <tr>
					  	<th>Paragraph 2</th>
					    <td><?php print("$paragraph2"); ?></td>
					  </tr>
					  <tr>
					  	<th>Image 2</th>
					    <td><?php print("$image2"); ?></td>
					  </tr>
					  <tr>
					    <th>Title 3</th>
					    <td><?php print("$title3"); ?></td>
					  </tr>
					  <tr>
					  	<th>Paragraph 3</th>
					    <td><?php print("$paragraph2"); ?></td>
					  </tr>
					  <tr>
					  	<th>Image 3</th>
					    <td><?php print("$image3"); ?></td>
					  </tr>
					</table>
					
					<table id="myHide" style="display: <?=$pagenum == 5 ? '' : 'none'?>">
					  <tr>
					  	<th><u>Navigation</u> <a href="editpage.php?id=<?php print($pageID);?>"><img src="Images/edit.png" width="20" alt="Edit"></a></th>
					  </tr>
					  <tr>
					    <th>About Page</th>
					    <td><?php print("$navlink1"); ?></td>
					  </tr>
					  <tr>
					  	<th>Store Page</th>
					    <td><?php print("$navlink2"); ?></td>
					  </tr>
					  <tr>
					  	<th>Contact Page</th>
					    <td><?php print("$navlink3"); ?></td>
					  </tr>
					</table>

					<div id="" style="display: <?=$pagenum == 3 ? '' : 'none'?>">
					  	<table>
					  		<tr>
					  			<th><u>Contact Links</u> <a href="editpage.php?id=<?php print($pageID);?>"><img src="Images/edit.png" width="20" alt="Edit"></a></th>
					  		</tr>
					  		<tr>
					  			<th>Phone Number:</th>
					  			<td><?php print($phone); ?></td>
					  		</tr>
					  		<tr>
					  			<th>Email Address:</th>
					  			<td><?php print($email); ?></td>
					  		</tr>
					  		<tr>
					  			<th>Facebook:</th>
					  			<td><?php print($facebook); ?></td>
					  		</tr>
					  		<tr>
					  			<th>Instagram:</th>
					  			<td><?php print($instagram); ?></td>
					  		</tr>
						  	<tr>
						  		<th><u>Queries</u></th>
						  		<td>
						  			<form action="contact_filter.php" class="contact_search" method="post"><input name="contact_filter_input" placeholder="Search Username"></input><button name="contact_filter_reset" value="">Reset</button></form>
						            <?php
						            	if (isset($_SESSION['contact_filter'])) {
						            		$contact_filter1 = $_SESSION['contact_filter'];
						            	}
						            	else {
						            		$contact_filter1 = '';
						            	}
						            	$sql = "SELECT * FROM contact WHERE Username LIKE '%$contact_filter1%'";
										$result = $conn->query($sql);
										$array = Array();
										$arrayid = Array();
										while($row = $result->fetch_assoc()){
										    $array[] = $row['Username'];
										    $arrayid[] = $row['id'];
										}
										$another_v = 0;
										while ($another_v < count($array)) {
											?>
							                  <form action="contactview.php" method="post">
							                  	<div class="contact-area"><span style="font-family: 'Tahoma'"><?php print($array[$another_v]); ?>'s Review</span><button name="contactdelete" value="<?php print($arrayid[$another_v]); ?>" ><img src="Images/delete.png" width="20" height="20" style="position: relative; bottom: 1px;"></button><button name="contactview" value="<?php print($arrayid[$another_v]); ?>" >View</button></div>
							                  </form>
							                <?php
							                $another_v = $another_v +1;
										}		             
						         ?> 
						  		</td>
							</tr>
					  	</table>
					</div>
					<div class="contactreviews" style="display: <?=isset($_SESSION['contact']) ? '' : 'none'?>">
				  		<div>
				  			<?php 
				  				$id_c = $_SESSION['contact'];
				  				$sql = "SELECT * FROM contact WHERE id = '$id_c'";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									$row = $result->fetch_assoc();
									$username_c = $row["Username"];
									$email_c = $row["Email"];
									$phone_c = $row["Phone"];
									$query_c = $row["Query"];
								} else {
									echo "0 Results";
								}
				  			?>
				  			<button><a href="admin.php?ready=1">Back?</a></button>
				  			<table>
				  				<tr>
				  					<th>Username</th>
				  					<td><?php print($username_c);?></td>
				  				</tr>
				  				<tr>
				  					<th>Email</th>
				  					<td><?php print($email_c);?></td>
				  				</tr>
				  				<tr>
				  					<th>Phone</th>
				  					<td><?php print($phone_c);?></td>
				  				</tr>
				  				<tr>
				  					<th>Query</th>
				  					<td><?php print($query_c);?></td>
				  				</tr>
				  			</table>
				  		</div>
					</div>

					<table id="" style="display: <?=$pagenum == 4 ? '' : 'none'?>">
						<?php 
							$sql = "SELECT * FROM cart_products ORDER BY value DESC LIMIT 1";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								$row = $result->fetch_assoc();
								$value = $row["value"];
							} else {
								echo "0 Results";
							}
						?>
					  <tr>
					  	<form action="actioninsert_page.php" method="post" enctype="multipart/form-data">
						    <th><u>Store</u></th>
						    <td>
							    <tr style="display: none">
					    			<th style="width: 15px;">Value</th>
					    			<td><input type="hidden" name="value" required value="<?php print($value+1);?>"><?php print($value+1);?></input></td>
						    	</tr>
					    		<tr>
						    		<th style="width: 15px;">Name</th>
						    		<td><input class="store_input" required name="name" placeholder="Insert Product Name"></input></td>
					    		</tr>

					    		<tr>
					    			<th style="width: 15px;">Text</th>
					    			<td><input class="store_input" required name="text" placeholder="Insert Product Description"></input></td>
					    		</tr>

					    		<tr>
					    			<th style="width: 15px;">Image</th>
					    			<td><input class="store_input" type="file" name="file" id="file" value="<?php print($image);?>"></input></td>
					    			<!-- <td><input class="store_input" required name="image" placeholder="Insert Product Image Name"></input></td> -->
					    		</tr>
						    	<tr>
					    			<th style="width: 15px;">Category</th>
					    			<td><select name ="category">
					    				<option value="cup">Cup</option>
					    				<option value="bowl">Bowl</option>
					    				<option value="plate">Plate</option>
					    			</select></td>
					    		</tr>
					    		<tr>
					    			<th style="width: 15px;">Price</th>
					    			<td>
					    				<input class="store_input" type="number" required name="price" placeholder="Insert Product Price"></input>
					    			</td>
						    	</tr>
						    	<tr>
					    			<th style="width: 15px;">Total Quantity</th>
					    			<td>
					    				<input class="store_input" type="number" required name="total_quantity" style="width: 90%;" placeholder="Insert Product Total Quantity"></input>
					    				<button style="float: right; width: 10%; height: 40px;" name="submit">Submit</button>
					    			</td>
						    	</tr>
						    </td>
						</form>
					  </tr>
					</table>
				</div>
			</div>
			<?php include("footer.php"); 
} else {
	header("Location: index.php");
}
?>