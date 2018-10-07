<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<title>دفتر تلفن</title>
	<link rel="stylesheet" href="style1.css">
</head>

<body>
	<?php
	require_once( 'config.php' );

	$sql = "SELECT fname, lname, phone FROM data";
	mysqli_query( $conn, 'set names "utf8"' );
	$result = mysqli_query( $conn, $sql );

	?>
	<form action="delete.php" method="post">

		<table align="center" style="width:50%" border="1">
			<tr>
				<th>انتخاب</th>
				<th>نام</th>
				<th>نام خانوادگی</th>
				<th>شماره تلفن</th>
			</tr>
			<?php
			if ( mysqli_num_rows( $result ) > 0 ) {
				// output data of each row
				$td1 = "<td align='center'>";
				$td2 = "</td>";
				while ( $row = mysqli_fetch_assoc( $result ) ) {
					echo "<tr>";
					echo $td1 . "<input type=\"checkbox\" name=\"phonenum\" value=" . $row[ "phone" ] . ">" . $td2;
					echo $td1 . $row[ "fname" ] . $td2;
					echo $td1 . $row[ "lname" ] . $td2;
					echo "<td align='center' id=" . $row[ "phone" ] . ">" . $row[ "phone" ] . $td2;
					//echo $td1 . "<button class='rem' id=" . $row[ "phone" ] . ">حذف</button>" . $td2;
					echo "</tr>";
				}
				echo "</table>";
			} else {
				echo "0 results";
			}
			mysqli_close( $conn );
			?>

			<p align="center">
				<input type="submit" value="حذف"/>
			</p>
	</form>
	<p align="center">
		<input type="button" value="بازگشت" onclick="window.location.href='index.php'"/>
	</p>

	<p id="test"></p>
	<script>
		$( ".rem" ).click( function () {
			alert( $( ".rem" ).attr( "id" ) );
		} );

		$( ".rem" ).click( function () {
			$( this ).parent().parent().remove();

		} );
	</script>
</body>
</html>