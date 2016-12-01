<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<?php 

	include ("dbconn.php");
	$dbname = "csci2254";
	$dbc = connect_to_db($dbname);

	

	
	$name = $_POST['name'];
	$category = $_POST['category'];
	$rating = $_POST['rating'];
	$price = $_POST['price'];
	$phone = $_POST['phone'];
	$entered_by = $_POST['enter'];
	$url = $_POST['url'];
	$address = $_POST['address'];
	$comment = $_POST['comment'];
	$phone = preg_replace('/\D+/', '', $phone);

	function getLatLong($address){
		$geocodeURL = "https://maps.googleapis.com/maps/api/geocode/xml?";
		$address = "address=" . urlencode($address);
		$key = "key=AIzaSyDdtL86k7aZm71harZjT2iAkRn2fg0hnBs";

		$geocoderequest = "$geocodeURL$address" . "&" . $key;

		$xml = new SimpleXMLElement(file_get_contents($geocoderequest));

		if ($xml->status != 'OK'){
			$status = $xml->error_message;
			die("<div class='alert alert-danger'> 
				<strong>Error!</strong> Please enter the a valid address.
				<a href='../hw13.html'>Return to Best of Boston page.</a>
				</div>");
		}
		$loc = getLocation($xml);

		return $loc;
	}

	function getLocation($xml){
		$latitude = $xml->result->geometry->location->lat;
		$longitude = $xml->result->geometry->location->lng;

		$location = array("latitude" => $latitude, "longitude" => $longitude);
		return ($location);
	}

	if (isset($address)){
		$loc = getLatLong($address);
		$latitude = $loc['latitude'];
		$longitude = $loc['longitude'];
	}
	if (trim($name) == ""){
		echo("<div class='alert alert-danger'> 
				<strong>Error!</strong> Please enter the name of the establishment.
				<a href='../hw13.html'>Return to Best of Boston page.</a>
				</div>");
	}
	else if(trim($category) == ""){
		echo("<div class='alert alert-danger'> 
				<strong>Error!</strong> Please enter the category of the establishment.
				<a href='../hw13.html'>Return to Best of Boston page.</a>
				</div>");
	}
	else if(trim($entered_by) == ""){
		echo("<div class='alert alert-danger'> 
				<strong>Error!</strong> Please enter your name.
				<a href='../hw13.html'>Return to Best of Boston page.</a>
				</div>");
	}

	else if(trim($url) == ""){
		echo("<div class='alert alert-danger'> 
				<strong>Error!</strong> Please enter the website's url.
				<a href='../hw13.html'>Return to Best of Boston page.</a>
				</div>");
	}
	else if(trim($address) == ""){
		echo("<div class='alert alert-danger'> 
				<strong>Error!</strong> Please enter the establishment's address.
				<a href='../hw13.html'>Return to Best of Boston page.</a>
				</div>");
	}
	else if(trim($comment) == ""){
		echo("<div class='alert alert-danger'> 
				<strong>Error!</strong> Please enter a comment.
				<a href='../hw13.html'>Return to Best of Boston page.</a>
				</div>");
	}
	else{
		$query1 = "INSERT INTO `bestofbc` (insertion_date, name, category, stars, price_range, entered_by ,url, phone, address, comment, latitude, longitude) VALUES (CURDATE(),'$name', '$category', '$rating', '$price', '$entered_by', '$url', '$phone', '$address', '$comment', '$latitude', '$longitude')";
		
		$result = perform_query($dbc, $query1);

		echo("<div class='alert alert-success'> 
				<strong>Success!</strong> Your input has been recorded.
				<a href='../hw13.html'>Return to Best of Boston page.</a>
				</div>");
		}
	$link = mysql_connect('localhost', 'guevarja', 'Gk2naGu9');
	mysql_close($link);
	//disconnect_from_db($dbc, $query1);

	// echo "name: $name
	// 		category: $category
	// 		rating: $rating
	// 		price: $price
	// 		entered_by: $entered_by
	// 		url = $url
	// 		address = $address
	// 		comment = $comment";