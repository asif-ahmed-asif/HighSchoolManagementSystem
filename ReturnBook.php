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
	<form method="post" action="Controller/Return.php">
		<fieldset>
			<legend><b>ISSUE BOOKS</b></legend>
			<label>Book ID:</label>
      		<input type="text" name="bid" required><br>
      		<label>User Name:</label>
      		<input type="text" name="uname" required><br>
      		<label>Return Date:</label>
      		<input type="Date" name="rdate" required><br><br><br>
      		<input type="submit" name="submit" value="Submit">
      		<input type="reset" name="reset" value="Reset">

		</fieldset>
    </form>
</body>
</html>