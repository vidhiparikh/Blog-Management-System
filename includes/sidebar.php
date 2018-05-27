<!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            
               
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        	</button>
                        </span>
                   	</div>
                    </form>
                    <!-- /.input-group -->
                </div>
				<!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter Username">
					</div>
                    <div class="form-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter Password">
						</div>
                  		<div class="form-group">
                   		<div class="col-md-6">
                    	
	                            <button name="login" class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-user"></span> Login
                        	</button>
                      	</div>
                      	</div>	
                      	<div class="col-md-6">
                      	<a href="register.php" class="btn btn-warning"><span class="glyphicon glyphicon-registration-mark"></span> Register</a>
						</div>
						
                   		<div class="form-group">
						<a href="forgot.php?forgot=<?php echo uniqid(true);?>">Forgot Password</a></div>

                    </form>
                    <!-- /.input-group -->
                </div>

<?php 

			$query = "SELECT * FROM categories";
			$select_all_categories_query = mysqli_query($connection, $query);//send this query to this connection.
?>

               
               
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
<?php
	while($row = mysqli_fetch_assoc($select_all_categories_query)){
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		echo "<li>
			<a href='categories.php?c_id=$cat_id'>$cat_title</a>
		</li>";
	}
?>
                             </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <!-- to add more categories to second half 
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>