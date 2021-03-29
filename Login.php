<!DOCTYPE html>
<html>
<head>
<style>
</style>
</head>
<body>
	
    <?php include('Header.php');?>
	<form method="post" action="Dashboard.php" enctype="multipart/form-data">
		<fieldset>
			<legend><b>LOGIN</b></legend>
			<label>User ID:</label>
			<input type="text" name="uid" value="<?php if (isset($_COOKIE["userid"])){echo $_COOKIE["userid"];}?>"><br>
    		<label>Password:</label>
    		<input type="password" name="password" value="<?php if (isset($_COOKIE["password"])){echo $_COOKIE["password"];}?>"><br>
    		<input type="checkbox" name="remember" <?php if (isset($_COOKIE["userid"]) && isset($_COOKIE["password"])){ echo "checked";}?>>Remember Me<br><br>
    		<input type="submit" name="submit" value="Submit">
    		<a href="ForgetPassword.php">Forgot Password?</a>
		</fieldset>
	</form>
    <?php include('Footer.php');?>
</body>
</html>