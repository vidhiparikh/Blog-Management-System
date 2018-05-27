<!DOCTYPE html>
<html lang="en">
<?php
	ob_start();//should be the first line of any php script so that the buffer starts before executing the rest of the script.
?>
<?php 
	$page = "categories";
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
                        
<?php include_once("includes/category/add-category.php");?>
                        
<?php include_once("includes/category/edit-category.php");?>                         
                        
<?php include_once("includes/category/view-categories.php");?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
		  <!-- Modal -->
		  <form class="modal fade" id="confirmForDelete" data-backdrop="static">
			<div class="modal-dialog modal-md">

			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Delete.</h4>
				</div><!--END OF HEADER -->
				<div class="modal-body">
				 <h3><span class="fa fa-trash"></span> Are you sure you want to delete?<span class="cat_title"></span></h3>
				</div>
				<div class="modal-footer">
			  	  <a href='# ' class='btn btn-danger' id="btntodelete"> Delete <i class='fa fa-times'></i></a> 				
				  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> 
                </div><!-- END OF FOOTER -->
			  </div><!-- END OF MODAL-CONTENT-->
			</div><!-- END OF MODAL DIALOG -->
		</form><!--END OF FORM -->
       
         <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<script>
                
                $('#confirmForDelete').on('show.bs.modal',function(event){
                    var button = $(event.relatedTarget); // DOM method because this toh modal return karega to button ke liye we use related target
                    var cat_title = button.data('cat_title');
                    var cat_id = button.data('cat_id');
                    $(this).find('.cat_title').text('Category: ' + cat_title + ' ID: ' + cat_id);
                    var delete_href = "categories.php?delete="+cat_id;
                    $('#btntodelete').attr('href', delete_href);
                });
                
            </script>

</body>
</html>
