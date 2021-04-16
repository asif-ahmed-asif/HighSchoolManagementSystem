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


    require_once 'controller/BookInfo.php';

    if(isset($_POST['search']))
    {
        $bname = $_POST['bname'];
        $books  = FilterTable($bname);  
    }
    else
    {
        $books  = FetchAllBooks();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Find Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
	<form method="post" action="FindBook.php">
      <h1>SEARCH BOOKS</h1><hr>
      <label>Book Name:</label>
      <input type="text" name="bname" required> &emsp;

      <input type="submit" name="search" value="Search"><br><br><hr>

      <table class="w3-table-all w3-hoverable">
                <thead>
                    <tr class="w3-blue">
                        <th><b>Book Name<?php echo '&nbsp&nbsp&nbsp';?></th>
                        <th>Book ID<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th>Author<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th>Category<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th>Status<?php echo '&nbsp&nbsp&nbsp&nbsp';?></th>
                        <th colspan="2"></b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($books as $i => $book): ?>
                        <tr>
                            <td><?php echo $book['bname'] ?></td>
                            <td><?php echo $book['bid'] ?></td>
                            <td><?php echo $book['author'] ?></td>
                            <td><?php echo $book['category'] ?></td>
                            <td><?php echo $book['status'] ?></td>
                            <td><a href="EditBook.php?bid=<?php echo $book['bid']?>">edit<?php echo '&nbsp&nbsp&nbsp';?></a></td>
                            <td><a href="DeleteBook.php?bid=<?php echo $book['bid'] ?>">delete<?php echo '&nbsp&nbsp&nbsp';?></a></td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
    </form>
</body>
</html>