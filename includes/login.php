<?php
	include("db.php");
	include("../admin/functions.php");
	session_start();
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		
		/*****************************This prevents SQL injection **********************************/
		$password = mysqli_real_escape_string($connection, $password);
		$username = mysqli_real_escape_string($connection, $username);
		
		$token=getToken($username);
		//if($token===" "){
			//echo "your token is set";
			//header("Location: ../index.php");
		
		/* SELECT * FROM users WHERE username = '$username' and user_password = '$user_password' or 1=1 #'; */
		$query = "SELECT * FROM users WHERE user_name = '$username'";
		$select_user_details = mysqli_query($connection, $query);
		confirmQuery($select_user_details);
		if($num = mysqli_num_rows($select_user_details) > 1){
			header("Location: ../index.php");
		}
		if($row = mysqli_fetch_assoc($select_user_details)){
			$user_id = $row['user_id'];
			$db_username = $row['user_name'];
			$db_hashed_password = $row['user_password'];
			$db_role = $row['user_role'];
			
		}else
		{
			$db_password = "";
		}
		if(password_verify($password, $db_hashed_password) && $username === $db_username){
			$_SESSION['username'] = $db_username;
			$_SESSION['user_role'] = $db_role;
			$_SESSION['user_id'] = $user_id;
			header("Location: ../admin/");
		}else{
			header("Location: ../index.php");
			
		}
	}
	//else{
		//echo "token set";
	//}
//}

/************************************************************************************************************************************************************************* abc' or 1=1 # '****************************************************************************************************************************/
?>
