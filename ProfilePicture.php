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
</head>
<body>
<fieldset>
    <legend><b>PROFILE PICTURE</b></legend>
    <form action="" method="POST">

        <table>

            <tr>
                <td><img src="image/icon2.png" width="157" height="173"><br></td>
            </tr>

            <tr>
                <td><input name="image" type="file"><span class="error"></span><br></td>
            </tr>

        </table>
        <hr/>
        <input type="submit" name="submit" value="Submit" style="width: 60px">
        
    </form>
</fieldset>

</body>
</html>