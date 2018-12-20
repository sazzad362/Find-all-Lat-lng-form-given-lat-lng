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
	    padding: 20px;
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
	.sd-new{
		padding: 6px 10px;
	    background-color: #0d74bd;
	    color: #fff;
	    width: 30%;
	    margin: 15px;
	}
	.sd-new-red{
		padding: 6px 10px;
	    background-color: #e00336;
	    color: #fff;
	    width: 30%;
	    margin: 15px;
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

<h5 class="sd-new-red">Your Location is: Lat: <strong>23.7518</strong> | Lng: <strong>90.4254</strong></h5>

<h5 class="sd-new">Total found (10) around 1 Mile from you</h5>

<?php 

	// Get database conntection Here
	include 'config.php';

	$orglat = 23.7518;
	$orglng = 90.4254;
	$miles = 1;


	//Get Query

	$SqlQuery = "SELECT
			    *, (
			      3959 * acos (
			      cos ( radians($orglat) )
			      * cos( radians( lat ) )
			      * cos( radians( lng ) - radians($orglng) )
			      + sin ( radians($orglat) )
			      * sin( radians( lat ) )
			    )
			) AS distance
			FROM area
			HAVING distance <= $miles
			ORDER BY id ASC
			LIMIT 0 , 20;";

	// Result
	$results = mysqli_query($dbCon, $SqlQuery);
	
	while($loc = mysqli_fetch_array($results)){?>

	<div class="block_area">
		<h4>ID : <?php echo $loc["id"]; ?></h4>
		<h5>Name: <i><?php echo $loc["name"]; ?></i></h5>
		<p>Lat: <?php echo $loc["lat"]; ?></p>
		<p>Lng: <?php echo $loc["lng"]; ?></p>
		<p>Price: $<?php echo $loc["price"]; ?></p>
		<a href="#"> View on MAP </a>
	</div>

<?php } ?>