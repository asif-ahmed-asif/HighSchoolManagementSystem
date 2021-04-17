<?php
	session_start();
	if (isset($_SESSION['userid'])) 
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
<style>
.error {color: #FF0000;}
</style>
<title>Change Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<?php
	include '../Controller/LoginDetails.php';
    $row = LoginData($_SESSION['userid']);
	$currentPass = $row['password'];
	$newPass = $reType = $currentPass1 = $message = "";
	$currentPassErr = $newPassErr = $reTypeErr = "";
	$check = 1;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["current"])) {
			$currentPassErr = "Current password field is empty";
			$check = 0;
		}else {
			$currentPass1 = $_POST["current"];
			if(strcmp($currentPass, $currentPass1)) {
				$currentPassErr = "Current password does not match";
				$check = 0;
			}
		}

		if (empty($_POST["new"])) {
			$newPassErr = "New password field is empty";
			$check = 0;
		}else {
			$newPass = $_POST["new"];
			if(!strcmp($newPass, $currentPass1)) {
				$newPassErr = "Can't be same as current password";
				$check = 0;
			}
		}

		if (empty($_POST["retype"])) {
			$reTypeErr = "Retype New password field is empty";
			$check = 0;
		}else {
			$reType = $_POST["retype"];
			if(strcmp($newPass, $reType)) {
				$reTypeErr = "Must match with new password";
				$check = 0;
			}
		}

	}




	if(isset($_POST["submit"])){
		if($check == 1) {
			$data['uid'] = $rows['uid'];
			$data['password'] = $_POST["retype"];

			include '../Controller/PasswordChange.php';

			if (ChangePass($data)) {

				$message = "Password has been changed!";
				header('location:ChangesPassword.php');
			}
		}
		


	}
	?>

	<form method="post"  enctype="multipart/form-data">
		<fieldset>
			<legend><b>CHANGE PASSWORD</b></legend>
			 <table>
	            <tr>
	                <td>Current Password</td>
	                <td>:</td>
	                <td><input type="password" name="current" ><span class="error"><?php echo $currentPassErr;?></span><br></td>
	            </tr>

	            <tr>
                <td><span style="color: green">New Password</span></td>
                <td>:</td>
                <td><input type="password" name="new" ><span class="error"><?php echo $newPassErr;?></span><br>
            </tr>

            <tr>
                <td><span class="error">Retype New Password</span></td>
                <td>:</td>
                <td><input type="password" name="retype" ><span class="error"><?php echo $reTypeErr;?></span><br>
            </tr>

        </table>
        <hr/>
        <input type="submit" name="submit" value="Change" style="width: 100px"><br>
        <?php echo $message; ?>

		</fieldset>
	</form>

</body>
</html>