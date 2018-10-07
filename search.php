<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>دفتر تلفن</title>
	<link rel="stylesheet" href="style1.css">
</head>

<body>
	<?php
	require( 'config.php' );

	$name = $_POST[ 'search' ];

	$query = "SELECT * FROM `data` WHERE `fname` LIKE '" . $name . "'";
	//$query = "SELECT * FROM `data` WHERE `fname` LIKE '".$name."'; OR (lname LIKE '" . $name . "')";

	mysqli_query( $conn, 'set names "utf8"' );

	$result = mysqli_query( $conn, $query );

	while ( $row = mysqli_fetch_assoc( $result ) ) {
		echo $row[ 'fname' ] . " " . $row[ 'lname' ];
		echo "<br>";
	}

	mysqli_close( $conn );
	?>

	<p align="center">
		<input type="button" value="بازگشت" onclick="window.location.href='index.php'"/>
	</p>

</body>
</html>