<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	    <script>
    	function ValidateForm(){  
			var id = document.login.uid.value;  
			var password = document.login.password.value;   
			  
			if (id==null || id==""){  
			  alert("ID can't be blank");  
			  return false;  
			}else if(password==null || password==""){  
			  alert("Password can't be blank");  
			  return false;  
			}

		}

		function CheckId() {
			if (document.getElementById("uid").value == "") {
			  	document.getElementById("idErr").innerHTML = "ID can't be blank";
			  	document.getElementById("idErr").style.color = "red";
			  	document.getElementById("uid").style.borderColor = "red";
			}else{
			  	document.getElementById("idErr").innerHTML = "";
				document.getElementById("uid").style.borderColor = "black";
			}
		}

			function CheckPass() {
			if (document.getElementById("password").value == "") {
			  	document.getElementById("passErr").innerHTML = "Password can't be blank";
			  	document.getElementById("passErr").style.color = "red";
			  	document.getElementById("password").style.borderColor = "red";
			}else{
			  	document.getElementById("passErr").innerHTML = "";
				document.getElementById("password").style.borderColor = "black";
			}
			}  


    </script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
	
    <?php include('Header.php');?>
	<form name="login" method="post" action="Dashboard.php" onsubmit="ValidateForm()" enctype="multipart/form-data">
		<fieldset style="margin-left: 35px">
			<legend><b>LOGIN</b></legend>
			<label>User ID:</label>
			<input type="text" name="uid" id="uid" onkeyup="CheckId()" onblur="CheckId()" value="<?php if (isset($_COOKIE["userid"])){echo $_COOKIE["userid"];}?>">
			<span id="idErr"></span><br><br>
    		<label>Password:</label>
    		<input type="password" name="password" id="password" onkeyup="CheckPass()" onblur="CheckPass()">
    		<span id="passErr"></span><br><br>
    		<input type="checkbox" name="remember" id="remember" <?php if (isset($_COOKIE["userid"])){ echo "checked";}?>>Remember Me<br><br>
    		<input type="submit" name="submit" value="Submit">
    		<a href="ForgetPassword.php">Forgot Password?</a>
		</fieldset>
	</form>
    <?php include('Footer.php');?>
</body>
</html>