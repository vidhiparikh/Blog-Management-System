<?php 
	if(isset($_POST['create_post'])){
		$post_title = $_POST['title'];
		$post_author = $_SESSION['user_id'];
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
		
		$post_tag = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		//$post_date = date('d-m-y');
		$post_comment_count = 0;
		
		move_uploaded_file($post_image_temp,"../images/$post_image");//this moves the uploaded file with its permanent name to the specified location
		
		$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES ($post_category_id,'$post_title','$post_author', now(), '$post_image', '$post_content', '$post_tag','$post_comment_count','$post_status')";
        
        $create_post_query = mysqli_query($connection, $query);
        
       confirmQuery($create_post_query);
	}
?>
<form action="" method="POST" enctype="multipart/form-data" id="addPost"><!--to let the protocol know ki file mai data ko chhodke aur bhi kuch hoga.-->
	<div class="form-group">
		<label for="post_title">Post Title</label>
		<input type="text" class="form-control" name="title" id="post_title">
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
			<option value="draft" "selected">Draft</option>
			<option value="published">Published</option>
		</select>
	</div>
	
	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="image" id="post_image">
	</div>
	
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags" id="post_tags">
	</div>
	
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="post_content" rows="10" cols="30"></textarea>
	</div>
	
	<!-- messages is where the messages are placed inside -->
	<div class="form-group">
		<div class="col-md-9 col-md-offset-3">
			<div id="messages"></div>
		</div>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-primary" id="preview" name="preview_post">Preview <i class="fa fa-eye"></i></button>
	</div>
	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
	</div>
</form>


