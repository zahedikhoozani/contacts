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

// sql to delete a record
$sql = "DELETE FROM data WHERE fname=''";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

		<p align="center"><input type="button" value="بازگشت" onclick="window.location.href='index.php'" /></p>
		
    </body>
</html>
