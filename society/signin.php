<?php
  session_start();
  include "dbConn.php";

  global $connection;
  $email = isset($_POST['txtemail']) ? $_POST['txtemail'] : "";
  $password = isset($_POST['txtpassword']) ? $_POST['txtpassword'] : "";

  if (isset($_POST['btnSignIn']) && $email != "" && $password != "") {
      $query = "SELECT email, password, 'user' AS usertype FROM `user` 
                UNION 
                SELECT email, password, 'admin' AS usertype FROM `admin`";
      
      $result = mysqli_query($connection, $query);

      if ($result) {
          $matchFound = false;
          while ($row = mysqli_fetch_assoc($result)) {
              $emaildata = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
              $passworddata = htmlspecialchars($row['password'], ENT_QUOTES, 'UTF-8');
              $usertype = $row['usertype'];

              if ($email === $emaildata && $password === $passworddata) {
                  $matchFound = true;
                  $_SESSION['usertype'] = $usertype;
                  break; 
              }
          }

          if ($matchFound) {
              echo $_SESSION['usertype'];
              $_SESSION['email'] = $emaildata;
              $_SESSION['password'] = $passworddata;
              echo '<script>';
              echo 'window.alert("Login Success!");';
              echo 'window.location.href = "/society/mainpage.php";';
              echo '</script>';
          } else {
              echo '<script>';
              echo 'window.alert("Invalid Account, Please Try Again");';
              echo '</script>';
          }
      }
  } elseif (isset($_POST['btnSignIn']) && $email == "") {
      echo '<script>';
      echo 'window.alert("Please Enter Your Email");';
      echo '</script>';
  } elseif (isset($_POST['btnSignIn']) && $password == "") {
      echo '<script>';
      echo 'window.alert("Please Enter Your Password");';
      echo '</script>';
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In Page</title>
  <link rel="stylesheet" href="css/signin.css">
  <link rel="stylesheet" href="css/header.css">
  <script src="javascript/function.js" defer></script>
  <script src="javascript/signin.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/5db5f39d3a.js" crossorigin="anonymous"></script>
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
        <h5 style="font-family: 'Inter', sans-serif;"><a href="mainpage.php">Society <br> Connect</a></h5>
      </div>
      <div class="navigationbar">
        <nav>
          <ul>
            <li><a href="mainpage.php" style="font-family:'Inter',sans-serif;">Home</a></li>
            <li><a href="jobfinder.php" style="font-family: 'Inter',sans-serif;">Job Finder</a></li>
            <li><a href="skillsync.php" style="font-family: 'Inter',sans-serif;">Skill Sync</a></li>
            <li><a href="event.php" style="font-family: 'Inter',sans-serif;">Event</a></li>
            <li><a href="about.php" style="font-family: 'Inter',sans-serif;">About us</a></li>
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

  <!--Sign In Form-->
    <form action="#" method="POST">   
        <div class="left-container">
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
        </div>

        <div class="right-container">
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
          <div class="slanted-line1"></div>
        </div>

        <main>
            <div class="container1">
            <div class="cornerbox"></div>
            <div class="whitebox">
                <div class="Loginframe"><h1>Account</h1><br/><h5>Let's Get You Signed In! Gather up with the society!</h5>
                    
                    <div class="InputBox">
                    <div class="IconContainer">
                      <input type="text" id="email" placeholder="Email" name="txtemail" value="" autocomplete="off">
                      <i class="fa-regular fa-envelope"></i>
                    </div>
                    </div>
                    
                    <div class="InputBox">
                    <div class="IconContainer">
                      <input type="password" id="password" placeholder="Password" name="txtpassword" value="" autocomplete="off">
                      <ii class="fa-solid fa-lock"></ii>
                      <span class="password-toggle" onclick="PasswordVisibility()">
                      <i id="eye-icon" class="fa-solid fa-eye-slash"></i>
                      </span>
                    </div>
                    </div>
                    

                    <div class="Remember">
                      <label for=""><input type="checkbox">Remember Me</label>
                      <a href="#" class="forgot_password">Forgot Password?</a>   
                    </div>

                    <div class="InputBox">
                      <input type="submit" value="SignIn" name="btnSignIn" id="SignInButton" placeholder="Sign In"></input>     
                    </div>
                    <div class="line1"></div>
                      <h4>Or Continue With</h4>
                    <div class="line2"></div>
                </div>

                <div class="social-button">
                    <div class="google-button" onclick="googleSignIn()">
                      <div class="icon"><img src="image/google.png" alt="Google Icon"></div>
                      <div class="text">Sign in with Google</div>
                    </div>
                    <div class="facebook-button" onclick="facebookSignIn()">
                      <div class="icon"><img src="image/facebook2.png" alt="Facebook Icon"></div>
                      <div class="text">Sign in with Facebook</div>
                    </div>
                    </div>
                </div>

                <div class="colourbox">
                  <img src="image/logo1.png" alt="Logo Description" class="societylogo">
                  <h1>Welcome To <br>Society Connect</h1>
                  <a href="signup.php" class="buttons">Sign Up</a>
                  <a href="signin.php" class="buttons">Sign In</a>
                </div>
            </div>
        </main>
    </form>
</body>
<script src="javascript/header.js"></script>
</html>