<?php
  include 'dbConn.php'; 
  include 'function.php';
  global $connection;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Management System</title>
    <link rel="stylesheet" href="css/addrow.css">
    <link rel="stylesheet" href="css/header.css">
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
            <h1 style="font-family: Ubuntu;"><a href="mainpage.php">Society Connect</a></h1>
        </div>
        <div class="navigationbar">
            <nav>
            <ul>
                <li><a href="mainpage.php" style="font-family: Ubuntu; font-weight: bold;">Home</a></li>
                <li><a href="jobfinder.php" style="font-family: Ubuntu; font-weight: bold;">Job Finder</a></li>
                <li><a href="skillsync.php" style="font-family: Ubuntu; font-weight: bold;">Skill Sync</a></li>
                <li><a href="event.php" style="font-family: Ubuntu; font-weight: bold;">Event</a></li>
                <li><a href="about.php" style="font-family: Ubuntu; font-weight: bold;">About us</a></li>
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
                    <a href="adminprofile1.php" class="n-content"><i class="fa-solid fa-user"></i>Admin Info</a>
                    <a href="adminprofile2.php" class="n-content"><i class="fa-solid fa-briefcase"></i>Database</a>
                    <a href="profile3.php" class="n-content"><i class="fa-solid fa-layer-group"></i>Approval</a>
                    <a href="profile4.php" class="n-content"><i class="fa-solid fa-calendar-minus"></i>Event</a>
                    <a href="profile5.php" class="n-content"><i class="fa-solid fa-address-card"></i>Post</a>
                    <a href="profile6.php" class="n-content"><i class="fa-solid fa-gear"></i>Setting</a>    
                </div>
                <a href="" class="log-out" onclick="logout()"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log Out</a>
            </div>
        
            <div class="light_box">
                <div class="border1">Society Database
                    <hr class="line">
                    <div class="inside-border-1">
                    <?php 
                        $tablename = isset($_GET['tablename']) ? $_GET['tablename'] : '';

                        // Fetch column names from the database table
                        $query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tablename'";
                        $result = mysqli_query($connection, $query);

                        if ($result) {
                            echo "<form action='#' method='POST'>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                $columnName = $row['COLUMN_NAME'];
                                // Generate input fields based on column names
                                echo "<label for='$columnName'>$columnName:</label>";
                                echo "<input type='text' id='$columnName' name='$columnName'><br>";
                            }
                            // Hidden input field to pass tablename
                            echo "<input type='hidden' name='tablename' value='$tablename'>";
                            echo "<input type='submit' name='btnCreate' value='Create'>";
                            echo "<input type='submit' name='btnBack' value='Back'>";
                            echo "</form>";
                        } else {
                            echo "Error fetching column names: " . mysqli_error($connection);
                        }

                        // Insert Data To Database
                        if (isset($_POST['btnCreate'])) {
                            $insertQuery = "INSERT INTO $tablename (";
                            $values = "";
                            foreach ($_POST as $key => $value) {
                                if ($key != 'btnCreate' && $key != 'tablename') {
                                    $insertQuery .= "$key, ";
                                    $values .= "'$value', ";
                                }
                            }
                            // Remove trailing commas
                            $insertQuery = rtrim($insertQuery, ', ');
                            $values = rtrim($values, ', ');
                            $insertQuery .= ") VALUES ($values)";
                            
                            // Execute the insert query
                            $insertResult = mysqli_query($connection, $insertQuery);
                            
                            if ($insertResult) {
                                echo "<script>alert('Record Created successfully');</script>";
                                echo "<script>window.location.href = 'adminprofile2.php';</script>";
                            } else {
                                echo "<script>alert('Error updating record: " . mysqli_error($connection) . "');</script>";
                                echo "<script>window.location.href = 'adminprofile2.php';</script>";
                            }
                        }

                        // Back To Home Button
                        if (isset($_POST['btnBack'])) {
                            echo "<script>window.location.href = 'adminprofile2.php';</script>";
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
   </main>

   <script src="javascript/header.js"></script>
</body>
</html>