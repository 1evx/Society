<?php 
    include 'dbConn.php';
    include 'function.php';

    global $connection;

    if (isset($_POST['btnUpdate']) ) {   
        
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
        $age = isset($_POST['age']) ? $_POST['age'] : "";
        $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $countryid = isset($_POST['country']) ? $_POST['country'] : "";
        $about = isset($_POST['about']) ? $_POST['about'] : "";
        $userjobtitle = isset($_POST['userjobtitle']) ? $_POST['userjobtitle'] : "";
        $userpreference = isset($_POST['userpreference']) ? $_POST['userpreference'] : "";
        $userevent = isset($_POST['userevent']) ? $_POST['userevent'] : "";
        
        if (!empty($_SESSION['email']) && !empty($_SESSION['password'])) {
            $email =  $_SESSION['email'];
            $password = $_SESSION['password'];
            $query = "SELECT * FROM user;";
            $result = mysqli_query($connection, $query);
            
            if($result){
                $data = array();
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $emaildata = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
                    $passworddata = htmlspecialchars($row['password'], ENT_QUOTES, 'UTF-8');
    
                    if($email == $emaildata && $password == $passworddata){
                        $userid = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                        break;
                    }
                }
            }
        }

        if($firstname != ""){
            $query = "UPDATE `user` SET `firstname` = '$firstname' WHERE `userid` = $userid ;";
            $result = mysqli_query($connection, $query);
        }
        if($lastname != ""){
            $query = "UPDATE `user` SET `lastname` = '$lastname' WHERE `userid` = $userid ;";
            $result = mysqli_query($connection, $query);
        }
        if($age != ""){
            $query = "UPDATE `user` SET `age` = $age WHERE `userid` = $userid ;";
            $result = mysqli_query($connection, $query);
        }
        if($gender != ""){
            $query = "UPDATE `user` SET `gender` = '$gender' WHERE `userid` = $userid ;";
            $result = mysqli_query($connection, $query);
        }
        if($email != ""){
            $query = "UPDATE `user` SET `email` = '$email' WHERE `userid` = $userid ;";
            $result = mysqli_query($connection, $query);
        }
        if($countryid != ""){
            $query = "UPDATE `user` SET `countryid` = '$countryid' WHERE `userid` = $userid ;";
            $result = mysqli_query($connection, $query);
        }
        if($about != ""){
            $query = "UPDATE `user` SET `about` = '$about' WHERE `userid` = $userid ;";
            $result = mysqli_query($connection, $query);
        }
        if($userjobtitle != ""){
            $query = "UPDATE `user` SET `userjobtitle` = '$userjobtitle' WHERE `userid` = $userid ;";
            $result = mysqli_query($connection, $query);
        }
        if($userpreference != ""){
            $query = "UPDATE `user` SET `userpreference` = '$userpreference' WHERE `userid`= $userid ;";
            $result = mysqli_query($connection, $query);
        }
        if($userevent != ""){
            $query = "UPDATE `user` SET `userevent` = '$userevent' WHERE `userid` = $userid ;";
            $result = mysqli_query($connection, $query);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="css/profile6.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="https://kit.fontawesome.com/e3dc412ac7.js" crossorigin="anonymous"></script>
    <script src="javascript/function.js"></script>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
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
            </div>
      
        <div class="light_box">
            <p>User settings</p>
            <form action="#" method="POST">
                <div class="Entire-input-container">
                    <?php getUserInformation() ?>
                        <?php printCountry() ?>
                        </select>
                    </div>
                    <input class="buttons" type="submit" value="Update" name="btnUpdate"></input>
                </div>
            </form>
        </div>
    </main>
    <script src="javascript/header.js"></script>
</body>
</html>