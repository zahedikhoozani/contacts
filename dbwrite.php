<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<title>دفتر تلفن</title>
	<link rel="stylesheet" href="style1.css">
</head>

<body>
	<?php
	$fname = $_POST[ "fname" ];
	$lname = $_POST[ "lname" ];
	$phone = $_POST[ "mob" ];

	require_once( 'config.php' );

	$sql = "INSERT INTO data (fname, lname, phone)
			VALUES ('$fname', '$lname', '$phone')";

	mysqli_query( $conn, 'set names "utf8"' );
	if ( mysqli_query( $conn, $sql ) ) {
		echo "<p align='right'>مخاطب جدید با موفقیت ذخیره شد</p>";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error( $conn );
	}

	mysqli_close( $conn );
	?>

	<p align="center"><input type="button" value="بازگشت" onclick="window.location.href='index.php'"/>
	</p>

</body>
</html>