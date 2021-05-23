<?php include "header1.php";?>
<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">

<?php include "Sidebar.php";?>

<?php

require_once '../../../Controller/teacherInfo.php';
$valueToSearch='';

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $teachers  = filterTable($valueToSearch);  
}
else
{
    $teachers  = fetchAllTeachers();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search Teacher</title>
        <style>
            table, th, td ,tr 
            {
                border: 2px solid ;
                border-collapse: collapse;
                padding: 1%
            }
            .text
            {
                text-align: center;
            }
        </style>
    </head>
    <body>

    <form action="searchTeacher.php" method="post">
        <fieldset style="width: 96%;">
            <legend class="text"><b>SEARCH TEACHER</b></legend>
            <center><input class="text" type="text" name="valueToSearch" placeholder="Value To Search" value=<?php echo $valueToSearch ?>>
            <input type="submit" name="search" value="Search by Name"><br><br>
            
            <table>
                <thead>
                    <tr>
                        <th><b>Name</th>
                        <th><b>Father Name</th>
                        <th><b>Mother Name</th>
                        <th><b>Address</th>
                        <th>Email<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th>Gender<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th><b>Date Of Birth<?php echo '&nbsp&nbsp';?></th>
                        <th colspan="2"></b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teachers as $i => $teacher): ?>
                        <tr>
                            <td><?php echo $teacher['name'] ?></td>
                            <td><?php echo $teacher['fname'] ?></td>
                            <td><?php echo $teacher['mname'] ?></td>
                            <td><?php echo $teacher['address'] ?></td>
                            <td><?php echo $teacher['email'] ?><?php echo '&nbsp&nbsp&nbsp';?></td>
                            <td><?php echo $teacher['gender'] ?></td>
                            <td><?php echo $teacher['dob'] ?></td>
                            
                            <td><a href="editTeacher.php?id=<?php echo $teacher['uid']?>">Edit<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp';?></a></td>

                            <td><a href="deleteTeacher.php?id=<?php echo $teacher['uid'] ?>">Delete<?php echo '&nbsp&nbsp&nbsp&nbsp&nbsp';?></a></td>
                            
                        </tr>
                        <?php endforeach; ?>
                </tbody>

            </table>
            <br>
            <button type="submit" formaction="../Logged_In_Dashboard.php">Back</button>
        </fieldset>
        </form>
    </body>
</html>