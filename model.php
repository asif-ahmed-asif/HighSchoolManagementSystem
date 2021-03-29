<?php 

require_once 'db_connect.php';

function UserId()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT uid FROM `login` ORDER BY uid DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['uid'];
    if ($lastid == null) {
        return "USER1";
    }else{
        $temp = substr($lastid, 4);
        $temp1 = intval($temp);
        return "USER".($temp1 + 1);
    }
}

function AddIntoLogin($login)
{
    $conn = db_conn();
    $selectQuery = "INSERT into login (uid, password, type, status)
VALUES (:uid, :password, :type, :status)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':uid' => $login['uid'],
            ':password' => $login['password'],
            ':type' => $login['type'],
            ':status' => $login['status']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
}

function AddIntoLibrarian($librarian)
{
    $conn = db_conn();
    $selectQuery = "INSERT into librarian (uid, name, email, dob, address, gender, picture)
VALUES (:uid, :name, :email, :dob, :address, :gender, :picture)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':uid' => $librarian['uid'],
            ':name' => $librarian['name'],
            ':email' => $librarian['email'],
            ':dob' => $librarian['dob'],
            ':address' => $librarian['address'],
            ':gender' => $librarian['gender'],
            ':picture' => $librarian['picture']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
}

function Logins($userid, $pass)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT * FROM `login` WHERE uid ='$userid' && password ='$pass'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    return $row;
}

function View($id)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT * FROM `librarian` WHERE uid ='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    return $row;
}

function DataUpdate($data){
    $conn = db_conn();
    $selectQuery = "UPDATE librarian set name = ?, email = ?, dob = ?, address = ?, gender = ? where uid = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['email'], $data['dob'], $data['address'], $data['gender'], $data['uid']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function PictureUpdate($data){
    $conn = db_conn();
    $selectQuery = "UPDATE librarian set picture = ? where uid = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['picture'], $data['uid']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
}

function PassUpdate($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE login set password = ? where uid = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['password'], $data['uid']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
}

function ViewLogin($id)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "school";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT * FROM `login` WHERE uid ='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    return $row;
}

function showAllStudents(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `user_info` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showStudent($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `user_info` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchUser($user_name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `user_info` WHERE Username LIKE '%$user_name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addStudent($data){
	$conn = db_conn();
    $selectQuery = "INSERT into user_info (Name, Surname, Username, Password, image)
VALUES (:name, :surname, :username, :password, :image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':surname' => $data['surname'],
        	':username' => $data['username'],
        	':password' => $data['password'],
        	':image' => $data['image']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateStudent($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set Name = ?, Surname = ?, Username = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['surname'], $data['username'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteStudent($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `user_info` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}