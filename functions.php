<!doctype html>
<html>
<head>
	<meta charset="utf-8">
</head>

<body>
	<?php
////////////////////////////////////////viewrecords/////////////////////////////////////////
	function viewrecords() {
		require( 'config.php' );
		$sql = "SELECT fname, lname, phone FROM data";
		mysqli_query( $conn, 'set names "utf8"' );
		$result = mysqli_query( $conn, $sql );

		echo '<form action="' . $_SERVER[ 'PHP_SELF' ] . '" method="post">';
		echo '<input type="hidden" name="mod" value="delete">';

		$tblhd = '<table align="center" style="width:50%" border="1">
			<tr>
				<th>انتخاب</th>
				<th>نام</th>
				<th>نام خانوادگی</th>
				<th>شماره تلفن</th>
			</tr>';

		if ( mysqli_num_rows( $result ) > 0 ) {
			// output data of each row
			echo $tblhd;
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
			echo "<p>مخاطبی با مشخصات خواسته شده یافت نشد.</p>";
		}
		mysqli_close( $conn );
		echo '<p align="center">
		<input type="button" value="مخاطب جدید" onclick="window.location.href=\'form.php\'"/>
		<input type="submit" value="ویرایش"/>
		<input type="submit" value="حذف"/>
	</p>
	</form>';
	}

	?>

	<?php
////////////////////////////////////////delete rocords/////////////////////////////////////////
	function deleterecord( $phone ) {
		require( 'config.php' );
		// sql to delete a record
		$sql = "DELETE FROM data WHERE phone=$phone";

		if ( mysqli_query( $conn, $sql ) ) {
			echo "<p>مخاطب مورد نظر با موفقیت حذف گردید</p>";
		} else {
			echo "Error deleting record: " . mysqli_error( $conn );
		}
		mysqli_close( $conn );
	}

	?>

	<?php
////////////////////////////////////////search/////////////////////////////////////////
	function search( $name ) {
		require( 'config.php' );

		$query = "SELECT * FROM `data` WHERE `fname` LIKE '" . $name . "' OR (`lname` LIKE '" . $name . "')";
		mysqli_query( $conn, 'set names "utf8"' );
		$result = mysqli_query( $conn, $query );

		echo '<script>
            document.body.innerHTML = "";
        </script>';

		echo '<form action="' . $_SERVER[ 'PHP_SELF' ] . '" method="post">';
		$tblhd = '<table align="center" style="width:50%" border="1">
			<tr>
				<th>انتخاب</th>
				<th>نام</th>
				<th>نام خانوادگی</th>
				<th>شماره تلفن</th>
			</tr>';

		if ( mysqli_num_rows( $result ) > 0 ) {
			// output data of each row
			echo $tblhd;
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
			echo "<p>مخاطبی با مشخصات خواسته شده یافت نشد.</p>";
		}
		mysqli_close( $conn );
	}
	?>

	<?php
////////////////////////////////////////add record/////////////////////////////////////////

	function addrecord( $fname, $lname, $phone ) {

		require( 'config.php' );

		$sql = "INSERT INTO data (fname, lname, phone)
			VALUES ('$fname', '$lname', '$phone')";

		mysqli_query( $conn, 'set names "utf8"' );
		if ( mysqli_query( $conn, $sql ) ) {
			echo "<p align='right'>مخاطب جدید با موفقیت ذخیره شد</p>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error( $conn );
		}

		mysqli_close( $conn );

	}
	?>
</body>
</html>