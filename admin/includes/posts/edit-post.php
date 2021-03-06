	<?php 
	if(isset($_POST['edit_post'])){
		if(isset($_GET['p_id'])){
			
		$post_id = $_GET['p_id'];	
			
		$post_title = $_POST['title'];
		$post_category_id = $_POST['post_category_id'];
		$post_status = $_POST['status'];
		if($post_status == "" || !isset($post_status)){
			$post_status = "draft";
		}
		/********************** SPECIAL COMMENT ***************
		Every image has two names ek original aur ek temp name which will be used by http to upload the file
		******************************************************/
		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];
		
		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		
		move_uploaded_file($post_image_temp,"../images/$post_image");//this moves the uploaded file with its permanent name to the specified location
		
		if(empty($post_image)){
			$query = "SELECT * FROM posts WHERE post_id = $post_id";
			$select_image_query = mysqli_query($connection, $query);
			if($row = mysqli_fetch_assoc($select_image_query)){
				$post_image = $row['post_image'];
			}
		}
			
		$query = "UPDATE posts SET ";
		$query.="post_title = '$post_title', ";
		$query.="post_category_id = '$post_category_id', ";
		$query.="post_image = '$post_image', ";
		$query.="post_content = '$post_content', ";
		$query.="post_tags = '$post_tags', ";
		$query.="post_status = '$post_status' ";
		$query.="WHERE post_id = $post_id";
        
        $update_post_query = mysqli_query($connection, $query);
        
       confirmQuery($update_post_query);
		header("Location: posts.php");
	}
}
?>

<?php 
	if(isset($_GET['p_id'])){
		$edit_post_id = $_GET['p_id'];
		$query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
		$edit_post_query = mysqli_query($connection,$query);
		if($row = mysqli_fetch_assoc($edit_post_query)){
			$post_category_id = $row['post_category_id'];
			$post_title = $row['post_title'];
			$post_author = $row['post_author'];
			$post_status = $row['post_status'];
			$post_image = $row['post_image'];
			$post_tags = $row['post_tags'];
			$post_content = $row['post_content'];
		}
	}
?>


<form action="" method="POST" enctype="multipart/form-data" id="editPost"><!--to let the protocol know ki file mai data ko chhodke aur bhi kuch hoga.-->
	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title" id="post_title">
	</div>
	
	<div class="form-group">
		<label for="post_category">Post Category</label>
		<select class="form-control" name="post_category_id" id="post_category">
		
<?php
	$query = "SELECT * FROM categories";
	$select_all_categories_query = mysqli_query($connection, $query);//send this query to this connection.
	confirmQuery($select_all_categories_query);
	while($row = mysqli_fetch_assoc($select_all_categories_query)){
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		if($post_category_id == $cat_id){
			echo $cat_id;
			echo "<option value='$cat_id' selected>$cat_title</option>";
		}
		else
			echo "<option value='$cat_id'>$cat_title</option>";
	}
		
?>
		</select>
	</div>
	
	
	
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<select name="status" id="post_status" class="form-control">
		<?php
			/*if($post_status=="draft"){
				echo "<option value='draft' selected>Draft</option>";
			}else{
				echo "<option value='published'>Published</option>";
			}*/
		?>
			<option value="draft" <?php if($post_status=="draft") echo "selected"; ?>>Draft</option>
			<option value="published" <?php if($post_status=="published") echo "selected"; ?>>Published</option>
		</select>
	</div>
	
	
	
	<div class="form-group">
		<label>Current Image</label>
		<img src= "../images/<?php echo $post_image; ?>" width="500px" class="img-responsive" alt="">
	</div>
	
	<div class="form-group">
	<label for="post_image">Post Image</label>
	<input class="form-control" type="file" name="image" id="post_image">
		
		<!--<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="image" id="post_image">-->
	</div>
	
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags" id="post_tags">
	</div>
	
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="post_content" rows="10" cols="30"><?php echo $post_content; ?></textarea>
	</div>
	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit_post" value="Edit Post">
	</div>
</form>