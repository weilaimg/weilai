<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
date_default_timezone_set("Asia/Shanghai");
$date=date("Y/m/d");
$time=date("h:i:sa");
$time_1=$date.' '.$time;

$con=mysql_connect("localhost","root","EcjtuNetTest");
if(!$con)
{
	die("Connect ERROR:" . mysql_error());
}

	if(!(mysql_select_db("liuyan",$con)))
{
	mysql_query("CREATE DATABASE liuyan",$con);
	mysql_select_db("liuyan",$con);
	$sql="CREATE TABLE Liuyan
	(
	name varchar(20),
	email varchar(50),
	test varchar(500),
	time1 varchar(25)
	)";
	mysql_query($sql,$con);
}

$sql = "INSERT INTO Liuyan (name,email,test,time1)
VALUES
('$_POST[name]','$_POST[email]','$_POST[message]','$time_1')";

if(!mysql_query($sql,$con))
{
	die('ERROR : '.mysql_error());
}

mysql_close();
echo "留言成功，本页面将于5秒后跳转...如未跳转，请点击<a href=\"all.php\">这里</a>";
?>
<meta http-equiv="refresh" content="5;url=all.php"> 
</body>
</html>