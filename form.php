<!DOCTYPE html>
<html dir="rtl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="style1.css" type="text/css">
        <title>دفتر تلفن</title>
    </head>
    <body>
        <form action="dbwrite.php" method="POST" >
            <p align="right">نام:<input type="text" name="fname" size="32"></p>
            <p align="right">نام خانوادگی:<input type="text" name="lname" size="32"></p>
            <p align="right">شماره تلفن:<input type="text" name="mob" size="20"></p>
            <p align="center"><input type="submit" value="ارسال" name="Submit"><input type="reset" value="از نو" name="B2"></p>
			<p align="center"><input type="button" value="بازگشت" onclick="window.location.href='index.php'" /></p>
        </form>
    </body>
</html>

