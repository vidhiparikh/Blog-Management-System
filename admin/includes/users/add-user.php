<?php 
	if(isset($_POST['create_user'])){
		$user_firstname = $_POST['firstname'];
		$user_lastname = $_POST['lastname'];
		$user_role = $_POST['role'];
		$user_name = $_POST['username'];
		$user_email = $_POST['email'];
		$user_password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		$user_image = $_FILES['image']['name'];
		$user_image_temp = $_FILES['image']['tmp_name'];
		
		if($user_password === $confirm_password){
		move_uploaded_file($user_image_temp,"images/users/$user_image");
		
		$options = [
				'cost' => 10,
				'salt' => mcrypt_create_iv(22,MCRYPT_DEV_URANDOM),
			];//remove this if you are using php version 7 or more
		
			$db_hashed_password = password_hash($user_password,PASSWORD_BCRYPT,$options);
		 
		$query = "INSERT INTO users(user_firstname, user_lastname, user_role, user_email, user_name, user_password, user_image ) VALUES ('$user_firstname', '$user_lastname', '$user_role', '$user_email', '$user_name', '$db_hashed_password', '$user_image')";
        if($user_firstname && $user_email){
        	$create_user_query = mysqli_query($connection, $query);
			confirmQuery($create_user_query);
			header("Location: users.php");
		}/*else{
			echo "No blank entries please!";
		}*/
	}/*else{
		echo "Password and confirm password don't match";
	}
*/}
?>
<form action="" method="POST" enctype="multipart/form-data" id="addUser"><!--to let the protocol know ki file mai data ko chhodke aur bhi kuch hoga.-->
	<div class="form-group">
		<label for="user_firstname">First Name</label>
		<input type="text" class="form-control" name="firstname" id="user_firstname">
	</div>
	
	<div class="form-group">
		<label for="user_lastname">Last Name</label>
		<input class="form-control" name="lastname" id="user_lastname">
	</div>
	
	<div class="form-group">
		<label for="user_email">Email</label>
		<input class="form-control" name="email" id="user_email">
	</div>
	
	<div class="form-group">
		<label for="user_role">User Role</label>
		<select class="form-control" name="role" id="user_role">
			<option value="admin" "selected">Admin</option>
			<option value="published">Subscriber</option>
		</select>

	</div>

	<div class="form-group">
		<label for="user_name">UserName</label>
		<input type="text" class="form-control" name="username" id="user_name">
	</div>
	
	<div class="form-group">
		<label for="user_password">User Password</label>
		<input type="password" class="form-control" name="password" id="user_password">
	</div>

	
	<div class="form-group">
		<label for="confirm_password">Confirm Password</label>
		<input type="password" name="confirm_password" id="confirm_password" class="form-control">
	</div>
	
	<div class="form-group">
		<label for="user_image">User Image</label>
		<input type="file" class="form-control" name="image" id="user_image">
	</div>
	
		
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_user" value="Create User">
	</div>
</form>