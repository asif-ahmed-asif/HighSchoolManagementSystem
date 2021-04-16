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
    <title>Profile Picture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<fieldset>
    <legend><b>PROFILE PICTURE</b></legend>
    <form method="post"  enctype="multipart/form-data">

        <table>

            <tr>
                <td><img src="uploads/<?php echo $rows["picture"] ?>" alt="<?php echo $rows["name"] ?>" width="250" height="300"><br></td>
            </tr>

            <tr>
                <td><input name="picture" type="file" required><span class="error"></span><br></td>
            </tr>

        </table>
        <hr/>
        <input type="submit" name="submit" value="Change" style="width: 100px">
        
    </form>
</fieldset>

</body>
</html>