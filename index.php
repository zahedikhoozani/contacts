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

	if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
		$mod = $_POST[ 'mod' ];
	} else {
		$mod = "";
		viewrecords();
	}

	if ( $mod == "delete" ) {
		// collect value of input field
		$id = $_POST[ 'id' ];
		deleterecord( $id );
		echo '<form action="' . $_SERVER[ "PHP_SELF" ] . '" method="post"">
		<input type="hidden" name="mod" value="viewrecords">
		<p align="center"><input type="submit" value="بازگشت"></p>
		</form>';
	}

	if ( $mod == "viewrecords" ) {
		// collect value of input field
		viewrecords();
	}

	if ( $mod == "search" ) {
		// collect value of input field
		$name = $_POST[ 'search' ];
		search( $name );
		echo '<form action="' . $_SERVER[ "PHP_SELF" ] . '" method="post"">
		<input type="hidden" name="mod" value="viewrecords">
		<p align="center"><input type="submit" value="بازگشت"></p>
		</form>';
	}

	if ( $mod == "addrecord" ) {
		// collect value of input field
		$fname = $_POST[ "fname" ];
		$lname = $_POST[ "lname" ];
		$phone = $_POST[ "mob" ];
		addrecord( $fname, $lname, $phone );
		viewrecords();
	}
	
	if ( $mod == "edit" ) {
		// collect value of input field
		$fname = $_POST[ "fname" ];
		$lname = $_POST[ "lname" ];
		$phone = $_POST[ "mob" ];
		editing( $fname, $lname, $phone );
		viewrecords();
	}

	?>

	<form action="<?php echo $_SERVER[ 'PHP_SELF' ] ?>" method="post">
		<p align="center">
			<input style="width: 35%;" type="text" name="search" value="زاهدی"/>
			<input type="hidden" name="mod" value="search">
			<input type="submit" value="جستجو"/>
		</p>
	</form>
	
<!--	
	<form action="<?php //echo $_SERVER[ 'PHP_SELF' ] ?>" method="post">
		<p align="center">
			<input type="hidden" name="mod" value="edit">
			<input type="submit" value="ویرایش"/>
		</p>
	</form>
-->
</body>
</html>