<?php 

	$host    = 'localhost';
	$db      = 'map';
	$user    = 'root';
	$pass    = '';
	$charset = 'utf8';

	$dbCon = mysqli_connect("$host", "$user", "$pass", "$db");

	// Check connection
	if (mysqli_connect_errno())
	  {
	  	echo "Failed to connect to MySQL: ";
	  	die();
	  }

 ?>