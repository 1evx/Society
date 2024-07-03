<?php
  include 'dbConn.php';
  include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/generalprofile.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="javascript/function.js" defer></script>
    <script src="https://kit.fontawesome.com/e3dc412ac7.js" crossorigin="anonymous"></script>
</head>
<body background="WhatsApp Image 2023-12-19 at 08.53.09.jpeg">
<header>
    <div class="leftheader" >
      <div>
        <a href="#">
          <img class="logoimg" src="image/logo1.png" alt="Society Logo">
        </a>
      </div>
      <div class="logotitle">
        <h1 style="font-family: 'Inter', sans-serif;"><a href="mainpage.php">Society Connect</a></h1>
      </div>
      <div class="navigationbar">
        <nav>
          <ul>
            <li><a href="mainpage.php" style="font-family: 'Inter', sans-serif;">Home</a></li>
            <li><a href="jobfinder.php" style="font-family: 'Inter', sans-serif;">Job Finder</a></li>
            <li><a href="skillsync.php" style="font-family: 'Inter', sans-serif;">Skill Sync</a></li>
            <li><a href="event.php" style="font-family: 'Inter', sans-serif;">Event</a></li>
            <li><a href="about.php" style="font-family: 'Inter', sans-serif;">About us</a></li>
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
   
   <main>
    <div class="container">
        <div class="white_box"> 
          <div class="logo-container">
            <img src="image/logo1.png" class="logo">
            <span class="logo-text">Society Connect </span>
            </div>
                <div class="main-content">
                    <a href="profile1.php" class="n-content"><i class="fa-solid fa-user"></i>User Info</a>
                    <a href="profile2.php" class="n-content"><i class="fa-solid fa-briefcase"></i>Job Finder</a>
                    <a href="profile3.php" class="n-content"><i class="fa-solid fa-layer-group"></i>Skill Sync</a>
                    <a href="profile4.php" class="n-content"><i class="fa-solid fa-calendar-minus"></i>Event</a>
                    <a href="profile5.php" class="n-content"><i class="fa-solid fa-address-card"></i>Post</a>
                    <a href="profile6.php" class="n-content"><i class="fa-solid fa-gear"></i>Setting</a>    
                </div>
                <a href="" class="log-out" onclick="logout()"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log Out</a>
            </div>
      
        <div class="light_box">
            <div class="border1">Bookmarked Event
                <hr class="line">
                <div class="inside-border-1">
                  <?php getSavedEvent() ?>
                </div>
            </div>
            
            <div class="border2">Posted Event 
                <hr class="line">
                <div class="inside-border-1">
                  <?php getPostEvent() ?>
                </div>
            </div>
            </div>
        </div>
    </main>
  <script src="javascript/header.js"></script>
</body>
</html>