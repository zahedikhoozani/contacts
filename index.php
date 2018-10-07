<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>دفتر تلفن</title>
	<link rel="stylesheet" href="style1.css" type="text/css">
</head>

<body>
	<h1 align="center">دفتر تلفن</h1>
	<?php

	function viewrecords() {
		require( 'config.php' );
		$sql = "SELECT fname, lname, phone FROM data";
		mysqli_query( $conn, 'set names "utf8"' );
		$result = mysqli_query( $conn, $sql );

		echo '<form action="' . $_SERVER[ 'PHP_SELF' ] . '" method="post">

		<table align="center" style="width:50%" border="1">
			<tr>
				<th>انتخاب</th>
				<th>نام</th>
				<th>نام خانوادگی</th>
				<th>شماره تلفن</th>
			</tr>';
		if ( mysqli_num_rows( $result ) > 0 ) {
			// output data of each row
			$td1 = "<td align='center'>";
			$td2 = "</td>";
			while ( $row = mysqli_fetch_assoc( $result ) ) {
				echo "<tr>";
				echo $td1 . "<input type='checkbox' name='phonenum' value=" . $row[ "phone" ] . ">" . $td2;
				echo $td1 . $row[ "fname" ] . $td2;
				echo $td1 . $row[ "lname" ] . $td2;
				echo "<td align='center' id=" . $row[ "phone" ] . ">" . $row[ "phone" ] . $td2;
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "0 results";
		}
		mysqli_close( $conn );
	}


	function deleterecord( $phone ) {
		require( 'config.php' );
		// sql to delete a record
		$sql = "DELETE FROM data WHERE phone=$phone";

		if ( mysqli_query( $conn, $sql ) ) {
			echo "<script>alert ('مخاطب مورد نظر با موفقیت حذف گردید');</script>";
		} else {
			echo "Error deleting record: " . mysqli_error( $conn );
		}
		mysqli_close( $conn );
	}


	if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {
		// collect value of input field
		$phone = $_POST[ 'phonenum' ];
		deleterecord( $phone );
	}
	viewrecords();
	?>
	<p align="center">
		<input type="submit" value="حذف"/>
		<input type="button" value="مخاطب جدید" onclick="window.location.href='form.php'"/>
		<input type="text" value="جستجو" onkeydown="window.location.href='delete.php'"/>
	</p>
	</form>
</body>
</html>