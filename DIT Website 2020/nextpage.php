<?php
	session_start();

	$next = $_POST['next'];
	$previous = $_POST['previous'];
	
	if ($next == "next") {
		$pagecount = $_GET['page'] + 1;
	}
	elseif ($previous == "previous") {
		$pagecount = $_GET['page'] - 1;
	}

	if (!isset($_GET['page'])) {
		$pagecount = 1;
	}

	if ($pagecount == 0) {
		header("Location: store.php");
	}
	else {
		header("Location: store.php?storepage=" . $pagecount);
	}

?>