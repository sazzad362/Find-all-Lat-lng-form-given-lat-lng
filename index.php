<style>
	*{
		margin: 0;
		padding: 0;
	}
	h1,h2,h3,h4,h5,p{
		margin:5px 10px 10px 10px;
	}
	body{
		font-family: arial;
	}
	.block_area{
		border:1px solid #ddd;
		padding: 15px;
		width: 200px;
		float:left;
		display: inline-block;
		margin: 15px;
		box-shadow: 8px 9px 20px 0px #ddd;
	}
	a {
	    color: #ffffff;
	    text-decoration: none;
	    background: #0d74bd;
	    padding: 4px 14px;
	    width: 87%;
	    display: block;
	    text-align: center;
	}
	.sd-form {
	    background-color: #ddd;
	    padding: 25px;
	    margin: 0px 15px 15px 15px;
	    text-align: center;
	}
	input[type="text"] {
    	padding: 6px 15px;
	}

	select {
	    padding: 6px 10px;
	}

	input[type="submit"] {
	    padding: 6px 10px;
	    border: 0;
	    background-color: #0d74bd;
	    color: #fff;
	}
</style>

<form action="search.php" method="POST" class="sd-form">
	<input type="text" name="MinPrice" placeholder="Min Price">
	<input type="text" name="MaxPrice" placeholder="Mx Price">
	<select name="radius">
	  <option>Select Mile</option>
	  <option value="1">1 mile</option>
	  <option value="2">2 Miles</option>
	  <option value="3">3 Miles</option>
	  <option value="4">4 Miles</option>
	</select>
	<input type="submit" value="search" name="search">
</form>

<?php 

	// Get database conntection Here
	include 'config.php';

	$lat = 23.7567469;
	$lng = 90.4179039;


	$SqlQuery = "SELECT * FROM area";

	// Result
	$results = mysqli_query($dbCon, $SqlQuery);
	
	while($loc = mysqli_fetch_array($results)){

	// Get value form the array
	$id = $loc["id"];
	$name = $loc["name"];
	$lat = $loc["lat"];
	$long = $loc["lng"];
	$price = $loc["price"];

	?>

	<div class="block_area">
		<h4>ID : <?php echo $id; ?></h4>
		<h5>Area Name: <i><?php echo $name; ?></i></h5>
		<p>Lat: <?php echo $lat; ?></p>
		<p>Lng: <?php echo $long; ?></p>
		<p>Price: $<?php echo $price; ?></p>
		<a href="#"> View on MAP </a>
	</div>

	<?php

	}

?>



