	<?php 
	if(isset($_POST['edit_user'])){
		if(isset($_GET['edit_user'])){
			
		$user_id = $_GET['edit_user'];	
		$user_firstname = $_POST['firstname'];
		$user_lastname = $_POST['lastname'];
		$user_role = $_POST['role'];
		$user_name = $_POST['username'];
		$user_email = $_POST['email'];
		$user_password = $_POST['password'];
		$user_role = $_POST['role'];
		if($user_role == "" || !isset($user_role)){
			$user_role = "subscriber";
		}
		$confirm_password = $_POST['confirm_password'];
		$user_image = $_FILES['image']['name'];
		$user_image_temp = $_FILES['image']['tmp_name'];
		if($user_password == $confirm_password){
		
		if(empty($user_image)){
			$query = "SELECT * FROM users WHERE user_id = $user_id";
			$select_image_query = mysqli_query($connection, $query);
			if($row = mysqli_fetch_assoc($select_image_query)){
				$user_image = $row['user_image'];
			}else{
				move_uploaded_file($user_image_temp,"images/users/$user_image");//this moves the uploaded file with its permanent name to the specified location
			}
		}
		
		$options = [
				'cost' => 10,
				'salt' => mcrypt_create_iv(22,MCRYPT_DEV_URANDOM),
			];//remove this if you are using php version 7 or more
		
		$db_hashed_password = password_hash($user_password,PASSWORD_BCRYPT,$options);
			
		$query = "UPDATE users SET ";
		$query.="user_firstname = '$user_firstname', ";
		$query.="user_lastname = '$user_lastname', ";
		$query.="user_role = '$user_role', ";
		$query.="user_name = '$user_name', ";
		$query.="user_image = '$user_image', ";
		$query.="user_email = '$user_email', ";
		$query.="user_password = '$db_hashed_password' ";
		$query.="WHERE user_id = $user_id";
        
        $update_user_query = mysqli_query($connection, $query);
        
       confirmQuery($update_user_query);
		header("Location: users.php");
}else{
		echo "passwords dont match";
	}
}
	}
?>

<?php 
	if(isset($_GET['edit_user'])){
		$edit_user_id = $_GET['edit_user'];
		$query = "SELECT * FROM users WHERE user_id = $edit_user_id";
		$edit_user_query = mysqli_query($connection,$query);
		if($row = mysqli_fetch_assoc($edit_user_query)){
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_firstname = $row['user_firstname'];
		$user_lastname = $row['user_lastname'];
		$user_email = $row['user_email'];
		$user_password = $row['user_password'];
		$user_role = $row['user_role'];
		$user_image = $row['user_image'];
		}
	}
?>


<form action="" method="POST" enctype="multipart/form-data" id="editUser"><!--to let the protocol know ki file mai data ko chhodke aur bhi kuch hoga.-->
	<div class="form-group">
		<label for="user_firstname">First Name</label>
		<input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="firstname" id="user_firstname">
	</div>
	
	<div class="form-group">
		<label for="user_lastname">Last Name</label>
		<input value="<?php echo $user_lastname; ?>" class="form-control" name="lastname" id="user_lastname">
	</div>
	
	<div class="form-group">
		<label for="user_email">Email</label>
		<input value="<?php echo $user_email; ?>" class="form-control" name="email" id="user_email">
	</div>
	
	<div class="form-group">
		<label for="user_role">User Role</label>
		<select class="form-control" name="role" id="user_role">
			<option value="admin" <?php if($user_role=="admin") echo "selected"; ?>>Admin</option>
			<option value="subscriber" <?php if($user_role=="subscriber") echo "selected"; ?>>Subscriber</option>
		</select>
		
	</div>

	<div class="form-group">
		<label for="user_name">UserName</label>
		<input value="<?php echo $user_name; ?>" type="text" class="form-control" name="username" id="user_name">
	</div>
	
	<div class="form-group">
		<label for="user_password">User Password</label>
		<input type="password" class="form-control" name="password" id="user_password">
	</div>
	
	<div class="form-group">
		<label for="confirm_password">Confirm Password</label>
		<input type="password" class="form-control" name="confirm_password" id="confirm_password">
	</div>

	<div class="form-group">
		<label>Current Image</label>
		<img src= "images/users/<?php echo $user_image; ?>" width="500px" class="img-responsive" alt="">
	</div>
	
	<div class="form-group">
		<label for="user_image">User Image</label>
		<input type="file" class="form-control" name="image" id="user_image">
	</div>
	
		
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
	</div>
</form>