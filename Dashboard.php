<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>

</body>
</html>
<?php
session_start();

$uname="admin";
$password="admin@123";

if (isset($_SESSION['uname'])) 
{
	include "LoginHeader.php";
	include "Sidebar.php"; 
	echo "<h1> Welcome ".$row['name']."</h2>";
}
else
{
	include 'Controller/DataView.php';
    $row = ViewData();
	if ($_POST['uname']==$uname && $_POST['password']==$password)
	{
		$_SESSION['uname'] = $uname;
		echo "<script>location.href='Dashboard.php'</script>";

	}
	else
	{
		echo "<script>alert(Username or Password incorrect!)</script>";
		echo "<script>location.href='Login.php'</script>";
	}
}
?>
