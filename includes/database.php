<?php
	$dbservername= "localhost";
	$dbusername= "root";
	$dbpassword= "";
	$dbname= "ecomm";
	$con = mysqli_connect("$dbservername", "$dbusername" ,"$dbpassword","$dbname");
	if(!$con){
		die("connection failed: ".mysqli_connect_error());
	}

?>