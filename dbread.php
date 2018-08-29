<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>دفتر تلفن</title>
		<link rel="stylesheet" href="style1.css">
    </head>
    <body>
		<?php
			require_once('config.php');
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		$sql = "SELECT fname, lname, phone FROM data";
		$result = mysqli_query($conn, $sql);
		?>
		
		<table align="center" style="width:50%" border="1">
			<tr>
				<th>نام</th>
				<th>نام خانوادگی</th> 
				<th>شماره تلفن</th>
				<th>حذف</th>
			</tr>		
		<?php
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) { ?>
				<tr>
					<td align="center"><?php echo $row["fname"]; ?></td>
					<td align="center"><?php echo $row["lname"]; ?></td>
					<td align="center"><?php echo $row["phone"]; ?></td>
					<td align="center">حذف</td>
				</tr>
			<?php
			}?>
		</table>
		<?php
		} else {
			echo "0 results";
		}
		mysqli_close($conn);
		?>
		
		<p align="center"><input type="button" value="بازگشت" onclick="window.location.href='index.php'" /></p>
		
    </body>
</html>
