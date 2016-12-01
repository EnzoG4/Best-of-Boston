<?php // note that this is not a complete page.


	$omitlist = isset($_COOKIE['omit']) ? $_COOKIE['omit']: '0' ;

	if(isset($_POST['hide'])){
		$id = $_POST['attraction'];
		$cookie = $omitlist.", ".$id;
	 	setcookie ('omit', $cookie);
	 	header('Location: ../hw13.html');
	 }

	$search = $_GET['search'];

	$dbc = @mysqli_connect("localhost", "guevarja", "Gk2naGu9", "csci2254")
	       or die("Could not open Best of Boston db, " . mysqli_connect_error());

	$query = "SELECT `name`, `entered_by`, `category`, `stars`, `price_range`, `phone`, `address`, `url`, `comment`, `attraction_id` from bestofbc WHERE `name` LIKE '%$search%' OR `entered_by` LIKE '%$search%' OR `category` LIKE '%$search%' OR `url` LIKE '%$search%' or comment LIKE '%$search%' OR phone LIKE '%$search%' OR address LIKE '%$search%' AND `attraction_id` NOT IN ($omitlist)";

	$result = mysqli_query($dbc, $query);
	if ( mysqli_num_rows( $result ) == 0 ) {
		die("No results for $search");
	}
	$bob_data = array();	// put the rows as objects in an array
	while ( $obj = mysqli_fetch_object( $result ) ) {
		$bob_data[] = $obj;
	}
	echo json_encode(array_values($bob_data));
	mysqli_close($dbc);
