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
</head>
<body>

<fieldset>
    <legend><b>PROFILE</b></legend>
	<form>
		
		<br/>
		<table cellpadding="0" cellspacing="0">
			<tr>

				<td>Name</td>
				<td>:</td>
				<td><?php echo $rows["name"];?></td>

				<td rowspan="10" align="center">
					<img width="157" height="173" src="uploads/<?php echo $rows["picture"] ?>" alt="<?php echo $rows["name"] ?>"/><br/>
                    <br/>
				</td>
			</tr>

			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo $rows["email"];?></td>
			</tr>

			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td><?php echo $rows["gender"];?></td>
			</tr>

			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Date of Birth</td>
				<td>:</td>
				<td><?php echo $rows["dob"];?></td>
			</tr>
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td><?php echo $rows["address"];?></td>
			</tr>
		</table>	
        <hr/>
        <a href="EditProfile.php">Edit Profile</a>	
	</form>
</fieldset>

</body>
</html>