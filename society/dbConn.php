<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'society';

    $connection = mysqli_connect($server, $user, $password, $database);

    if($connection === false){
        die('Database connection failed' . mysqli_connect_error($connection));
    }
?>