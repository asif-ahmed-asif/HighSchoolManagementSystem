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


    if(isset($_POST["submit"])){
        $data['uid'] = $rows['uid'];
        $data['picture'] = basename($_FILES["picture"]["name"]);

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["picture"]["name"]);
        move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

        include 'Controller/ProfilePictureChange.php';
        PictureChange($data);
        header('location:ProfilePicture.php');
    }
?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
<fieldset>
    <legend><b>PROFILE PICTURE</b></legend>
    <form method="post"  enctype="multipart/form-data">

        <table>

            <tr>
                <td><img src="uploads/<?php echo $rows["picture"] ?>" alt="<?php echo $rows["name"] ?>" width="157" height="173"><br></td>
            </tr>

            <tr>
                <td><input name="picture" type="file" required><span class="error"></span><br></td>
            </tr>

        </table>
        <hr/>
        <input type="submit" name="submit" value="Change" style="width: 60px">
        
    </form>
</fieldset>

</body>
</html>