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

    $name = $_POST['search'];

    $con= new mysqli("localhost","root","","Employee");
    //$query = "SELECT * FROM employees
   // WHERE first_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'";

    // Check connection
    if (mysqli_connect_errno())
      {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

$result = mysqli_query($con, "SELECT * FROM employees
    WHERE first_name LIKE '%{$name}%' OR last_name LIKE '%{$name}%'");

while ($row = mysqli_fetch_array($result))
{
        echo $row['first_name'] . " " . $row['last_name'];
        echo "<br>";
}

	mysqli_close( $conn );
	?>

	<p align="center">
		<input type="button" value="بازگشت" onkeydown="window.location.href='index.php'"/>
	</p>

</body>
</html>