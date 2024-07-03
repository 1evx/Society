<?php
    session_start();
    session_destroy();
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    unset($_SESSION["usertype"]);
    $_SESSION = array();
    header('mainpage.php');
    exit;
 ?>