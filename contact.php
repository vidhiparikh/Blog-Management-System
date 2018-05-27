<?php include_once("includes/db.php");
	$title="Contact Us!";?>
<?php
	if(isset($_POST['submit'])){
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'From: Study Link <enquiry@studylinkclasses.com>' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		$to = $_POST['emailid'];
		$subject = $_POST['subject'];
		
		$body = $_POST['comments'];
		
		$sentStatus = mail($to, $subject, $body, $headers);
		if (!$sentStatus) {
			$errorMessage = error_get_last()['message'];
			echo $errorMessage;
		}else{
			echo "sent";
		}
		header("Location: contact.php");	
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
<div class="col-md-6 col-md-offset-3">
<form action="" method="POST" role="form">
	<legend>Contact Us!</legend>

	<div class="form-group">
		<label for="emailid">Email id</label>
		<input type="email" class="form-control" id="emailid" name="emailid" placeholder=" Enter your email id">
	</div>
	<div class="form-group">
		<label for="subject">Subject</label>
		<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter your Subject">
	</div>
	<div class="form-group">
		<label for="">Comments</label>
		<textarea class="form-control" id="comments" name="comments" placeholder="Your comments here!" rows="10"></textarea>
	</div>



	<button type="submit" name="submit"  class="btn btn-primary btn-block btn-lg">Submit</button>
</form>
	</div>
</body>
</html>