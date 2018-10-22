<!DOCTYPE html>
<html dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html" ; charset="utf-8">
	<link rel="stylesheet" href="style1.css" type="text/css">
	<title>دفتر تلفن</title>
</head>

<body>
	<form action="index.php" method="POST">
		<p align="center">نام:<br/><input type="text" name="fname" size="32">
		</p>
		<p align="center">نام خانوادگی:<br/><input type="text" name="lname" size="32">
		</p>
		<p align="center">شماره تلفن:<br/><input type="text" name="mob" size="20">
		</p>
		<input type="hidden" name="mod" value="addrecord">


		<p align="center">
			<input type="submit" value="ثبت" name="Submit">
			<input type="reset" value="پاک کردن" name="B2">
		</p>
	</form>

	<p align="center">
		<input type="button" value="بازگشت" onclick="window.location.href='index.php'"/>
	</p>
</body>
</html>