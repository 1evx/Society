<?php
  include 'dbConn.php';
  include 'function.php';

  global $connection;
  $firstname = isset($_POST['txtfname']) ? $_POST['txtfname'] : "";
  $lastname = isset($_POST['txtlname']) ? $_POST['txtlname'] : "";
  $age = isset($_POST['intage']) ? $_POST['intage'] : "";
  $gender = isset($_POST['txtgender']) ? $_POST['txtgender'] : "";
  $email = isset($_POST['txtemail']) ? $_POST['txtemail'] : "";
  $password = isset($_POST['txtpassword']) ? $_POST['txtpassword'] : "";
  $country = isset($_POST['txtcountry']) ? $_POST['txtcountry'] : "";
  $reference = isset($_POST['txtreference']) ? $_POST['txtreference'] : "";

  if (isset($_POST['btnSignUp']) && $_POST['txtfname'] != "" && $_POST['txtlname'] != "" && $_POST['intage'] != "" && $_POST['txtgender'] != "" && $_POST['txtemail'] != "" && $_POST['txtpassword'] != "" && $_POST['txtcountry'] != "" && $_POST['txtreference'] != "") {

    // Check email existence
    $query = "SELECT email FROM user";
    $result = mysqli_query($connection, $query);
    $verifyStatus = true;

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $emaildata = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
            if ($email === $emaildata) {
                $verifyStatus = false;
                break;
            }
        }
    }

    if ($verifyStatus && $emaildata != $email) {
        // Insert profile image
        if (!empty($_FILES["profile"]["name"])) {
            $filename = $_FILES["profile"]["name"];
            $tempname = $_FILES["profile"]["tmp_name"];
            $folder = "./userdata/" . $filename;
            $formattedprofile = "userdata/" . $filename;
            if (move_uploaded_file($tempname, $folder)) {
                $insertQuery = "INSERT INTO `profile` (`name`, `source`) VALUES ('userprofile', '$formattedprofile')";
                if (mysqli_query($connection, $insertQuery)) {
                    $profileid = mysqli_insert_id($connection); 
                } else {
                    echo '<script>';
                    echo 'window.alert("Failed to insert profile image.");';
                    echo '</script>';
                }
            } else {
                echo '<script>';
                echo 'window.alert("Failed to upload User Profile! Please Insert The Image In PNG, JPG, JPEG");';
                echo '</script>';
            }
        }

        // Insert banner image
        if (!empty($_FILES["banner"]["name"])) {
            $filename = $_FILES["banner"]["name"];
            $tempname = $_FILES["banner"]["tmp_name"];
            $folder = "./userdata/" . $filename;
            $formattedfilename = "userdata/" . $filename;
            if (move_uploaded_file($tempname, $folder)) {
                $query = "INSERT INTO `banner` (`name`, `source`) VALUES ('userbanner', '$formattedfilename')";
                if (mysqli_query($connection, $query)) {
                    $bannerid = mysqli_insert_id($connection);
                } else {
                    echo '<script>';
                    echo 'window.alert("Failed to insert banner image.");';
                    echo '</script>';
                }
            } else {
                echo '<script>';
                echo 'window.alert("Failed to upload User Banner! Please Insert The Image In PNG, JPG, JPEG");';
                echo '</script>';
            }
        }

        // Insert user data
        $query = "INSERT INTO `user`(`firstname`, `lastname`, `email`, `password`, `gender`, `age`, `userjobtitle`, `countryid`, `bannerid`, `profileid`) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($connection, $query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssssssss", $firstname, $lastname, $email, $password, $gender, $age, $reference, $country, $bannerid, $profileid);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo '<script>';
                echo 'window.alert("User Account registered successfully!");';
                echo 'window.location.href = "/society/signin.php";';
                echo '</script>';
            } else {
                echo '<script>';
                echo 'window.alert("Error in SQL statement.");';
                echo 'window.location.href = "/society/signup.php";';
                echo '</script>';
            }
            mysqli_stmt_close($stmt);
        } else {
            echo '<script>';
            echo 'window.alert("Error in preparing SQL statement.");';
            echo 'window.location.href = "/society/signup.php";';
        }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="javascript/signup.js"></script>
    <script src="javascript/function.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5db5f39d3a.js" crossorigin="anonymous"></script>
