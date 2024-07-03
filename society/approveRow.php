<?php
    include 'dbConn.php';
    global $connection;
    session_start();

    $email =  $_SESSION['email'];
    $password = $_SESSION['password'];
    $query = "SELECT * FROM admin;";
    $result = mysqli_query($connection, $query);
    
    if($result){
        $data = array(); 

        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;

            $emaildata = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
            $passworddata = htmlspecialchars($row['password'], ENT_QUOTES, 'UTF-8');

            if($email == $emaildata && $password == $passworddata){
                $adminid = htmlspecialchars($row['adminid'], ENT_QUOTES, 'UTF-8');
                break;
            }
        }
    } 

    $tablename = isset($_POST['q1']) ? urldecode($_POST['q1']) : '';
    $primarycolumn = isset($_POST['q2']) ? urldecode($_POST['q2']) : '';
    $id = isset($_POST['q3']) ? urldecode($_POST['q3']) : '';

    $query = "UPDATE $tablename SET adminid = '$adminid' WHERE $primarycolumn = '$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Post Approved";
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
?>