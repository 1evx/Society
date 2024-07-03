<?php
    include 'dbConn.php';
    global $connection;

    $tablename = isset($_POST['q1']) ? urldecode($_POST['q1']) : '';
    $primarycolumn = isset($_POST['q2']) ? urldecode($_POST['q2']) : '';
    $id = isset($_POST['q3']) ? urldecode($_POST['q3']) : '';

    $query = "DELETE FROM $tablename WHERE $primarycolumn = '$id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
?>