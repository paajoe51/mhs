<?php
	//Start session


	require('connect.php');
	session_start();
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;

	
	//Sanitize the POST values

	$login = ($_POST['username']);
	$password = ($_POST['password']);
	
	
	if(empty($login) || empty($password)){
        $message = 'All field are required';//echo $message;
	}
	 
   else{
		//Create query
		$qry="SELECT * FROM user WHERE username='$login' AND password='$password'";
		$result=($qry);
        $qry = $db->prepare("SELECT * From user WHERE username =? AND password=?");

		 $qry-> execute(array($login,$password));
		 $row = $qry->fetch(PDO::FETCH_ASSOC);
		 //$row = $qry->fetch(PDO:: FETCH_BOTH);
		 $member = ($result);
           //echo  $login."  ".$password;
	
			if($qry ->rowCount() >0){
				//$state=$qry->prepare("SELECT * FROM user WHERE username=? AND password=?");
					$qry->execute(array($login,$password));
					$position=$qry->fetchAll();
				foreach ($position as $account){
					$account_type=$account["position"] AND $department=$account["department"];
				}
				session_regenerate_id();
					$_SESSION['username'] = $login;
					$_SESSION['SESS_MEMBER_ID'] =  $row['id'];
					$_SESSION['SESS_FULL_NAME'] = $row['name']; 
					$_SESSION['SESS_POSITION'] =   $account_type;
					$_SESSION['SESS_DEPARTMENT']=  $department;
				
				session_write_close();
	/* echo $row['name'];
	 echo $row['id'];
	 $row['department'];*/
				
						header("location: main/index.php");
						exit(); 
					
				
					
			}
			else{
					$message ="password is wrong";
					$_SESSION['message'] = $message;
					echo('$message');
				die("Query failed");
					header('location:index.php');
			}

     }
?>