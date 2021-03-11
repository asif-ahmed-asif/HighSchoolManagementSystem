<?php
	session_start();
	if (isset($_SESSION['uname'])) 
	{

		include "LoginHeader.php";
		include "Sidebar.php";
	}
	else
	{
		echo "<script>alert(Username or Password incorrect!)</script>";
		echo "<script>location.href='Login.php'</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Find Book</title>
</head>
<body>
	<form method="post" action=>
      <h1>SEARCH BOOKS</h1>
      <label>Book Name:</label>
      <input type="text" name="bname" required> &emsp;
      <label>Author:</label>
      <input type="text" name="bname" required> &emsp;

      <input type="submit" name="search" value="Search">
    </form>
</body>
</html>