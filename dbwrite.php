<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>دفتر تلفن</title>
		<link rel="stylesheet" href="style1.css">
    </head>
    <body>
		<?php
			$fname=$_POST["fname"];
			$lname=$_POST["lname"];
			$phone=$_POST["mob"];

			require_once('config.php');
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $dbname);
			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			$sql = "INSERT INTO data (fname, lname, phone)
			VALUES ('$fname', '$lname', '$phone')";

			if (mysqli_query($conn, $sql)) {
				?><p align="right"><?php echo "مخاطب جدید با موفقیت ذخیره شد"; ?></p><?php
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

			mysqli_close($conn);
		?>
		
		<p align="center"><input type="button" value="بازگشت" onclick="window.location.href='index.php'"/></p>
		
    </body>
</html>