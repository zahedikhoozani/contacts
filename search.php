<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>دفتر تلفن</title>
	<link rel="stylesheet" href="style1.css">
</head>

<body>
	<?php

	$name = $_POST[ 'search' ];

	function search( $name ) {
		require( 'config.php' );
		
		$query = "SELECT * FROM `data` WHERE `fname` LIKE '" . $name . "' OR (`lname` LIKE '" . $name . "')";
		mysqli_query( $conn, 'set names "utf8"' );
		$result = mysqli_query( $conn, $query );

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
				echo $td1 . "<input type='radio' name='phonenum' value=" . $row[ "phone" ] . ">" . $td2;
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
	search( $name );
	?>

	<p align="center">
		<input type="button" value="بازگشت" onclick="window.location.href='index.php'"/>
	</p>

</body>
</html>