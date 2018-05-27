<?php 
	
?>
                        <!-- AVAILABLE OR EXISTING CATEGORIES IN THE DB -->
                        <div class="col-xs-12">
                        	<table class="table table-bordered table-hover">
                        		<tr>
                        			<th>ID</th>
                        			<th>Category Title</th>
                        			<th></th>
                        			<th></th>
                        		</tr>
                        		<tbody>
<?php
	$query = "SELECT * FROM categories";
	$select_all_categories_query = mysqli_query($connection, $query);//send this query to this connection.
	while($row = mysqli_fetch_assoc($select_all_categories_query)){
		
		echo "<tr>";
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		echo "<td>$cat_id</td>";
		echo "<td>$cat_title</td>";
		echo "<td><button type='button' class='btn btn-danger' data-target='#confirmForDelete' data-toggle='modal' data-cat_title = '$cat_title' data-cat_id = '$cat_id'>  Delete <span class='fa fa-times'></span> </button></td>";
		echo "<td><a class='btn btn-primary' href='categories.php?edit=$cat_id'>Edit <span class='fa fa-pencil'></a></td>";
		echo "</tr>";
	}
	if(isset($_GET['delete'])){
		
		$delete_id = $_GET['delete'];
			echo $delete_id;
		$query="DELETE FROM categories WHERE cat_id=$delete_id";
		$delete_query= mysqli_Query($connection, $query);
		header("Location: categories.php");
	
	}
                                                        		
?>
	  							</tbody>
                        	</table>
                        </div>