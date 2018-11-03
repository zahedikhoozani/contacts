<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<script src="cnfrm.js"></script>
</head>

<body>
	<?php
	////////////////////////////////////////viewrecords/////////////////////////////////////////
	function viewrecords() {
		require( 'config.php' );
		$sql = "SELECT id, fname, lname, phone FROM data";
		mysqli_query( $conn, 'set names "utf8"' );
		$result = mysqli_query( $conn, $sql );

		echo '<form id="frm" action="' . $_SERVER[ 'PHP_SELF' ] . '" method="post">';
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
				echo $td1 . "<input type='radio' name='id' value=" . $row[ "id" ] . ">" . $td2;
				echo $td1 . $row[ "fname" ] . $td2;
				echo $td1 . $row[ "lname" ] . $td2;
				echo $td1 . $row[ "phone" ] . $td2;
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "<p>مخاطبی با مشخصات خواسته شده یافت نشد.</p>";
		}
		mysqli_close( $conn );

		echo '<p align="center">عملیات: 
				<select name="mod">
				<option value="addrecordform">مخاطب جدید</option>
				<option value="delete">حذف</option>
				<option value="editform">ویرایش</option>
				</select>
				<input type="button" value="اعمال" onclick="cnfrm()"/>
				</p>
				</form>';
		echo '<div id="jsfrm"></div>';
		echo '<form action="index.php" method="post">
		<p align="center">
			<input style="width: 35%;" type="text" name="search" value="زاهدی"/>
			<input type="hidden" name="mod" value="search">
			<input type="submit" value="جستجو"/>
		</p>
	</form>';
	}

	?>

	<?php
	////////////////////////////////////////delete rocords/////////////////////////////////////////
	function deleterecord( $id ) {
		require( 'config.php' );
		// sql to delete a record
		$sql = "DELETE FROM data WHERE id=$id";

		if ( mysqli_query( $conn, $sql ) ) {
			echo "<p class='notif'>مخاطب مورد نظر با موفقیت حذف گردید</p>";
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
				echo $td1 . "<input type='radio' name='id' value=" . $row[ "id" ] . ">" . $td2;
				echo $td1 . $row[ "fname" ] . $td2;
				echo $td1 . $row[ "lname" ] . $td2;
				echo "<td align='center' id=" . $row[ "phone" ] . ">" . $row[ "phone" ] . $td2;
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "<p class='notif'>مخاطبی با مشخصات خواسته شده یافت نشد.</p>";
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

	<?php
	////////////////////////////////////////edit record/////////////////////////////////////////
	function editform( $id ) {
		require( 'config.php' );
		$sql = "SELECT fname, lname, phone FROM data WHERE id='$id'";
		mysqli_query( $conn, 'set names "utf8"' );
		$result = mysqli_query( $conn, $sql );
		$row = mysqli_fetch_assoc( $result );

		echo '<form action="index.php" method="POST">
		<p align="center">نام:<br/><input type="text" name="fname" size="32" value="' . $row[ 'fname' ] . '">
		</p>
		<p align="center">نام خانوادگی:<br/><input type="text" name="lname" size="32" value="' . $row[ 'lname' ] . '">
		</p>
		<p align="center">شماره تلفن:<br/><input type="text" name="mob" size="20" value="' . $row[ 'phone' ] . '">
		</p>
		<input type="hidden" name="mod" value="editrecord">
		<input type="hidden" name="id" value="' . $id . '">

		<p align="center">
			<input type="submit" value="ثبت" name="Submit">
			<input type="reset" value="پاک کردن" name="B2">
		</p>
		</form>
			<p align="center">
			<input type="button" value="بازگشت" onclick="window.location.href=\'index.php\'"/>
		</p>';

	}


	function editrecord( $id, $fname, $lname, $phone ) {

		require( 'config.php' );

		$sql = "UPDATE `data` SET `fname` = '$fname', `lname` = '$lname', `phone` = '$phone' WHERE `data`.`id` = $id";

		mysqli_query( $conn, 'set names "utf8"' );
		if ( mysqli_query( $conn, $sql ) ) {
			echo "<p align='right'>مخاطب با موفقیت ویرایش شد</p>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error( $conn );
		}

		mysqli_close( $conn );

	}
	?>
</body>
</html>