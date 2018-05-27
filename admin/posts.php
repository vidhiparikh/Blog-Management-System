<!DOCTYPE html>
<html lang="en">
<?php
	ob_start();//should be the first line of any php script so that the buffer starts before executing the rest of the script.
?>
<?php 
	$page = "posts";
	include_once("includes/header.php");
	
	include_once("functions.php");
	
	
?>

<body>
	
    <div id="wrapper">

        <!-- Navigation -->
<?php
		include_once("includes/navigation.php");
?>
		<!-- End of Navigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To CPanel
                            <small><?php echo $username; ?></small>
                        </h1>
<?php
	$source = "";
	if(isset($_GET['source'])){
		$source = $_GET['source'];
	}
	switch($source){
		case 'add_post':
			include_once("includes/posts/add-post.php");
			break;
		case 'edit_post':
			include_once("includes/posts/edit-post.php");
			break;
		default:
			include_once("includes/posts/view-all-posts.php");
			break;
	}
?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
		  
         <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/bootstrapValidator.min.js"></script>
    
    <!-- Personal Script -->
    <script src="js/scripts.js"></script>
