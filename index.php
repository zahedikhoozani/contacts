<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>دفتر تلفن</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<script src="js/bootstrap.min.js"></script>
	</head>
    <body>
		
		<?php 
$servername = "localhost";
$username = "***";
$password = "***";
$dbname = "***";

// Create connection
	mysql_connect( $servername, $username, $password ) or die(mysql_error()); 
	mysql_select_db($dbname) or die(mysql_error()); 


		$mode = $_GET['mode'];
		$name = $_GET['name'];
		$family = $_GET['family'];
		$phone = $_GET['phone'];
		$id = $_GET['id'];
$self = $_SERVER['PHP_SELF'];
	?>
	<?php
		if ( $mode=="add") 
		 {
		 Print '<h2>مخاطب جدید</h2>
		 <p> 
		 <form action=';
		 echo $self; 
		 Print '
		 method=GET> 
		 <table>
		 <tr><td>نام:</td><td><input type="text" name="name" /></td></tr> 
		 <tr><td>نام خانوادگی:</td><td><input type="text" name="family" /></td></tr> 
		 <tr><td>شماره تلفن:</td><td><input type="text" name="phone" /></td></tr> 
		 <tr><td colspan="2" align="center"><input type="submit" value="ثبت"/></td></tr> 
		 <input type=hidden name=mode value=added>
		 </table> 
		 </form> <p>';
		 } 
	
	 if ( $mode=="added") 
	 {
	 mysql_query ("INSERT INTO address (name, family, phone) VALUES ('$name', '$family', '$phone')");
	 }
	?>
	    <?php
		if ( $mode=="edit") 
	 { 
	 Print '<h2>ویرایش تماس</h2> 
	 <p> 
	 <form action=';
	 echo $self; 
	 Print '
	 method=GET> 
	 <table> 
	 <tr><td>نام:</td><td><input type="text" value="'; 
	 Print $name; 
	 print '" name="name" /></td></tr> 
	 <tr><td>نام خانوادگی:</td><td><input type="text" value="'; 
	 Print $family; 
	 print '" name="family" /></td></tr> 
	 <tr><td>تلفن:</td><td><input type="text" value="'; 
	 Print $phone; 
	 print '" name="phone" /></td></tr> 
	 <tr><td colspan="2" align="center"><input type="submit" value="ثبت"/></td></tr> 
	 <input type=hidden name=mode value=edited> 
	 <input type=hidden name=id value='; 
	 Print $id; 
	 print '> 
	 </table> 
	 </form> <p>'; 
	 } 
	 
	 if ( $mode=="edited") 
	 { 
	 mysql_query ("UPDATE address SET name = '$name', phone = '$phone', email = '$email' WHERE id = $id"); 
	 Print "Data Updated!<p>"; 
	 } 
	 ?>
	<?php

		if ( $mode=="remove") 
		 {
		 mysql_query ("DELETE FROM address where id=$id");
		 Print "مخاطب مورد نظر با موفقیت حذف گردید <p>";
		 }
	?>
	<?php

		 $data = mysql_query("SELECT * FROM address ORDER BY name ASC") 
		 or die(mysql_error()); 
	?>
 
 <?PHP
	Print "<h1>دفتر تلفن</h1>";
	Print "<table border cellpadding=3>"; 
	Print "<tr><th width=100>نام</th><th width=100>نام خانوادگی</th><th width=200>شماره تلفن</th><th width=100 colspan=2>مدیریت</th></tr>"; Print "<td colspan=5 align=right><a href=" .$_SERVER['PHP_SELF']. "?mode=add>اضافه کردن تماس</a></td>"; 
	while($info = mysql_fetch_array( $data )) 
	{ 
	Print "<tr><td>".$info['name'] . "</td> "; 
	Print "<td>".$info['family'] . "</td> "; 
	Print "<td>".$info['phone'] . "</a></td>"; 
	Print "<td><a href=" .$_SERVER['PHP_SELF']. "?id=" . $info['id'] ."&name=" . $info['name'] . "&family=" . $info['family'] ."&phone=" . $info['phone'] . "&mode=edit>ویرایش</a></td>"; Print "<td><a href=" .$_SERVER['PHP_SELF']. "?id=" . $info['id'] ."&mode=remove>حذف</a></td></tr>"; 
	} 
	Print "</table>"; 
	mysql_close();
	?> 

		
    </body>
</html>
