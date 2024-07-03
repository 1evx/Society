<?php 
    include 'dbConn.php';
    include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="css/profile1.css">
    <link rel="stylesheet" href="css/adminheader.css">
    <script src="javascript/function.js" defer></script>
    <script src="https://kit.fontawesome.com/e3dc412ac7.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: ghostwhite;">
    <header>
        <div class="leftheader" >
        <div>
            <a href="#">
            <img class="logoimg" src="image/logo1.png" alt="Society Logo">
            </a>
        </div>
        <div class="logotitle">
            <h1 style="font-family:'Inter',sans-serif;"><a href="mainpage.php">Society Connect</a></h1>
        </div>
        <div class="navigationbar">
            <nav>
            <ul>
                <li><a href="mainpage.php" style="font-family:'Inter',sans-serif;">Home</a></li>
                <li><a href="jobfinder.php" style="font-family:'Inter',sans-serif;">Job Finder</a></li>
                <li><a href="skillsync.php" style="font-family:'Inter',sans-serif;">Skill Sync</a></li>
                <li><a href="event.php" style="font-family:'Inter',sans-serif;">Event</a></li>
                <li><a href="about.php" style="font-family:'Inter',sans-serif;">About us</a></li>
            </ul>
            </nav>
        </div>
        </div>
        
        <div class="rightheader">
        <div class="Notification">
            <div class="button1">
                <i id="icon1" class="fa-solid fa-bell"></i>
            </div>
        </div>
        
        <div class="RegisterButton">
            <div class="select-list">
            <div class="profile-btn3">
                <div class="profile">
                <i id="icon2" class="fa-solid fa-user"></i>
                </div>
                <div class="cancel">
                <i class="fa-solid fa-xmark"></i>
                </div>
            </div>

            <ul class="opts">
                <li class="opt" onclick="redirectToSignIn()">
                <span class="opt-text">Login</span>
                </li>
                <li class="opt" onclick="redirectWhenLogin('profile1.php')">
                    <span class="opt-text">Profile</span>
                </li>
                <li class="opt" onclick="logout()">
                    <span class="opt-text">Log Out</span>
                </li>
            </ul>
            </div>
        </div>
        </div>
    </header>
   
   <main>
        <?php getAdminProfile(); ?>
   </main>
   <script src="javascript/header.js"></script>
</body>
</html>