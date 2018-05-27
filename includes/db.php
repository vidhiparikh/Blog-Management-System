<?php
	define("SERVER","localhost");
	define("USER","vidhi");
	define("PASSWORD","vidhi123");
	define("DB","cms");
	$connection=mysqli_connect(SERVER,USER,PASSWORD,DB);//server.ie database server ka ip,username,password,name of the database to connect

	/*if($connection){
		echo "we are connected";
	}*/
?>
