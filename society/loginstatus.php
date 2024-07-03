<?php
    session_start();

    $response = ['loggedIn' => false];

    if (isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['usertype'])) {
        $response['loggedIn'] = true;
        $response['userType'] = $_SESSION['usertype'];
    }

    echo json_encode($response);
?>