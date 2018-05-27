<?php include_once("includes/db.php");
		include_once("admin/functions.php");
	  $title="Forgot Password!";?>
<?php
	if(!isset($_GET['forgot'])){
		header("Location: index.php");
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['email'])){
			$email = $_POST['email'];
			$length = 50;
			$token = bin2hex(openssl_random_pseudo_bytes($length));
			
			//check whether the email exists or not
			$query = "SELECT * from users WHERE user_email ='$email'";
			$user = mysqli_query($connection, $query);
			if(mysqli_num_rows($user) ==1){
				//you can say that the email exists
				//now if the email exists then just update the token
				$query = "UPDATE users SET token = '$token' WHERE user_email='$email'";
				$updateToken=mysqli_query($connection, $query);
				confirmQuery($updateToken);
				
				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'From: Study Link <enquiry@studylinkclasses.com>' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				$to = $email;
				$subject = "Vidhi's Blog Change Password";

				$body = "Please Click the below link to reset your password:<br/>
				<a href='http://localhost/phpcourse/	cms/reset.php?email=$email&token=$token'>http://localhost/phpcourse/cms/reset.php?email=$email&token=$token</a>";

				$sentStatus = mail($to, $subject, $body, $headers);
				if (!$sentStatus) {
					$errorMessage = error_get_last()['message'];
					echo $errorMessage;
				}else{
					echo "sent<br/>";
					echo "<a href='http://localhost/phpcourse/cms/reset.php?email=$email&token=$token'>http://localhost/phpcourse/cms/reset.php?email=$email&token=$token</a>";
				}
			}else{
				echo "Some issues with the email id! or you aren't registered with us";
			}
		}
	}
?>
	<html>
<?php
	include_once("includes/header.php");	
?>

		<body>
<?php
	include_once("includes/navigation.php");
?>
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-md-offset-4">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="text-center">
										<h3><i class="fa fa-lock fa-4x"></i></h3>
										<h2 class="text-center">Forgot Password?</h2>
										<p>You can reset your password here!</p>
										<div class="panel-body">
											<form action="" method="POST" role="form" id=forgot-password>
												<div class="form-group">
													<div class="input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
														<input class="form-control" type="email" id="email" name="email" placeholder="Please Enter your email"> </div>
												</div>
												<div class="form-group">
													<input type="submit" class="btn btn-lg btn-primary btn-block" name="reset-submit" value="submit"> </div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</body>

	</html>