<!-- VIEW ALL POSTS SECTION -->
                   		<div class="col-xs-12">
                        	<table class="table table-bordered table-hover">
                        		<tr>
                        			<th>ID</th>
                        			<th>Username</th>
                        			<th>FirstName</th>
                        			<th>LastName</th>
                        			<th>Email ID</th>
                        			<th>Role</th>
                        			<th>Image</th>
                        			<th>Make Admin</th>
                        			<th>Make Subscriber</th>
                        			<th>Edit</th>
                        			<th>Delete</th>
                        			
                        		</tr>
                        		<tbody>
<?php
	$query = "SELECT * FROM users";
	$select_all_users_query = mysqli_query($connection, $query);//send this query to this connection.
	while($row = mysqli_fetch_assoc($select_all_users_query)){
		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_firstname = $row['user_firstname'];
		$user_lastname = $row['user_lastname'];
		$user_email = $row['user_email'];
		$user_role = $row['user_role'];
		$user_image = $row['user_image'];
		
		echo "<tr>";
		echo "<td>$user_id</td>";
		echo "<td>$user_name</td>";
		echo "<td>$user_firstname</td>";
		echo "<td>$user_lastname</td>";
		echo "<td>$user_email</td>";
		echo "<td>$user_role</td>";
		echo "<td><img src='images/users/$user_image' class='img-rounded img-responsive' width='50px'></td>";
			
		echo "<td><a class='btn btn-success' href='users.php?make_admin=$user_id'> Make Admin <span class='fa fa-users'></span></td>";
		echo "<td><a class='btn btn-warning' href='users.php?make_subscriber=$user_id'> Make Subscriber <span class='fa fa-user'></span></td>";
		echo "<td><a class='btn btn-info' href='users.php?source=edit_user&edit_user=$user_id'><span class='fa fa-pencil'></span></td>";
		echo "<td><a class='btn btn-danger' href='users.php?delete=$user_id'><span class='fa fa-trash'></span></td>";
		echo "</tr>";
	}
?>
								</tbody>
							</table>
<?php
	if(isset($_GET['delete'])){
		$delete_user_id = $_GET['delete'];
		
		$query = "DELETE FROM users WHERE user_id = {$delete_user_id}";
		$delete_query = mysqli_query($connection,$query);
		
		confirmQuery($delete_query);
		header("Location: users.php");
	}
							
	if(isset($_GET['make_admin'])){
		$make_admin_id = $_GET['make_admin'];
		$query = "UPDATE users SET user_role='admin' WHERE user_id = {$make_admin_id}";
		$admin_query = mysqli_query($connection,$query);
		
		confirmQuery($admin_query);
		header("Location: users.php");
	}
							
	if(isset($_GET['make_subscriber'])){
		$make_subscriber_id = $_GET['make_subscriber'];
		$query = "UPDATE users SET user_role='subscriber' WHERE user_id = {$make_subscriber_id}";
		$subscriber_query = mysqli_query($connection,$query);
		
		confirmQuery($subscriber_query);
		header("Location: users.php");
	}
?>
						</div>
                    <!-- END OF VIEW ALL POSTS SECTION -->