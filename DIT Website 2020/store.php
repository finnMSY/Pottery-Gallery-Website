<!DOCTYPE html>
<html>
<head>
	<title>Store</title>
	<link rel="stylesheet" type="text/css" href="Css/stylesheet.css">
</head>
<body>
	<?php 
		$pagedecider = 3;
		include("navigation.php"); // Link to navigtion page
		$price_array = [];

		if (!isset($_SESSION['Username']) AND !isset($_SESSION['guestCart'])) {
			$_SESSION['guestCart'] = [];
		}

		if (isset($_GET['ready']) AND $_GET['ready'] == 1) {
			unset($_SESSION['storevalue']);
			$storepage = $_SESSION['storepage'];
			if ($storepage == 0) {
				header("Location: store.php");
			} 
			else {
				header("Location: store.php?storepage=$storepage");
			}
		}

		if (isset($_SESSION['direction'])) {
			$direction = $_SESSION['direction'];
		}
		else {
			$direction = "id ASC";	
		}
	?>
	<h1 id="title" style="left: 38vw; top: 9vw;">Store</h1>
	<div class="store_filter">
		<form name="categoryform" action="category_search.php" method="post" style="margin-left: 17vw">
			<select onchange="categoryform.submit();" name="category" class="filter" >
				<option disabled selected>Category...</option>
				<option value="all"><a>All</a></option>
				<option value="cup"><a>Cups</a></option>
				<option value="bowl"><a>Bowls</a></option>
				<option value="plate"><a>Plates</a></option>
			</select>
		</form>
		<form name="priceform" action="price_search.php" method="post" enctype="multipart/form-data">
			<select class="filter" name="price" onchange="priceform.submit();">
				<option disabled selected>Price...</option>
				<option value="low"><a>Lowest to Highest</a></option>
				<option value="high"><a>Highest to Lowest</a></option>
			</select>
		</form>
		<form name="searchform" action="search_filter.php" method="post">
			<input type="" name="search_filter" class="filter filterreset" placeholder="Search...">
		</form>
		<form action="filter_reset.php" method="post" style="">
			<button class="filter" type="submit"><span style="margin: auto;">Reset</span></button>
		</form>
	</div>
	<?php 
		$sql = "SELECT * FROM cart_products ORDER BY value DESC LIMIT 1";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$numRows = $row["value"] + 1;
		} else {
			echo "0 Results";
		}

		$search = '';
		if (isset($_SESSION['search'])) {
			$search = $_SESSION['search'];
		}
		else {
			$search = '';
		}

		$category = '';

		if (isset($_SESSION['category'])) {
			$category = $_SESSION['category'];
		}
		else {
			$category = '';
		}
		
		if (!isset($_GET['storepage'])) {
			$_SESSION['storepage'] = 0;
		}
		else {	
			$_SESSION['storepage'] = $_GET['storepage'];
		}

		if (!isset($_GET['storepage'])) {
			$pagecount = 0;
		}
		else {
			$pagecount = $_GET['storepage'];
		}


		if (floor(($numRows-1)/9) == ($numRows-1)/9) {
			$maxpage = floor(($numRows-1)/9)-1;
		}
		else {
			$maxpage = floor(($numRows-1)/9);
		}

		$id_array = [];
		$sql = "SELECT id FROM cart_products WHERE category LIKE '%$category%' AND name LIKE '%$search%' ORDER BY $direction";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($rows[] = mysqli_fetch_assoc($result));
			foreach($rows as $row) {
			    array_push($id_array, $row['id']);
			}
		} else {
			?> 
			<div>
				<p class="emptycart" style="margin-bottom: 50px;">There are no products matching your filter</p>
			</div>
			<?php
		}

		$counter = 0;
		while ($counter <= (count($id_array) - 1)) {
			if (floor($counter/9) == $pagecount) {
				$sql = "SELECT * FROM cart_products WHERE id = '$id_array[$counter]'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$name = $row['name'];
					$price = $row['price'];
					$text = $row['text'];
					$image = $row['image'];
					$value = $row['value'];
					$id = $row['id'];
					if (isset($_SESSION['Username'])) {
						$variable = $id;
					}
					else {
						$variable = $value;
					}
					?>
					<div class="storecube">
			   			<div class="storeinner">
							<h3><?php print($name)?> | <i>$<?php print($price)?></i>
								<div style="position: relative; left: 5.7vw;">
									<a href="editstore_actionpage.php?value=<?php print($id)?>" style="display: <?php 
										if (isset($_SESSION['Username']) AND $_SESSION['Username'] == 'admin') {
											print("block");
										}
										else {
											print("none");
										}
										?>;float: left;"><img src="Images/edit.png" width="20" alt="Edit">
									</a>
									<a href="deletestore_actionpage.php?value=<?php print($id)?>" style="display: <?php 
										if (isset($_SESSION['Username']) AND $_SESSION['Username'] == 'admin') {
											print("block");
										}
										else {
											print("none");
										}
										?>;float: left;"><img src="Images/delete.png" width="20" alt="Edit">
									</a>
								</div>
							</h3>
							
							<div class="IMAGEcontainer" style="margin-top: <?php 
								if (isset($_SESSION['Username']) AND $_SESSION['Username'] == 'admin') {
									print("26px");
								}
								else {
									print("0px");
								}
								?>
							">
							  <img src="Images/<?php print($image); ?>" width="100%">
							  <div class="overlay">
							    <div class="text"><?php print($text); ?></div>
							  </div>
							</div>
							<form action="store_actionpage.php" method="post">
								<button href="" onclick="">ADD TO CART</button>
								<input type="number" name="quantity" value="1" min="1" max="20">
								<input type="hidden" name="product" value="<?php print($variable)?>">
							</form>
						</div>
						<br>
					</div>
				   	
					<?php

				} 
			}

			$counter += 1;
		}

		?>

		<div class="modal" id="editID" style="display: <?=isset($_SESSION['storevalue']) ? 'block' : 'none'?>; height: 100vh" id="id03">
			<div class="product_edit">
				<?php
				$value_store = $_SESSION['storevalue'];
				$sql = "SELECT * FROM cart_products where id= '$value_store'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$name = $row["name"];
					$text = $row["text"];
					$image = $row["image"];
					$price = $row["price"];
					$category = $row["category"];
					$total_quantity = $row["total_quantity"];
				} else {
					echo "0 Results";
				}
				?>
				<form method="post" action="editstore_actionpage.php?value=<?php print($value_store)?>" enctype="multipart/form-data">
					<div class="product_edit_grid">
						<div style="grid-area: product_edit_header">
							<div style="padding-top: 0px;"><h2>Edit Product</h2></div>
							<!-- <a href="store.php?ready=1" style="width: 10%; float: right; padding-top: 5px;">X</a> -->
						</div>
						<div style="grid-area: product_edit_name">
							<input type="text" name="name" value="<?php print($name);?>" required>
						</div>
						<div style="grid-area: product_edit_text">
							<input type="text" name="text" value="<?php print($text);?>" required>
						</div>
						<div style="grid-area: product_edit_image">
							<input type="file" name="file" id="file" value="<?php print($image);?>">
						</div>
						<div style="grid-area: product_edit_price;">
							<input type="number" step="0.1" name="price" value="<?php print($price);?>" min="1" required>
						</div>
						<div style="grid-area: product_edit_category">
							<select name="category" style="margin-top: 8px;'">
								<option value="<?php print($category);?>"><?php print(ucfirst($category));?></option>
								<option value="bowl" style="display: <?=$category != 'bowl' ? 'block' : 'none'?>">Bowl</option>
								<option value="plate" style="display: <?=$category != 'plate' ? 'block' : 'none'?>">Plate</option>
								<option value="cup" style="display: <?=$category != 'cup' ? 'block' : 'none'?>">Cup</option>
							</select>
						</div>
						<div style="grid-area: product_edit_quantity;">
							<input type="text" name="total_quantity" value="<?php print($total_quantity);?>" required>
						</div>
						<p><div style="grid-area: product_edit_submit; text-align: center;">
							<button name="submit" value="" style="width: 29%;" type="submit">Submit</button>
						</div></p>
					</div>
				</form>
			</div>
		</div>
	<div style="display: 
		<?php 
		$array_length = count($id_array)-1;
		if ($_SESSION['storepage'] < $maxpage AND $array_length > 9) {
			print("block");
		}
		else {
			print("none");
		}
		?>
	">
		<form action="nextpage.php?page=<?php print($pagecount);?>" method="post">
			<button style="position:relative; left: 47%;" type="submit" class="page_button">NEXT PAGE</button>
			<input type="hidden" name="next" value="next"></input>
			<br>
		</form>
		<br>
	</div>
	<div style="display: 
	<?php

		if(!isset($_GET['storepage'])) {
			print("none");
		}
		else {
			print("block");
		}

	?>; width: 100%; float: left;">
		<form action="nextpage.php?page=<?php print($pagecount);?>" method="post">
			<button style="position:relative; left: 46%;" class="page_button">PREVIOUS PAGE</button>
			<input type="hidden" name="previous" value="previous"></input>
		</form>
		<br>
	</div>
<?php include('footer.php'); ?>

