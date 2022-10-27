</head> <!-- End of Head tag -->
<body> <!-- Start of Body tag -->
	<?php
		include("LoginSignupPHP.php"); //Link to Footer Page
		include("setup.php"); //Link to setup page
		session_start();

		// Retriving navigtion infomation from the 'Pages' database
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

		if ($pagedecider != 3) {
			unset($_SESSION['storevalue']);
		}
	?>
	<div id="page_container"> <!-- Start of Page Container div -->
		<header style="
			<?php 
			if($pagedecider == 1) {
				print("background-image: url(Images/mainimage.png); height: 100vh;");
			}
			else if($pagedecider == 2) {
				print("background-image: url(Images/mainimage.png); height: 45px;");
			}
			else if($pagedecider == 3) {
				print("background-image: url(Images/mainimage.png); height: 25vw;");
			}
			?>
		"> <!-- Start of header div -->
			<div id="nav-container"> <!-- Wrapper -->
				<ul>
					<!-- HTML for the Navigation -->
					<input type="checkbox" id="myCheck" /><label for="myCheck">
						<div class="container1" onclick="myFunction(this)">
							<div class="bar1"></div>
							<div class="bar2"></div>
							<div class="bar3"></div>
						</div></label>
					<li style="float:left; position: relative; bottom: 27px;" class="left_nav"><a href="index.php">|PC|</a></li>
					<div class="navigation_box">
						<li class="topnav-centered3"><a href="contact.php"><?php print($navlink3);?></a></li>
						<li class="topnav-centered2"><a href="store.php"><?php print($navlink2);?></a></li>	
						<li class="topnav-centered1"><a href="about.php"><?php print($navlink1);?></a></li>
						<div style="float:right; position: relative; bottom: 27px;" class="dropdown">
							<button class="dropbtn navbutton">ACCOUNT</button>
						    <div class="dropdown-content" style="position: relative; width: 100%" id="myDropdown">
						    	<a href="cart.php">Cart</a>
						      	<div style="display: <?=isset($_SESSION['Username']) ? 'block' : 'none'?>">
							    	<?php 
							      	if (isset($_SESSION['Username']) AND $_SESSION['Username'] == 'admin') {
							      		?><a href="admin.php">Account</a><?php
							      	}
							      	else {
							      		?><a href="accounts.php">Account</a><?php
							      	}
							      	?>
							    </div>
						    	<a href="#" style="display: <?=!isset($_SESSION['Username']) ? 'block' : 'none'?>" onclick="signinFunction();">Sign In</a>
						    	<a href="index.php?signout=true" style="display: <?=!isset($_SESSION['Username']) ? 'none' : 'block'?>">Sign Out <?php print($_SESSION['Username']);?></a>
						    	<?php
								function runMyFunction() {
									session_destroy();	
								    header("Location: index.php");
								}

								if (isset($_GET['signout'])) {
									runMyFunction();
								}
								?>
						    </div>
						</div>
					</div>

						<div id="id01" class="modal" style="display: <?=$_SESSION['IsValid'] == "no" ? 'block' : 'none'?>">
							<form class="modal-content animate" action="loginaction_page.php" method="post">
							    <div class="container">
							    	<?php
						            if(isset($_SESSION['IsValid']) AND $_SESSION['IsValid'] == "no") {
						                echo "
						                    <div class='error'><p>
						                   Your login details are invalid.
						                    </p></div>
						                    ";
						                $_SESSION['IsValid'] = "yes";
						            }
							        ?>
							     	<label for="email"><b>Email</b></label>
							        <input type="text" placeholder="Enter Email" name="email" required>

							        <label for="psw"><b>Password</b></label>
							        <input type="password" placeholder="Enter Password" name="psw" required>
							        
							        <button class="navbutton" type="submit" name="submit" onclick="adminView()">Login</button>

							        <label><input type="checkbox" checked="checked" name="remember" style="display: block; float: right; margin-left: 10px; margin-top: 4px;"> Remember me:</label>
							        <span class="psw">Forgot <button type="button" onclick="document.getElementById('id01').style.display='none'; document.getElementById('id02').style.display='none'; document.getElementById('id03').style.display='block';" style="border: none; background-color: #F1F1F1; font-size: 15px; text-decoration: underline; color: blue;">password</button></span>
							    </div>

							    <div class="container" style="background-color:#f1f1f1">
							    	<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn navbutton">Cancel</button>
							    	<span class="psw1">Don't have one: <a href="#" onclick="signupFunction()">Signup</a></span>
							    </div>
							</form>
						</div>

						<div id="id03" class="modal" style="height: 100vh; display: <?=$_SESSION['IsValidEmail'] == "no" ? 'block' : 'none'?>">
							<form class="modal-content" action="forpswaction_page.php" method="post" style="position: relative; top: 80px;">
							    <div class="container">
							    	<?php
						            if(isset($_SESSION['IsValidEmail']) AND $_SESSION['IsValidEmail'] == "no") {
						                echo "
						                    <div class='error'><p>
						                   Your login details are invalid.
						                    </p></div>
						                    ";
						                $_SESSION['IsValid'] = "yes";
						            }
							        ?>
							    	<label for="email"><b>Forgot Password</b></label><br>
									<input type="text" name="email" placeholder="Enter Email" required>
									<button type="submit" class="navbutton" name="submit">Submit</button>
							    	<button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn navbutton">Cancel</button>
							    	<span class="psw1">Remember it: <a href="#" onclick="signinFunction()">Signin</a></span>
							    </div>
							</form>
						</div>

						<div id="id02" class="modal" style="display: <?=$HasErrors == "yes" ? 'block' : 'none'?>">
							<form class="modal-content" style="position: relative; bottom: 45px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post">
							    <div class="container">
							     	<label for="email"><b>Email</b></label>
							    	<?php
						            if($HasErrorsE == "yes") {
						                echo "
						                    <div class='error'><p>
						                    You email has to be valid.
						                    </p></div>
						                    ";
						                $HasErrors == "no";
						            }
						            if($HasDuplicatesE == "yes") {
						                echo "
						                    <div class='error'><p>
						                    That email has already been used
						                    </p></div>
						                    ";
						                $HasErrors == "no";
						            }
							        ?>
							        <input type="text" placeholder="Enter Email" name="email" required>

							        <label for="email"><b>Username</b></label>
							        <?php
						            if($HasErrorsU == "yes") {
						                echo "
						                    <div class='error'><p>
						                    Your username can only include letters and hyphens.
						                    </p></div>
						                    ";
						                $HasErrors == "no";
						            }
						            if($HasDuplicatesU == "yes") {
						                echo "
						                    <div class='error'><p>
						                    That username has already been used
						                    </p></div>
						                    ";
						                $HasErrors == "no";
						            }
							        ?>
							        <input type="text" placeholder="Enter Username" name="username" required>

							        <label for="psw"><b>Password</b></label>
							        <?php
						            if($HasErrorsPA == "yes") {
						                echo "
						                    <div class='error'><p>
						                    Your password and your password again are not the same
						                    </p></div>
						                    ";
						                $HasErrors == "no";
						            }
							        ?>
							        <input type="password" placeholder="Enter Password" name="psw" required>

			    				    <input type="password" placeholder="Enter Password Again" name="psw_again" required>
							        
							        <button class="navbutton" type="submit" name="submit">Signup</button>
							    </div>
							    <div class="container" style="background-color:#f1f1f1">
							      <span class="psw">Made one: <a href="#" onclick="signinFunction()">Sign In</a></span>
							      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn navbutton">Cancel</button>
							    </div>
							</form>
						</div>
				</ul>
			</div> <!-- Wrapper Div End -->
		</header> <!-- End of Header tag (START IN NAVIGATION) -->
<script>
	function myFunction(x) {
	  x.classList.toggle("change");
	}
</script>