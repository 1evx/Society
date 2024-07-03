<?php
  include 'dbConn.php';
  include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="javascript/function.js" defer></script>
  <link rel="stylesheet" href="css/about.css">
  <link rel="stylesheet" href="css/header.css">
  <script src="https://kit.fontawesome.com/0b02c7455f.js" crossorigin="anonymous"></script>
  <title>Skill Sync</title>
</head>
<body>
    <!--Navigation Bar-->
    <header>
        <div class="leftheader" >
        <div>
            <a href="#">
            <img class="logoimg" src="image/logo1.png" alt="Society Logo">
            </a>
        </div>
        <div class="logotitle">
            <h1 style="font-family: 'Inter',sans-serif;"><a href="mainpage.php">Society Connect</a></h1>
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
                <li class="opt" onclick="redirectWhenLogin('postjob.php')">
                    <span class="opt-text">Post Job</span>
                </li>
                <li class="opt" onclick="redirectWhenLogin('postevent.php')">
                    <span class="opt-text">Post Event</span>
                </li>
                <li class="opt" onclick="redirectWhenLogin('postlesson.php')">
                    <span class="opt-text">Post Course</span>
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
    <div class="blueground">
            <!-- 4 main option -->
        <button class="button active" id="About" onclick="printAbout()">ABOUT</button>
        <button class="button" id="Faq" onclick="printFaq()">FAQ</button>
        <button class="button" id="Policy" onclick="printPolicy()">POLICY</button>
        <button class="button" id="Term" onclick="printTerm()">TERM</button>

            <div class="GreyShadow"></div>
            <div class="WhiteContent">
                <img class="content">
                    <br><br>
                    <h1 class="Title">About Society Connect</h1>
                    <h2 class="SubTitle">Question and answer for Society Connect</h2>
                    <img class="TitleImage" src="image/world.png">

                    <!--Admin Section-->
                    <br><br><br><img class="AdminImage" src="image/default_profile2.png"><p class="AdminTitle">Our Admin</p>
                    <div class="AdminUnderline"></div>

                    <div class="AdminContainer">
                        <!--Admin PHP-->
                        <img id="AdminProfile" src="image/default_profile2.png">
                        <p id="AdminName">John</p>
                        <img id="AdminProfile" src="image/default_profile2.png">
                        <p id="AdminName">Falcon</p>
                        <img id="AdminProfile" src="image/default_profile2.png">
                        <p id="AdminName">Johnny</p>
                        <img id="AdminProfile" src="image/default_profile2.png">
                        <p id="AdminName">Miles</p>
                    </div>

                    <!--Moderator Section-->
                    <img class="ModeratorImage" src="image/default_profile2.png">
                    <p class="ModeratorTitle">Our Moderator</p>
                    <div class="AdminUnderline"></div>
                        <div class="ModeratorContainer">
                            <!--Moderator PHP-->
                            <img id="ModeratorProfile" src="image/default_profile2.png">
                            <p id="ModeratorName">Desmond</p>
                        </div>
                </div>
            </img>
        </div>
    </div>
    <script src="javascript/header.js" defer></script>
</body>
</html>