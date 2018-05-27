<?php

function editCategory(){
	global $connection; //indicates variable connection is coming from somewhere else and is not local.
	if(isset($_POST['edit_submit'])){
		$input_cat_title = $_POST['cat_title'];
		$input_cat_id = $_GET['edit'];
		if($input_cat_title == "" || empty($input_cat_title)){
			echo "Please insert category title and then try!";
		}
		else{
			$query = "UPDATE categories SET cat_title = '$input_cat_title' WHERE cat_id = $input_cat_id";
			
			$update_cat_query = mysqli_query($connection,$query);
			
			if(!$update_cat_query){
				die('QUERY FAILED'.mysqli_error($connection));
			}
			header("Location: categories.php");//jo location pe jana hai uska name.
		}
		
	}
}


function addCategory(){
	global $connection;
	if(isset($_POST['submit'])){
		$input_cat_title = $_POST['cat_title'];
		if($input_cat_title == "" || empty($input_cat_title)){
			echo "Please insert category title and then try!";
		}
		else{
			$query = "INSERT INTO categories(cat_title) ";
			$query .="VALUE('$input_cat_title')";
			
			$add_cat_query = mysqli_query($connection,$query);
			
			if(!$add_cat_query){
				die('QUERY FAILED'.mysqli_error($connection));
			}
			header("Location: categories.php");//jo location pe jana hai uska name.
		}
		
	}
}

function fetchCategoryForEdit(){
	global $connection;
	//USED TO FETCH CATEGORY TITLE ACCORDING TO THE EDIT GET REQUEST
	if(isset($_GET['edit'])){
		$edit_cat_id=$_GET['edit'];
		$query = "SELECT * FROM categories WHERE cat_id = $edit_cat_id";
		$edit_category_title_query = mysqli_query($connection,$query);
		if($row = mysqli_fetch_assoc($edit_category_title_query)){
		   return $row['cat_title'];
		}
	}

}

function confirmQuery($result){
	global $connection;
	if(!$result){
		die("QUERY FAILED :" .mysqli_error($connection));
	}
}

function checkUser(){
	if(!isset($_SESSION['username'])){
		die("<p style='color:white'>You have not logged in, please login from <a href='../index.php'>here</a></p>");
	}else{
		$username = $_SESSION['username'];
		return $username;
}
}
if(isset($_GET['onlineusers'])){
	session_start();
	include_once("../includes/db.php");
	checkUserSession();
}

function checkUserSession(){
	//managing users online feature
	global $connection;
	
	$session = session_id();
	$user_id = $_SESSION['user_id'];
	$time_out_in_seconds = 40;//timeout duration of inactive user
	$time = time();//current time
	$time_out = $time - $time_out_in_seconds;
	$query ="SELECT * FROM user_online WHERE session = '$session'";
	$user_exists = mysqli_query($connection, $query);
	if(mysqli_num_rows($user_exists) == 0){
		$query = "INSERT INTO user_online(session, time, user_id) VALUES ('$session', '$time', $user_id)";
		$insert_query = mysqli_query($connection, $query);
	}/*else{
		//making provision to auto logout if no activity conducted
		$query = "UPDATE user_online SET time = '$time' WHERE session = '$session'";
		$update_query = mysqli_query($connection, $query);
	}*/
			
	$query = "SELECT * FROM user_online WHERE time > $time_out";
	$online_user_query = mysqli_query($connection, $query);
	$online_user_count = mysqli_num_rows($online_user_query);
	
	echo $online_user_count;
}
	function getToken($user_name){
		global $connection;
		$query="SELECT token from users where user_name='$user_name'";
		$token_value=mysqli_query($connection,$query);
		return $token_value;
	}
?>