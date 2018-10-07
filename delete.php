<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>دفتر تلفن</title>
	<link rel="stylesheet" href="style1.css">
</head>

<body>
	<?php
	require_once( 'config.php' );

	$phone = $_POST[ "phonenum" ];

	// sql to delete a record
	$sql = "DELETE FROM data WHERE phone=$phone";

	if ( mysqli_query( $conn, $sql ) ) {
		echo "<p>مخاطب مورد نظر با موفقیت حذف گردید</p>";
	} else {
		echo "Error deleting record: " . mysqli_error( $conn );
	}

	mysqli_close( $conn );
	?>

	<p align="center">
		<input type="button" value="بازگشت" onclick="window.location.href='index.php'"/>
	</p>

</body>
</html>