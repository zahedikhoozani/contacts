<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>دفتر تلفن</title>
	<link rel="stylesheet" href="style1.css" type="text/css">
</head>

<body>
	<h1>مخاطبین</h1>

	<?php
	require_once( "functions.php" );

	if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" && 1 ) {
		// collect value of input field
		$phone = $_POST[ 'phonenum' ];
		deleterecord( $phone );
	}

	if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" && 1 ) {
		// collect value of input field
		$name = $_POST[ 'search' ];
		search( $name );
	}

	if ( $_SERVER[ "REQUEST_METHOD" ] != "POST" ) {
		// collect value of input field
		viewrecords();
	}
	?>

	<form action="<?php echo $_SERVER[ 'PHP_SELF' ] ?>" method="post">
		<p align="center">
			<input style="width: 35%;" type="text" name="search" value="زاهدی"/>
			<input type="submit" value="جستجو"/>
		</p>
	</form>
</body>
</html>