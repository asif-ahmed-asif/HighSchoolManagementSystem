<?php
    include 'Controller/DataView.php';
    $rows = ViewData($_SESSION['userid']);
  ?>

<table width="80%" align="center" cellspacing="0" cellpadding="10" border="1">
    <tr>
        <td colspan="2" valign="middle" height="70">  
			<table width="100%">
                <tr>
                    <td>
                        <a href="PublicHome.php"><img height="55" src="image/icon.png"></a>
                    </td>
                    <td align="right">

                    Logged in as <a href="Dashboard.php"><?php echo $rows['name'] ?></a>&nbsp;|
                        <a href="Controller/Logout.php">Logout</a>
                    </td>
                </tr>
			</table>
        </td>
    </tr>
    <tr>