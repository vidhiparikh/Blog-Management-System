<!DOCTYPE html>
<html lang="en">

<?php 
	$page = "dashboard";
	include_once("includes/header.php");
	
	
	$time_out = time() - 40;
	$session = session_id();
	$query = "SELECT * FROM user_online WHERE time > $time_out and session = '$session'";
	$check_active_session = mysqli_query($connection, $query);
	if(mysqli_num_rows($check_active_session) == 0){
		mysqli_query($connection,"DELETE FROM user_online where session = '$session'");
		include_once("../includes/logout.php");
	}
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
                    </div>
                </div>
                <!-- /.row -->
<?php include_once('includes/dashboard.php'); ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/scripts.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
