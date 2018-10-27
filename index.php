<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html" ; charset="utf-8">
	<title>دفتر تلفن</title>
	<link rel="stylesheet" href="style1.css" type="text/css">
</head>

<body>
	<div class="header">
		<h1>مخاطبین</h1>
	</div>
	<br>

	<?php
	require_once( "functions.php" );

	if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
		$mod = $_POST[ 'mod' ];
	} else {
		$mod = "";
		viewrecords();
	}
	?>
	<?php
	///////////////////////////////////////////mod=delete////////////////////////////////////////////////
	if ( $mod == "delete" ) {
		// collect value of input field
		$id = $_POST[ 'id' ];

		deleterecord( $id );
		?>
		<form action="index.php" method="post">
			<input type="hidden" name="mod" value="viewrecords">
			<p align="center">
				<input type="submit" value="بازگشت">
			</p>
		</form>

	<?php	}	?>
	
	<?php
	///////////////////////////////////////////mod=view records////////////////////////////////////////////////
	if ( $mod == " viewrecords " ) {
		// collect value of input field
		viewrecords();
	}
	?>
	<?php
	///////////////////////////////////////////mod=search////////////////////////////////////////////////
	if ( $mod == "search " ) {
		// collect value of input field
		$name = $_POST[ 'search' ];
		search( $name );
		echo '<form action=" ' . $_SERVER[ "PHP_SELF" ] . ' " method="post "">
		<input type="hidden" name="mod" value="viewrecords">
		<p align="center"><input type="submit" value="بازگشت">
		</p>
	</form>';
	}
	?>
	<?php
		///////////////////////////////////////////mod=delete////////////////////////////////////////////////
	if ( $mod == "addrecordform" ) {
		// collect value of input field
		echo '<form action="index.php" method="POST">
		<p align="center">نام:<br/><input type="text" name="fname" size="32">
		</p>
		<p align="center">نام خانوادگی:<br/><input type="text" name="lname" size="32">
		</p>
		<p align="center">شماره تلفن:<br/><input type="text" name="mob" size="20">
		</p>
		<input type="hidden" name="mod" value="addrecord">


		<p align="center">
			<input type="submit" value="ثبت" name="Submit">
			<input type="reset" value="پاک کردن" name="B2">
		</p>
		</form>

		<p align="center">
			<input type="button" value="بازگشت" onclick="window.location.href=\'index.php\'"/>
		</p>';
	}

	if ( $mod == "addrecord" ) {
		// collect value of input field
		$fname = $_POST[ "fname" ];
		$lname = $_POST[ "lname" ];
		$phone = $_POST[ "mob" ];
		addrecord( $fname, $lname, $phone );
		viewrecords();
	}
	?> 
	<?php
///////////////////////////////////////////mod=edit////////////////////////////////////////////////
	if ( $mod == "editform" ) {
		// collect value of input field
		$id = $_POST[ 'id' ];
		editform( $id );
	}

	if ( $mod == "editrecord" ) {
		// collect value of input field

		$fname = $_POST[ "fname" ];
		$lname = $_POST[ "lname" ];
		$phone = $_POST[ "mob" ];
		editrecord( $fname, $lname, $phone );
		viewrecords();
	}

	?>
	<br>
	<div class="footer">
		برنامه نویس: کریم زاهدی
		<br> صفحه برنامه در github.com: zahedikhoozani/contacts
	</div>

	<script>
		setTimeout( function () {
			document.getElementsByClassName( "notif" ).style.display = "none";
		}, 1000 );
	</script>

</body>
</html>