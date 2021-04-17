<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	
    <?php include('Header.php');?>
	<form method="post" action="Dashboard.php" enctype="multipart/form-data">
		<fieldset style="margin-left: 35px">
			<legend><b>LOGIN</b></legend>
			<label>User ID:</label>
			<input type="text" name="uid" required value="<?php if (isset($_COOKIE["userid"])){echo $_COOKIE["userid"];}?>"><br><br>
    		<label>Password:</label>
    		<input type="password" name="password" required value="<?php if (isset($_COOKIE["password"])){echo $_COOKIE["password"];}?>"><br><br>
    		<input type="checkbox" name="remember" <?php if (isset($_COOKIE["userid"]) && isset($_COOKIE["password"])){ echo "checked";}?>>Remember Me<br><br>
    		<input type="submit" name="submit" value="Submit">
    		<a href="ForgetPassword.php">Forgot Password?</a>
		</fieldset>
	</form>
    <?php include('Footer.php');?>
</body>
</html>