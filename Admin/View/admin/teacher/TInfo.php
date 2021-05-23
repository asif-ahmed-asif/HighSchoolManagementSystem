<!DOCTYPE html>
<html>
<head>
<style>
#customers
{
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  table-layout: fixed;
}

#customers td, #customers th
{
  border: 1px solid #ddd;
  padding: 8px;
  table-layout: fixed;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
  table-layout: fixed;
}
</style>



<table id="customers">
  <tr>
    <th>Teacher ID</th>
    <th>Name</th>
    <th>Subject</th>
  </tr>

<?php
$q = $_GET['q'];

$con = mysqli_connect('localhost','root','','school');
if (!$con) 
{
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT distinct u.name, e.uid, e.subject FROM allsubjects AS e INNER JOIN teacher AS u ON e.uid = u.uid WHERE subject = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result))
{
  echo "<tr>";
  echo "<td>" . $row['uid'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['subject'] . "</td>";
  echo "</tr>";
}

mysqli_close($con);
?>

</body>
</html>