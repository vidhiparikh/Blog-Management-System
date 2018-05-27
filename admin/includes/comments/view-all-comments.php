<!-- VIEW ALL POSTS SECTION -->
                   		<div class="col-xs-12">
                        	<table class="table table-bordered table-hover">
                        		<tr>
                        			<th>ID</th>
                        			<th>Author</th>
                        			<th>Comment</th>
                        			<th>Email ID</th>
                        			<th>Status</th>
                        			<th>In Response To</th>
                        			<th>Date</th>
                        			<th>Approve</th>
                        			<th>Unapprove</th>
                        			<th>Delete</th>
                        			
                        		</tr>
                        		<tbody>
<?php
	$user_role = $_SESSION['user_role'];
	if($user_role == "admin"){								
	$query = "SELECT * FROM comments";
	}else{
		$user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM comments where comment_post_id in (select posts.post_id from posts where post_author = $user_id)";
	}
	$select_all_comments_query = mysqli_query($connection, $query);//send this query to this connection.
	while($row = mysqli_fetch_assoc($select_all_comments_query)){
		$comment_id = $row['comment_id'];
		$comment_post_id = $row['comment_post_id'];
		$comment_author = $row['comment_author'];
		$comment_email = $row['comment_email'];
		$comment_content = $row['comment_content'];
		$comment_status = $row['comment_status'];
		$comment_date = $row['comment_date'];
		
		echo "<tr>";
		echo "<td>$comment_id</td>";
		echo "<td>$comment_author</td>";
		echo "<td>$comment_content</td>";
		echo "<td>$comment_email</td>";
		echo "<td>$comment_status</td>";
		
		
		
			$query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
			$select_comment_post_query = mysqli_query($connection, $query);
			confirmQuery($select_comment_post_query);
			if($row = mysqli_fetch_assoc($select_comment_post_query)){
				$comment_post_title = $row['post_title'];
			}
				echo "<td><a href = '../post.php?p_id=$comment_post_id'>$comment_post_title</a></td>";
		
		
		echo "<td>$comment_date</td>";
		echo "<td><a class='btn btn-success' href='comments.php?approve=$comment_id'> Approve <span class='fa fa-check'></span></td>";
		echo "<td><a class='btn btn-warning' href='comments.php?unapprove=$comment_id'> Unapprove <span class='fa fa-times'></span></td>";
		echo "<td><a class='btn btn-danger' href='comments.php?delete=$comment_id'> Delete <span class='fa fa-trash'></span></td>";
		echo "</tr>";
	}
?>
								</tbody>
							</table>
<?php
	if(isset($_GET['delete'])){
		$delete_comment_id = $_GET['delete'];
		$query = "UPDATE posts SET post_comment_count = post_comment_count-1 WHERE post_id = (SELECT comment_post_id FROM comments WHERE comment_id = $delete_comment_id)";
		$update_comment_count_query = mysqli_query($connection, $query);
		confirmQuery($update_comment_count_query);
		$query = "DELETE FROM comments WHERE comment_id = {$delete_comment_id}";
		$delete_query = mysqli_query($connection,$query);
		
		confirmQuery($delete_query);
		header("Location: comments.php");
	}
							
	if(isset($_GET['approve'])){
		$approve_comment_id = $_GET['approve'];
		$query = "UPDATE comments SET comment_status='approved' WHERE comment_id = {$approve_comment_id}";
		$approve_query = mysqli_query($connection,$query);
		
		confirmQuery($approve_query);
		header("Location: comments.php");
	}
							
	if(isset($_GET['unapprove'])){
		$unapprove_comment_id = $_GET['unapprove'];
		$query = "UPDATE comments SET comment_status='unapproved' WHERE comment_id = {$unapprove_comment_id}";
		$unapprove_query = mysqli_query($connection,$query);
		
		confirmQuery($unapprove_query);
		header("Location: comments.php");
	}
?>
						</div>
                    <!-- END OF VIEW ALL POSTS SECTION -->