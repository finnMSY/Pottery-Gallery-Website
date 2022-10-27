<?php
	session_start();
	$next = $_POST['previous'];
	
	if ($next == "previous") {
		$pagecount = $_GET['page'] - 1;
		header("Location: store.php?storepage=" . $pagecount);
	}

?>