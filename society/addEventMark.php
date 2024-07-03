<?php
    include 'dbConn.php';
    include 'function.php';

    global $connection;
    $eventid = isset($_POST['q']) ? urldecode($_POST['q']) : '';

    if (!empty($_SESSION['email']) || !empty($_SESSION['password'])) {
        $email =  $_SESSION['email'];
        $password = $_SESSION['password'];
        $query = "SELECT * FROM user;";
        $result = mysqli_query($connection, $query);
        
        if($result){
            $data = array(); // Initialize an array to store the fetched data

            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;

                $emaildata = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
                $passworddata = htmlspecialchars($row['password'], ENT_QUOTES, 'UTF-8');

                if($email == $emaildata && $password == $passworddata){
                    $userid = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                }
            }
        }
        
        $query = "INSERT INTO `savedevent`(`eventid`,`userid`,`isPin`) VALUES($eventid,$userid,'1')";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        echo 'sucess';
        
    } else {
        echo 'fail';
    }
?>