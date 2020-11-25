<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')) {
		if($_SESSION['SESS_DEPARTMENT']=='ikod_stationary'){
			header("location: ../main/index.php");
			exit();
		}
		else{
			header("location: ../ikodpress/index.php");
			exit();
		}
	}
?>