</head>
<body>
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

    <form action="#" method="POST" enctype="multipart/form-data">
        <main>
            <div class="ContainerBox">
                <div class="cornerbox"></div>
                <div class="MainBox">
                    <div class="TopBox">
                        <img src="image/logo1.png" alt="Logo" class="logo-img">
                        <h2>Create Account</h2>
                        <h5>Unlock Your Potential - Welcome To Society Connect</h5>
                        <div class="social-button">
                            <div class="GoogleButton" onclick="googleSignIn()">
                                <div class="icon"><img src="image/google.png" alt="Google Icon"></div>
                                <div class="text">Google</div>
                            </div>

                            <div class="FacebookButton" onclick="facebookSignIn()">
                                <div class="icon"><img src="image/facebook2.png" alt="Facebook Icon"></div>
                                <div class="text">Facebook</div>
                            </div>
                        </div>
                        <div class="line1"></div>
                        <h4>Or Continue With</h4>
                        <div class="line2"></div>
                    </div>

                    <div class="BottomBox">
                        <div class="InputContainer">
                            <div class="InputBox">
                                <label for="FirstName"></label>
                                <input type="text" id="firstName" placeholder="FirstName" name="txtfname" required>
                                <icony class="fa-solid fa-user"></icony>
                            </div>
                            <div class="InputBox">
                                <label for="LastName"></label>
                                <input type="text" id="lastName" placeholder="LastName"  name="txtlname" required>
                                <icony class="fa-solid fa-user"></icony>
                            </div>
                            <div class="InputBox">
                                <label for="Age"></label>
                                <input type="number" id="Age" placeholder="Age" name="intage" required>
                                <icony class="fa-solid fa-image-portrait"></icony>
                            </div>
                            <div class="InputBox">
                                <label for="Gender"></label>
                                <select type="Gender" class="GenderList" name="txtgender" required>
                                    <option value="" disabled selected>-- Select Gender --</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <icony class="fa-solid fa-user"></icony>
                            </div>
                            <div class="InputBox">
                                <label for="Email"></label>
                                <input type="email" id="email" placeholder="Email" name="txtemail" required>
                                <icony class="fa-solid fa-envelope" id="EmailIcon"></icony>
                            </div>
                            <div class="InputBox">
                                <label for="country"></label>      
                                <select id="country" class="CountryList" name="txtcountry" required>
                                    <option value=""disabled selected>-- Select Country --</option>
                                    <?php printCountry() ?>
                                </select>
                                <icony class="fa-solid fa-flag" id="CountryIcon"></icony>
                            </div>
                            <div class="InputBox">
                                <label for="Password"></label>
                                <input type="password" id="Password" placeholder="Password" name="txtpassword" required>
                                <icony class="fa-solid fa-lock" id="lockicon"></icony>
                                <span class="password-toggle" onclick="PasswordVisibility()">
                                    <ii id="eye-icon" class="fa-solid fa-eye-slash"></ii>
                                </span>
                            </div>
                            <div class="InputBox">
                                <label for="State"></label>
                                <select type="State" id="State" name="txtreference" required>
                                    <option value="" disabled selected>-- Select Job Reference --</option>
                                    <?php printJobName() ?>
                                </select>
                                <icony class="fa-regular fa-flag" id="StateIcon"></icony>
                            </div>
                            <div class="InputBox">
                              <div>
                                <p id="BannerTitle">Update Banner Image</p>
                                <label for="Banner"></label>
                                <input id="Banner" type="file" accept="image/jpeg, image/png, image/jpg" name="banner">
                              </div>
                            </div>
                            <div class="InputBox">
                              <div>
                                <p id="ProfileTitle">Update Profile Image</p>
                                <label for="Profile"></label>
                                <input id="Profile" type="file" accept="image/jpeg, image/png, image/jpg" name="profile">
                              </div>
                            </div>
                            <input class="SignUpButton" type="submit" value="Sign Up" name="btnSignUp"></input>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </form>
</body>
<script src="javascript/header.js"></script>
</html>