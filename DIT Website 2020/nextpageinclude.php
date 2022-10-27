<?php
$value_counter = 10;
while ($value_counter <= $anothernumRows) {
	$sql = "SELECT * FROM cart_products WHERE value='$value_counter'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// Output the data of each row
	    $row = $result->fetch_assoc(); 
	   	$value = $row["value"];
	   	$name = $row["name"];
	   	$text = $row["text"];
	   	$image = $row["image"];
	   	$price = $row["price"];

	   	?>	
		   	<div class="storecube">
	   			<div class="storeinner">
					<h3><?php print($name)?> | <i>$<?php print($price)?></i></h3>
					<div class="IMAGEcontainer">
					  <img src="Images/<?php print($image); ?>" width="100%" height="150">
					  <div class="overlay">
					    <div class="text"><?php print($text); ?></div>
					  </div>
					</div>
					<form action="store_actionpage.php" method="post">
						<button href="" onclick="">ADD TO CART</button>
						<input type="number" name="quantity" value="1" min="1" max="20">
						<input type="hidden" name="product" value="<?php print($value)?>">
					</form>
				</div>
				<br>
			</div>
			<?php

		}
	$value_counter = $value_counter + 1;
}
?>