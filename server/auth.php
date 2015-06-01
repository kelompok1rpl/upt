<?php
	session_start();
	// print_r($_SESSION);
	if(isset($_SESSION['username'])){
		echo "true";
	}else{
		echo "false";
	}
?>
