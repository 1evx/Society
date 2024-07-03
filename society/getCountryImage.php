<?php
    include 'dbConn.php';

    global $connection;

    $str = isset($_GET['q']) ? intval(mysqli_real_escape_string($connection, $_GET['q'])) : 0;

    if ($str > 0) {
        $query = "SELECT imagesource FROM country WHERE countryid = '$str'";
        $result = mysqli_query($connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $imagesource = htmlspecialchars($row['imagesource'], ENT_QUOTES, 'UTF-8');
            echo $imagesource; // Echo the image source
        } else {
            echo "NULL";
        }
        mysqli_close($connection);
    } 
?>