<!-- INDEX PAGE -->
<!DOCTYPE html>
<html lang="en">

<?php 
	$title = "Register Yourself!";
	include_once("includes/header.php");//includes specified files only once.
	include_once("includes/db.php");
	include_once("admin/functions.php");
	
	if(isset($_POST['register'])){
		$username = $_POST['username'];
		$user_firstname = $_POST['firstname'];
		$user_lastname = $_POST['lastname'];
		$password = $_POST['password'];
		$emailid = $_POST['emailid'];
		
		
		//cleaning all inputs
		$username = mysqli_real_escape_string($connection, $username);
		$user_firstname = mysqli_real_escape_string($connection, $user_firstname);
		$user_lastname = mysqli_real_escape_string($connection, $user_lastname);
		$password = mysqli_real_escape_string($connection, $password);
		$emailid = mysqli_real_escape_string($connection, $emailid);
		
		$query = "SELECT * FROM users WHERE user_name='$username'";
		$check_user_query = mysqli_query($connection, $query);
		if($row = mysqli_fetch_assoc($check_user_query)){
			echo " UserName already Taken. Try something else";
		}else{
			$options = [
				'cost' => 10,
				'salt' => mcrypt_create_iv(22,MCRYPT_DEV_URANDOM),
			];//remove this if you are using php version 7 or more
		
			$hashedpass = password_hash($password,PASSWORD_BCRYPT,$options);
			
			$query = "INSERT INTO users(user_name, user_password, user_firstname, user_lastname, user_image, user_email, user_role) VALUES ('$username', '$hashedpass', '$user_firstname', '$user_lastname', '', '$emailid', 'subscriber')";
			
			$insert_user_query = mysqli_query($connection, $query);
			confirmQuery($insert_user_query);
			echo "User Registered Successfully!";
			
		}
		
		//echo $username . " " . $user_firstname . " " . $user_lastname . " " . $password . " " . $emailid;
	}
?>

<body>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

           <div class="col-md-6 col-md-offset-3">
           	<form action="" method="POST" role="form" id="registerUser">
			<legend>Register</legend>

			<div class="form-group">
				<label for="">First Name</label>
				<input type="text" class="form-control" id="firstname" placeholder="Please Provide Your First Name" name="firstname">
			</div>
			
			<div class="form-group">
				<label for="">Last Name</label>
				<input type="text" class="form-control" id="lastname" placeholder="Please Provide Your Last Name" name="lastname">
			</div>
			
			<div class="form-group">
				<label for="">Username</label>
				<input type="text" class="form-control" id="username" placeholder="Enter your Desired Username" name="username">
			</div>
			
			<div class="form-group">
				<label for="">Email</label>
				<input type="text" class="form-control" id="emailid" placeholder="someone@example.com" name="emailid">
			</div>
			
			<div class="form-group">
				<label for="user_image">User Image</label>
				<input type="file" class="form-control" name="image" id="user_image">
		</div>
		
			<div class="form-group">
				<label for="">Password</label>
				<input type="password" class="form-control" id="password" placeholder="Please Provide Some Strong Password" name="password">
			</div>
			<button name="register" type="submit" class="btn btn-primary btn-lg">Submit</button>
</form>

          </div>
		</div>

<?php
	include_once("includes/footer.php");
?>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
