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


    require_once 'controller/ViewCard.php';
    $cards = ShowCards();
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Cards</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
      <h1>Issued Cards</h1><hr>
      <table class="w3-table-all w3-hoverable">
                <thead>
                    <tr class="w3-blue">
                        <th><b>Student Name<?php echo '&nbsp&nbsp&nbsp';?></th>
                        <th>Student ID<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th>Class<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th colspan="2"></b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cards as $i => $card): ?>
                        <tr>
                            <td><?php echo $card['name'] ?></td>
                            <td><?php echo $card['id'] ?></td>
                            <td><?php echo $card['class'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
    </form>
</body>
</html>