<?php
	if(isset($_POST['checkBoxArray'])){
		$bulk_options = $_POST['bulk_options'];
		foreach($_POST['checkBoxArray'] as $postValueId){
			switch($bulk_options){
				case 'published':
				case 'draft':
					$query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = $postValueId";
					$update_to_publish = mysqli_query($connection, $query);
					header("Location: posts.php");
					break;
				case 'delete':
					$query ="DELETE FROM posts WHERE post_id=$postValueId";
					$delte_posts = mysqli_query($connection, $query);
					header("Location: posts.php");
					break;
			}
		}
	}
?>                  		

                  		<!-- VIEW ALL POSTS SECTION -->
                   		<div class="col-xs-12">
                       	<form action="" method="post">
                        	<table class="table table-bordered table-hover">
                        	<div class="col-xs-4" id="bulkOptionsContainer">
                        		<select class="form-control" name="bulk_options" id="">
                        			<option value="">Select Options</option>
                        			<option value="published">Publish</option>
                        			<option value="draft">Draft</option>
                        			<option value="delete">Delete</option>
                        		</select>
                        	</div>
                        	<div class="col-xs-4">
                        		<input type="submit" name="submit_bulk_option" class="btn btn-primary" value="Apply">
                        		<a class="btn btn-warning" href="posts.php?source=add_post">Add New</a>
                        	</div>
                        		<tr>
                        			<th><input type="checkbox" class="form-control" id="selectAllBoxes"></th>
                        			<th>ID</th>
                        			<th>Author</th>
                        			<th>Title</th>
                        			<th>Category</th>
                        			<th>Status</th>
                        			<th>Image</th>
                        			<th>Tags</th>
                        			<th>Comments</th>
                        			<th>Date</th>
                        			<th>Delete</th>
                        			<th>Edit</th>
                        		</tr>
                        		<tbody>
<?php
	$user_role = $_SESSION['user_role'];
	if($user_role == "admin"){
		$query = "SELECT * FROM posts,users where posts.post_author = users.user_id ORDER BY posts.post_date DESC";
	}else{
		$user_id = $_SESSION['user_id'];
		$query = "SELECT * from posts,users where posts.post_author = users.user_id and posts.post_author = $user_id ORDER BY posts.post_date DESC";
	}
	$select_all_posts_query = mysqli_query($connection, $query);//send this query to this connection.
	while($row = mysqli_fetch_assoc($select_all_posts_query)){
		$post_id = $row['post_id'];
		$post_author = $row['user_firstname']." ".$row['user_lastname'];
		$post_title = $row['post_title'];
		$post_category_id = $row['post_category_id'];
		$post_status = $row['post_status'];
		$post_image = $row['post_image'];
		$post_tags = $row['post_tags'];
		$post_comment_count = $row['post_comment_count'];
		$post_date = $row['post_date'];
		
		echo "<tr>";
		echo "<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='$post_id'></td>";
		echo "<td>$post_id</td>";
		echo "<td>$post_author</td>";
		echo "<td>$post_title</td>";
		
		
			$query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
			$select_all_categories_query = mysqli_query($connection, $query);
			confirmQuery($select_all_categories_query);
			if($row = mysqli_fetch_assoc($select_all_categories_query)){
				$post_category_title = $row['cat_title'];
			}
				echo "<td>$post_category_title</td>";
		
		
		echo "<td>$post_status</td>";
		echo "<td><img class='img-responsive' src ='../images/$post_image' height='150px' alt='post image'></td>";
		echo "<td>$post_tags</td>";
		echo "<td>$post_comment_count</td>";
		echo "<td>$post_date</td>";
		echo "<td><a class='btn btn-danger' href='posts.php?delete=$post_id'> Delete <span class='fa fa-times'></span></td>";
		echo "<td><a class='btn btn-primary' href='posts.php?source=edit_post&p_id=$post_id'>Edit <span class='fa fa-pencil'></a></td>";
		echo "</tr>";
	}
?>
								</tbody>
							</table>
							</form>
<?php
	if(isset($_GET['delete'])){
		$delete_post_id = $_GET['delete'];
		$query = "DELETE FROM posts WHERE post_id = {$delete_post_id}";
		$delete_query = mysqli_query($connection,$query);
		
		confirmQuery($delete_query);
		header("Location: posts.php");
	}
?>
						</div>
                    <!-- END OF VIEW ALL POSTS SECTION -->