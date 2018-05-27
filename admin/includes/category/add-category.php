					<!-- ADD CATEGORY FORM -->
                    <div class="col-xs-6">    
<?php 
	addCategory();
?>
                       		
                        	<h3>Add Category</h3>
                        	<form action="" method="post">
                        		<div class="form-group">
                        			<label for="cat_title">Category Title</label><!--for is usesd agar you click on the label to its puts a cursor on textfield-->
                        			<input class="form-control" type="text" name="cat_title" id="cat_title">
                        		</div>
                        		<div class="form-group">
                        			<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        		</div>
                        	</form>
                        </div>
                        <!-- END OF ADD CATEGORY FORM -->