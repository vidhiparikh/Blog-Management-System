<!-- INDEX PAGE -->
<!DOCTYPE html>
<html lang="en">

<?php 
	$title = "Vidhi's Blog! |Category";
	include_once("includes/header.php");//includes specified files only once.
	include_once("includes/db.php");
?>

<body>
	
<?php
	include_once("includes/navigation.php");
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Vidhi's Blog
                    <small>Welcome Here</small>
                </h1>

               
<?php 
			if(isset($_GET['c_id'])){
				$cat_id = $_GET['c_id'];
				$query = "SELECT * FROM posts, users WHERE posts.post_author = users.user_id and post_category_id = $cat_id and post_status='published'";
				$select_all_posts_query = mysqli_query($connection, $query);//send this query to this connection.
				while($row = mysqli_fetch_assoc($select_all_posts_query)){

					$post_id = $row['post_id'];


					$post_title = $row['post_title'];
					$post_author = $row['user_firstname']." ".$row['user_lastname'];
					$post_date = $row['post_date'];
					$post_image = $row['post_image'];
					$post_content = substr($row['post_content'],0,200)."...";

?>
               
                <!-- Start Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <!--End of Blog Post-->
<?php
				}//end of while loop which loads all posts
			}//end of if
?>
            </div>
            
			<!--Blog Sidebar Widgets Column -->
<?php
	include_once("includes/sidebar.php");
?>

        </div>
        <!-- /.row -->

        <hr>

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
