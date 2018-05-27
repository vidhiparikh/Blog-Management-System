<!--SEARCH PAGE-->
<!DOCTYPE html>
<html lang="en">

<?php 
	$title = "Vidhi's Blog | Search";
	include_once("includes/header.php");//includes specified files only once.
	include_once("includes/db.php");
?>

<body>
	<!-- NAVIGATION START -->
<?php
	include_once("includes/navigation.php");
?>
    <!--NAVIGATION END -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Search Results
                </h1>

               
<?php 

if(isset($_POST['submit'])){	
	$search = $_POST['search'];
	$query = "SELECT * FROM posts WHERE post_tags like '%$search%' AND post_status ='published'";//like because kahi bhi post_tag ke andar wo tag aaye to automatically dhundhle whereas '=' exactly match karega.
	$search_query = mysqli_query($connection, $query);
	if(!$search_query)//agar null aya to false.isliye we write if not null.
	{
		//there was some error in processing the query
		die("QUERY FAILED :".mysqli_error($connection));//die is basically a return function
	}
	$count = mysqli_num_rows($search_query);//returns the number of rows after the search_query was executed.
	if($count == 0){
		echo "<h2> NO RESULTS FOUND! </h2>"; 
	}
	else{
		echo "SOME RELATED RESULTS!";
		while($row = mysqli_fetch_assoc($search_query)){

				$post_title = $row['post_title'];
				$post_author = $row['post_author'];
				$post_date = $row['post_date'];
				$post_image = $row['post_image'];
				$post_content = $row['post_content'];
?>
                <!-- Start Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
				</h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="<?php echo $post_title; ?>">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <!--End of Blog Post-->
<?php 
				}//end of while loop which loads all posts
			}//end of else
	}//end of isset
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
