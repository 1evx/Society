<?php
    include 'dbConn.php';
    session_start();

    // Sign Up 
    // Display category option 
    function printJobName(){
        global $connection;
        $query = "SELECT * FROM category WHERE categoryid LIKE 'CJ%' ";
        $result = mysqli_query($connection, $query);

        if($result){
            $data = array(); 

            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;

                $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');

                echo '<option value="'.$name.'">';
                echo $name. '</option>';
            }
        }
    }


    // Main Page 
    // Calculate number of sum of a table WITHOUT CONDITION
    function printSum($column, $table) {
        global $connection;
    
        $query = "SELECT COUNT($column) as total FROM $table";
        $result = mysqli_query($connection, $query);
    
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $total = $row['total'];
            echo $total;
            mysqli_free_result($result);
        } else {
            echo "99+";
        }
    }


    // Main Page 
    // Calculate number of sum of a table WITH CONDITION
    function printConditionalSum($column, $table, $condition) {
        global $connection;
    
        $query = "SELECT COUNT($column) as total FROM $table WHERE $condition";
        $result = mysqli_query($connection, $query);
    
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $total = $row['total'];
            echo $total;
            mysqli_free_result($result);
        } else {
            echo "99+";
        }
    }    


    // Job Finder, Event 
    // Display country option 
    function printCountry(){
        global $connection;
        $query = "SELECT * FROM country";
        $result = mysqli_query($connection, $query);

        if($result){
            $data = array(); // Initialize an array to store the fetched data

            while($row = mysqli_fetch_assoc($result)){
                //Each $row is an associative array containing attribute1 and attribute2
                $data[] = $row;

                $countryid = htmlspecialchars($row['countryid'], ENT_QUOTES, 'UTF-8');
                $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
                $imagesource = htmlspecialchars($row['imagesource'], ENT_QUOTES, 'UTF-8');

                echo '<option value="'.$countryid.'">';
                echo $name. '</option>';
            }
        }
    }


    // Job Finder 
    // Display category option 
    function printJobCategory(){
        global $connection;
        $query = "SELECT * FROM category WHERE categoryid LIKE 'CJ%' ";
        $result = mysqli_query($connection, $query);

        if($result){
            $data = array();

            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;

                $categoryid = htmlspecialchars($row['categoryid'], ENT_QUOTES, 'UTF-8');
                $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');

                echo '<option value="'.$categoryid.'">';
                echo $name. '</option>';
            }
        }
    }


    // Display category option 
    function printCategory($str){
        global $connection;
        $query = "SELECT * FROM category WHERE categoryid LIKE '$str' ";
        $result = mysqli_query($connection, $query);

        if($result){
            $data = array();

            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;

                $categoryid = htmlspecialchars($row['categoryid'], ENT_QUOTES, 'UTF-8');
                $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');

                echo '<option value="'.$categoryid.'">';
                echo $name. '</option>';
            }
        }
    }


    // Skill Sync 
    // Display Lecturer Name 
    function printLecturer(){
        global $connection;
        $query = "SELECT lecturername,userid FROM coursepost ";
        $result = mysqli_query($connection, $query);

        if($result){
            $data = array();

            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;

                $lecturername = htmlspecialchars($row['lecturername'], ENT_QUOTES, 'UTF-8');
                $userid = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                
                echo '<option value="'.$userid.'">';
                echo $lecturername. '</option>';
            }
        }
    }


    // Skill Sync 
    // Display course option 
    function printCourseTitle(){
        global $connection;
        $query = "SELECT * FROM coursepost WHERE finishstatus = '1' ";
        $result = mysqli_query($connection, $query);

        if($result){
            $data = array();

            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;

                $coursetitle = htmlspecialchars($row['coursetitle'], ENT_QUOTES, 'UTF-8');
                $courseid = htmlspecialchars($row['courseid'], ENT_QUOTES, 'UTF-8');

                echo '<option value="'.$courseid.'">';
                echo $coursetitle. '</option>';
            }
        }
    }


    // Post Job 
    // Display category option
    function printJobCategoryInPostJob(){
        global $connection;
        $query = "SELECT * FROM category WHERE categoryid LIKE 'CJ%' ";
        $result = mysqli_query($connection, $query);

        if($result){
            $data = array(); 

            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;

                $categoryid = htmlspecialchars($row['categoryid'], ENT_QUOTES, 'UTF-8');
                $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');

                echo '<li class="option2">';
                echo '<span class="option-text2" value="'.$categoryid.'">'.$name.'</span>';
                echo '</li>';
            }
        }
    }


    // Post Job 
    // Display country option 
    function printCountryInPostJob(){
        global $connection;
        $query = "SELECT * FROM country";
        $result = mysqli_query($connection, $query);

        if($result){
            $data = array();

            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;

                $countryid = htmlspecialchars($row['countryid'], ENT_QUOTES, 'UTF-8');
                $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
                $imagesource = htmlspecialchars($row['imagesource'], ENT_QUOTES, 'UTF-8');

                echo '<li class="option3">';
                echo '<span class="option-text3" value="'.$countryid.'">'.$name.'</span>';
                echo '</li>';
            }
        }
    }


    // Post Job 
    // Post Job Logic 
    function logicJobPost($companyname,$companyurl,$jobtitle,$categoryid,$jobtype,$countryid,$deadline,$joburl,$salaryrange,$jobdescription,$jobrequirement,$finishstatus) {
        global $connection;
        
        if (!empty($_SESSION['email']) && !empty($_SESSION['password'])) {
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $usertype = $_SESSION['usertype'];
        
            if ($usertype === 'user') {
                $idColumn = 'userid';  // User identifier column
                $tableName = 'user';   // User table name
            } elseif ($usertype === 'admin') {
                $idColumn = 'adminid'; // Admin identifier column
                $tableName = 'admin';  // Admin table name
            } else {
                // Invalid user type
                echo '<script>';
                echo 'window.alert("Invalid User Type!");';
                echo '</script>';
                header("Location: /society/signin.php");
                exit();
            }
        
            $query = "SELECT * FROM $tableName;";
            $result = mysqli_query($connection, $query);
        
            if ($result) {
                $data = array();
        
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
        
                    $emaildata = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
                    $passworddata = htmlspecialchars($row['password'], ENT_QUOTES, 'UTF-8');
        
                    if ($email == $emaildata && $password == $passworddata) {
                        $userid = htmlspecialchars($row[$idColumn], ENT_QUOTES, 'UTF-8');
                    }
                }
            }
        } else {
            // Invalid user account
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo '</script>';
            header("Location: /society/signin.php");
            exit();
        }
        
        if (!empty($_FILES["profile"]["name"])) {
            $filename = $_FILES["profile"]["name"];
            $tempname = $_FILES["profile"]["tmp_name"];
            $folder = "./userdata/" . $filename;
            $formattedprofile = $filename = "userdata/" . $_FILES["profile"]["name"];
            $insertQuery = "INSERT INTO `profile` (`name`, `source`) VALUES ('companyprofile', '$formattedprofile ')";
        
            if (mysqli_query($connection, $insertQuery)) {
                // Move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $folder)) {
                    // Retrieve profileid for the inserted image
                    $selectQuery = "SELECT profileid FROM `profile` WHERE `name` = 'companyprofile' AND `source` = '$filename'";
                    $result = mysqli_query($connection, $selectQuery);
                    if ($result && $row = mysqli_fetch_assoc($result)) {
                        $profileid = $row['profileid'];
                    } else {
                        echo '<script>';
                        echo 'window.alert("Failed to retrieve Profile ID.");';
                        echo '</script>';
                    }
                } else {
                    echo '<script>';
                    echo 'window.alert("Failed to upload Company Profile! Please Insert The Image In PNG, JPG, JPEG");';
                    echo '</script>';
                }
            }
        }

        if (!empty($_FILES["banner"]["name"])) {
            $filename = $_FILES["banner"]["name"];
            $tempname = $_FILES["banner"]["tmp_name"];
            $folder = "./userdata/" . $filename;
            $formattedfilename = $filename = "userdata/" . $_FILES["banner"]["name"];
            $query = "INSERT INTO `banner` (`name`, `source`) VALUES ('companybanner', '$formattedfilename')";
        
            if (mysqli_query($connection, $query)) {
                // Move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $folder)) {
                    // Retrieve bannerid for the inserted image
                    $selectQuery = "SELECT bannerid FROM `banner` WHERE `name` = 'companybanner' AND `source` = '$filename'";
                    $result = mysqli_query($connection, $selectQuery);
                    if ($result && $row = mysqli_fetch_assoc($result)) {
                        $bannerid = $row['bannerid'];
                    } else {
                        echo '<script>';
                        echo 'window.alert("Failed to retrieve Banner ID.");';
                        echo '</script>';
                    }
                } else {
                    echo '<script>';
                    echo 'window.alert("Failed to upload Company Banner! Please Insert The Image In PNG, JPG, JPEG");';
                    echo '</script>';
                }
            }
        }
        
        $formattedDeadline = "";

        if (!empty($deadline)) {
            $formattedDeadline = date("Y-m-d", strtotime($deadline));
        }

        // Use prepared statement to insert video information into the database
        if ($usertype === 'user'){
            $query = "INSERT INTO `jobpost`(`jobtitle`, `companyname`, `companyurl`, `salaryrange`, `deadline`, `joburl`, `jobtype`, `jobdescription`, `jobrequirement`, `finishstatus`, `countryid`, `categoryid`, `bannerid`, `profileid`, `userid`) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        } elseif ($usertype === "admin"){
            $query = "INSERT INTO `jobpost`(`jobtitle`, `companyname`, `companyurl`, `salaryrange`, `deadline`, `joburl`, `jobtype`, `jobdescription`, `jobrequirement`, `finishstatus`, `countryid`, `categoryid`, `bannerid`, `profileid`, `adminid`) 
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        }

        $stmt = mysqli_prepare($connection, $query);
        if ($stmt) {
            // Bind parameters to the statement
            mysqli_stmt_bind_param($stmt, "sssssssssssssss",$jobtitle,$companyname,$companyurl,$salaryrange,$formattedDeadline,$joburl,$jobtype,$jobdescription,$jobrequirement,$finishstatus,$countryid,$categoryid,$bannerid,$profileid,$userid);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                if ($finishstatus == 0) {
                    echo '<script>';
                    echo 'window.alert("Job Post saved successfully!");';
                    echo 'window.location.href = "/society/profile5.php";';
                    echo '</script>';
                } else {
                    echo '<script>';
                    echo 'window.alert("Job Post created successfully!");';
                    echo 'window.location.href = "/society/jobfinder.php";'; 
                    echo '</script>';
                }

            } else {
                echo '<script>';
                echo 'window.alert("Error in SQL statement.");';
                echo '</script>';
            }
            mysqli_stmt_close($stmt);
        } else {
            echo '<script>';
            echo 'window.alert("Error in preparing SQL statement.");';
            echo '</script>';
        }
    }


    // Post Event 
    // Post Event Logic 
    function logicEventPost($eventtitle,$startdate,$enddate,$countryid,$eventdescription,$finishstatus) {
        global $connection;

        if (!empty($_SESSION['email']) && !empty($_SESSION['password'])) {
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $usertype = $_SESSION['usertype'];
        
            if ($usertype === 'user') {
                $idColumn = 'userid';  // User identifier column
                $tableName = 'user';   // User table name
            } elseif ($usertype === 'admin') {
                $idColumn = 'adminid'; // Admin identifier column
                $tableName = 'admin';  // Admin table name
            } else {
                // Invalid user type
                echo '<script>';
                echo 'window.alert("Invalid User Type!");';
                echo '</script>';
                header("Location: /society/signin.php");
                exit();
            }
        
            $query = "SELECT * FROM $tableName;";
            $result = mysqli_query($connection, $query);
        
            if ($result) {
                $data = array();
        
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
        
                    $emaildata = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
                    $passworddata = htmlspecialchars($row['password'], ENT_QUOTES, 'UTF-8');
        
                    if ($email == $emaildata && $password == $passworddata) {
                        $userid = htmlspecialchars($row[$idColumn], ENT_QUOTES, 'UTF-8');
                    }
                }
            }
        } else {
            // Invalid user account
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo '</script>';
            header("Location: /society/signin.php");
            exit();
        }

        if (!empty($_FILES["banner"]["name"])) {
            $filename = $_FILES["banner"]["name"];
            $tempname = $_FILES["banner"]["tmp_name"];
            $folder = "./userdata/" . $filename;
            $formattedfilename = $filename = "userdata/" . $_FILES["banner"]["name"];
            $query = "INSERT INTO `banner` (`name`, `source`) VALUES ('eventbanner', '$formattedfilename')";
        
            if (mysqli_query($connection, $query)) {
                // Move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $folder)) {
                    // Retrieve profileid for the inserted image
                    $selectQuery = "SELECT bannerid FROM `banner` WHERE `name` = 'eventbanner' AND `source` = '$filename'";
                    $result = mysqli_query($connection, $selectQuery);
                    if ($result && $row = mysqli_fetch_assoc($result)) {
                        $bannerid = $row['bannerid'];
                    } else {
                        echo '<script>';
                        echo 'window.alert("Failed to retrieve Banner ID.");';
                        echo '</script>';
                    }
                } else {
                    echo '<script>';
                    echo 'window.alert("Failed to upload Company Banner! Please Insert The Image In PNG, JPG, JPEG");';
                    echo '</script>';
                }
            }
        }

        $formattedstartdate = "";

        if (!empty($startdate)) {
            $formattedstartdate = date("Y-m-d", strtotime($startdate));
        }

        $formatenddate = "";

        if (!empty($enddate)) {
            $formatenddate = date("Y-m-d", strtotime($enddate));
        }
        
        // Use prepared statement to insert video information into the database
        if ($usertype === 'user'){
            $query = "INSERT INTO `eventpost`(`title`, `eventdescription`, `startdate`, `enddate`, `finishstatus`, `countryid`, `bannerid`, `userid`) 
            VALUES (?,?,?,?,?,?,?,?)";
        } elseif ($usertype === "admin"){
            $query = "INSERT INTO `eventpost`(`title`, `eventdescription`, `startdate`, `enddate`, `finishstatus`, `countryid`, `bannerid`, `adminid`) 
            VALUES (?,?,?,?,?,?,?,?)";
        }

        $stmt = mysqli_prepare($connection, $query);
        if ($stmt) {
            // Bind parameters to the statement
            mysqli_stmt_bind_param($stmt, "ssssssss", $eventtitle, $eventdescription, $formattedstartdate, $formatenddate, $finishstatus, $countryid, $bannerid, $userid);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                if ($finishstatus == 0) {
                    echo '<script>';
                    echo 'window.alert("Event Post saved successfully!");';
                    echo 'window.location.href = "/society/profile5.php";';
                    echo '</script>';
                } else {
                    echo '<script>';
                    echo 'window.alert("Event Post created successfully!");';
                    echo 'window.location.href = "/society/event.php";'; 
                    echo '</script>';
                }
            } else {
                echo '<script>';
                echo 'window.alert("Error in SQL statement.");';
                echo '</script>';
            }
            mysqli_stmt_close($stmt);
        } else {
            echo '<script>';
            echo 'window.alert("Error in preparing SQL statement.");';
            echo '</script>';
        }
    }


    // Post Lesson 
    // Post Lesson Logic 
    function logicLessonPost($lecturername,$lecturerhour,$lecturertitle,$categoryid,$price,$lecturerdescription,$finishstatus){
        global $connection;

        if (!empty($_SESSION['email']) && !empty($_SESSION['password'])) {
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $usertype = $_SESSION['usertype'];
        
            if ($usertype === 'user') {
                $idColumn = 'userid';  // User identifier column
                $tableName = 'user';   // User table name
            } elseif ($usertype === 'admin') {
                $idColumn = 'adminid'; // Admin identifier column
                $tableName = 'admin';  // Admin table name
            } else {
                // Invalid user type
                echo '<script>';
                echo 'window.alert("Invalid User Type!");';
                echo '</script>';
                header("Location: /society/signin.php");
                exit();
            }
        
            $query = "SELECT * FROM $tableName;";
            $result = mysqli_query($connection, $query);
        
            if ($result) {
                $data = array();
        
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
        
                    $emaildata = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
                    $passworddata = htmlspecialchars($row['password'], ENT_QUOTES, 'UTF-8');
        
                    if ($email == $emaildata && $password == $passworddata) {
                        $userid = htmlspecialchars($row[$idColumn], ENT_QUOTES, 'UTF-8');
                    }
                }
            }
        } else {
            // Invalid user account
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo '</script>';
            header("Location: /society/signin.php");
            exit();
        }

        if (!empty($_FILES["banner"]["name"])) {
            $filename = $_FILES["banner"]["name"];
            $tempname = $_FILES["banner"]["tmp_name"];
            $folder = "./userdata/" . $filename;
            $formattedfilename = $filename = "userdata/" . $_FILES["banner"]["name"];
            $query = "INSERT INTO `banner` (`name`, `source`) VALUES ('lessonbanner', '$formattedfilename')";
        
            if (mysqli_query($connection, $query)) {
                // Move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $folder)) {
                    // Retrieve profileid for the inserted image
                    $selectQuery = "SELECT bannerid FROM `banner` WHERE `name` = 'lessonbanner' AND `source` = '$filename'";
                    $result = mysqli_query($connection, $selectQuery);
                    if ($result && $row = mysqli_fetch_assoc($result)) {
                        $bannerid = $row['bannerid'];
                    } else {
                        echo '<script>';
                        echo 'window.alert("Failed to retrieve Banner ID.");';
                        echo '</script>';
                    }
                } else {
                    echo '<script>';
                    echo 'window.alert("Failed to upload Company Banner! Please Insert The Image In PNG, JPG, JPEG");';
                    echo '</script>';
                }
            }
        }

        if (isset($_FILES["video"])) {
            // Get information about the uploaded file
            $videoFile = $_FILES["video"];
            $videoName = $videoFile["name"];
            $fileTmpName = $videoFile["tmp_name"];
            $fileSize = $videoFile["size"];
            $fileError = $videoFile["error"];
            
            // Check for errors during upload
            if ($fileError === UPLOAD_ERR_OK) {
                // Move the uploaded file to the desired directory
                $destination = "userdata/" . $videoName;
                move_uploaded_file($fileTmpName, $destination);
            
            } else {
                echo "Error uploading video. Error code: $fileError";
            }
        }
        
        // Use prepared statement to insert video information into the database
        if ($usertype === 'user'){
            $query = "INSERT INTO `coursepost`(`lecturername`, `coursehour`, `coursetitle`, `coursedescription`, `feeindollar`, `videourl`, `finishstatus`, `categoryid`, `bannerid`, `userid`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        } elseif ($usertype === "admin"){
            $query = "INSERT INTO `coursepost`(`lecturername`, `coursehour`, `coursetitle`, `coursedescription`, `feeindollar`, `videourl`, `finishstatus`, `categoryid`, `bannerid`, `adminid`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        }

        $stmt = mysqli_prepare($connection, $query);
        if ($stmt) {
            // Bind parameters to the statement
            mysqli_stmt_bind_param($stmt, "ssssssssss", $lecturername, $lecturerhour, $lecturertitle, $lecturerdescription, $price, $destination, $finishstatus, $categoryid, $bannerid, $userid);
            mysqli_stmt_execute($stmt);

            if (mysqli_stmt_affected_rows($stmt) > 0) {
                if ($finishstatus == 0) {
                    echo '<script>';
                    echo 'window.alert("Lesson Post saved successfully!");';
                    echo 'window.location.href = "/society/userprofile.php";';
                    echo '</script>';
                } else {
                    echo '<script>';
                    echo 'window.alert("Lesson Post created successfully!");';
                    echo 'window.location.href = "/society/skillsync.php";'; 
                    echo '</script>';
                }
            } else {
                echo '<script>';
                echo 'window.alert("Error in SQL statement.");';
                echo '</script>';
            }
            mysqli_stmt_close($stmt);
        } else {
            echo '<script>';
            echo 'window.alert("Error in preparing SQL statement.");';
            echo '</script>';
        }
    }
    

    // User Profile
    // Get User Profile Information When Login
    function getUserProfile(){
        global $connection;
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
                        $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES, 'UTF-8');
                        $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES, 'UTF-8');
                        $email = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
                        $gender = htmlspecialchars($row['gender'], ENT_QUOTES, 'UTF-8');
                        $about = htmlspecialchars($row['about'], ENT_QUOTES, 'UTF-8');
                        $userjobtitle = htmlspecialchars($row['userjobtitle'], ENT_QUOTES, 'UTF-8');
                        $userpreference = htmlspecialchars($row['userpreference'], ENT_QUOTES, 'UTF-8');
                        $userevent = htmlspecialchars($row['userevent'], ENT_QUOTES, 'UTF-8');

                        $countryid = isset($row['countryid']) ? htmlspecialchars($row['countryid'], ENT_QUOTES, 'UTF-8') : null;
                        $bannerid = isset($row['bannerid']) ? htmlspecialchars($row['bannerid'], ENT_QUOTES, 'UTF-8') : null;
                        $profileid = isset($row['profileid']) ? htmlspecialchars($row['profileid'], ENT_QUOTES, 'UTF-8') : null;
            
                        $countrynameQuery = "SELECT name FROM country WHERE countryid = " . ($countryid ? "'" . $countryid . "'" : 'NULL');
                        $bannernameQuery = "SELECT source FROM banner WHERE bannerid = " . ($bannerid ? "'" . $bannerid . "'" : 'NULL');
                        $profilenameQuery = "SELECT source FROM profile WHERE profileid = " . ($profileid ? "'" . $profileid . "'" : 'NULL');
            
            
                        $countrynameResult = mysqli_query($connection, $countrynameQuery);
                        $bannernameResult = mysqli_query($connection, $bannernameQuery);
                        $profilenameResult = mysqli_query($connection, $profilenameQuery);
            
                        $countryname = ($countrynameResult && $countrynameRow = mysqli_fetch_assoc($countrynameResult)) ? $countrynameRow['name'] : 'N/A';
                        $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';
                        $profilesource = ($profilenameResult && $profilenameRow = mysqli_fetch_assoc($profilenameResult)) ? $profilenameRow['source'] : 'N/A';
                        break;
                    }
                }
            }

            echo'
            <div class="container">
            <div class="white_box"> 
                <div class="logo-container">
                    <img src="image/logo1.png" class="logo">
                    <span class="logo-text">Society <br> Connect </span>
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
                <div class="BannerBox"><img src="'.$bannersource.'"></div>
                <div class="Profile"><img src="'.$profilesource.'"></div>
                    <div class="AboveLeft"><p>'.$firstname.''.$lastname.'</p>
                        <p><a href="" class="font_size">'.$email.'</a></p>
                    </div>
                    
                    <div class="AboveRight">
                        <img src="image/location2.png" class="AboveMarker">
                        <div class="AboveRight">'.$countryname.'
                        </div>
                    </div>
                    
                    <div class="about">
                        <h2 class="h1-content">About</h2>
                            <p>'.$about.'</p>
                    </div>
        
                    <div class="main-content-2">
                        <h5 class="h5-content">Job Title: <span>'.$userjobtitle.'</span></h5> 
                        <h5 class="h5-content">Preference: <span>'.$userpreference.'</span></h5>
                        <h5 class="h5-content">Event: <span>'.$userevent.'</span></h5>      
                    </div>
                </div>
            </div>
            ';
        } else {
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo 'window.location.href("login.php");';
            echo '</script>';
        } 
    }


    // Profile2
    // Get Saved Job Post When Login
    function getSavedJob(){
        global $connection;
        
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

            $query = "SELECT * FROM savedjob;";
            $result = mysqli_query($connection, $query);

            if($result){
                $data = array(); 
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $jobid = htmlspecialchars($row['jobid'], ENT_QUOTES, 'UTF-8');
                    $userreference = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                    $isPin = htmlspecialchars($row['isPin'], ENT_QUOTES, 'UTF-8');

                    $jobid = isset($row['jobid']) ? htmlspecialchars($row['jobid'], ENT_QUOTES, 'UTF-8') : null;
        
                    $companynameQuery = "SELECT companyname FROM jobpost WHERE jobid = " . ($jobid ? "'" . $jobid . "'" : 'NULL');
                    $jobtitleQuery = "SELECT jobtitle FROM jobpost WHERE jobid = " . ($jobid ? "'" . $jobid . "'" : 'NULL');
                    $bannernameQuery = "SELECT source FROM banner INNER JOIN jobpost on jobpost.bannerid = banner.bannerid WHERE 
                    jobid = " . ($jobid ? "'" . $jobid . "'" : 'NULL');
        
                    $companynameResult = mysqli_query($connection, $companynameQuery);
                    $jobtitleResult = mysqli_query($connection, $jobtitleQuery);
                    $bannernameResult = mysqli_query($connection, $bannernameQuery);
        
                    $companyname = ($companynameResult && $companynameRow = mysqli_fetch_assoc($companynameResult)) ? $companynameRow['companyname'] : 'N/A';
                    $jobtitle = ($jobtitleResult && $jobtitleRow = mysqli_fetch_assoc($jobtitleResult)) ? $jobtitleRow['jobtitle'] : 'N/A';
                    $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';

                    if($isPin == "1" && $userid == $userreference){
                        echo'
                        <button class="B1" value="'.$jobid.'" onclick="redirectToJobPost(this.value)">
                            <div class="banner"><img src="'.$bannersource.'"></img></div>
                            <div class="content">
                                <h1 id="companyname">'.$companyname.'</h1>
                                <h1 id="jobtitle">'.$jobtitle.'</h1>
                            </div>
                        </button>
                        ';
                    }
                }
            }
        } else {    
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo 'window.location.href("login.php");';
            echo '</script>';
        }
    }


    // Profile2
    // Get Posted Job When Login
    function getPostJob(){
        global $connection;
        
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

            $query = "SELECT * FROM jobpost WHERE adminid != '';";
            $result = mysqli_query($connection, $query);

            if($result){
                $data = array();
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $jobid = htmlspecialchars($row['jobid'], ENT_QUOTES, 'UTF-8');
                    $userreference = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                    $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

                    $jobid = isset($row['jobid']) ? htmlspecialchars($row['jobid'], ENT_QUOTES, 'UTF-8') : null;
        
                    $companynameQuery = "SELECT companyname FROM jobpost WHERE jobid = " . ($jobid ? "'" . $jobid . "'" : 'NULL');
                    $jobtitleQuery = "SELECT jobtitle FROM jobpost WHERE jobid = " . ($jobid ? "'" . $jobid . "'" : 'NULL');
                    $bannernameQuery = "SELECT source FROM banner INNER JOIN jobpost on jobpost.bannerid = banner.bannerid WHERE 
                    jobid = " . ($jobid ? "'" . $jobid . "'" : 'NULL');
        
                    $companynameResult = mysqli_query($connection, $companynameQuery);
                    $jobtitleResult = mysqli_query($connection, $jobtitleQuery);
                    $bannernameResult = mysqli_query($connection, $bannernameQuery);
        
                    $companyname = ($companynameResult && $companynameRow = mysqli_fetch_assoc($companynameResult)) ? $companynameRow['companyname'] : 'N/A';
                    $jobtitle = ($jobtitleResult && $jobtitleRow = mysqli_fetch_assoc($jobtitleResult)) ? $jobtitleRow['jobtitle'] : 'N/A';
                    $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';

                    if($finishstatus == "1" && $userid == $userreference){
                        echo'
                        <button class="B1" value="'.$jobid.'" onclick="redirectToJobPost(this.value)">
                            <div class="banner"><img src="'.$bannersource.'"></img></div>
                            <div class="content">
                                <h1 id="companyname">'.$companyname.'</h1>
                                <h1 id="jobtitle">'.$jobtitle.'</h1>
                            </div>
                        </button>
                        ';
                    }
                }
            }
        } else {    
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo 'window.location.href("login.php");';
            echo '</script>';
        }
    }


    // Profile3
    // Get Saved Course When Login
    function getSavedCourse(){
        global $connection;
        
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

            $query = "SELECT * FROM savedcourse;";
            $result = mysqli_query($connection, $query);

            if($result){
                $data = array();
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $courseid = htmlspecialchars($row['courseid'], ENT_QUOTES, 'UTF-8');
                    $userreference = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                    $isPin = htmlspecialchars($row['isPin'], ENT_QUOTES, 'UTF-8');

                    $courseid = isset($row['courseid']) ? htmlspecialchars($row['courseid'], ENT_QUOTES, 'UTF-8') : null;
        
                    $coursetitleQuery = "SELECT coursetitle FROM coursepost WHERE courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');
                    $coursedescriptionQuery = "SELECT coursedescription FROM coursepost WHERE courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');
                    $bannernameQuery = "SELECT source FROM banner INNER JOIN coursepost on coursepost.bannerid = banner.bannerid WHERE 
                    courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');
        
                    $coursetitleResult = mysqli_query($connection, $coursetitleQuery);
                    $coursedescriptionResult = mysqli_query($connection, $coursedescriptionQuery);
                    $bannernameResult = mysqli_query($connection, $bannernameQuery);
        
                    $coursetitle = ($coursetitleResult && $coursetitleRow = mysqli_fetch_assoc($coursetitleResult)) ? $coursetitleRow['coursetitle'] : 'N/A';
                    $coursedescription = ($coursedescriptionResult && $coursedescriptionRow = mysqli_fetch_assoc($coursedescriptionResult)) ? $coursedescriptionRow['coursedescription'] : 'N/A';
                    $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';

                    if($isPin == "1" && $userid == $userreference){
                        echo'
                        <button class="B1" value="'.$courseid.'" onclick="redirectToSkillPost(this.value)">
                            <div class="banner"><img src="'.$bannersource.'"></img></div>
                            <div class="content">
                                <h1 id="companyname">'.$coursetitle.'</h1>
                                <h1 id="jobtitle">'.$coursedescription.'</h1>
                            </div>
                        </button>
                        ';
                    }
                }
            }
        } else {    
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo 'window.location.href("login.php");';
            echo '</script>';
        }
    }


    // Profile3
    // Get Posted Courses When Login
    function getPostCourse(){
        global $connection;
        
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

            $query = "SELECT * FROM coursepost WHERE adminid != '';";
            $result = mysqli_query($connection, $query);

            if($result){
                $data = array(); 
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $courseid = htmlspecialchars($row['courseid'], ENT_QUOTES, 'UTF-8');
                    $userreference = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                    $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

                    $courseid = isset($row['courseid']) ? htmlspecialchars($row['courseid'], ENT_QUOTES, 'UTF-8') : null;
        
                    $coursetitleQuery = "SELECT coursetitle FROM coursepost WHERE courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');
                    $coursedescriptionQuery = "SELECT coursedescription FROM coursepost WHERE courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');
                    $bannernameQuery = "SELECT source FROM banner INNER JOIN coursepost on coursepost.bannerid = banner.bannerid WHERE 
                    courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');
        
                    $coursetitleResult = mysqli_query($connection, $coursetitleQuery);
                    $coursedescriptionResult = mysqli_query($connection, $coursedescriptionQuery);
                    $bannernameResult = mysqli_query($connection, $bannernameQuery);
        
                    $coursetitle = ($coursetitleResult && $coursetitleRow = mysqli_fetch_assoc($coursetitleResult)) ? $coursetitleRow['coursetitle'] : 'N/A';
                    $coursedescription = ($coursedescriptionResult && $coursedescriptionRow = mysqli_fetch_assoc($coursedescriptionResult)) ? $coursedescriptionRow['coursedescription'] : 'N/A';
                    $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';

                    if($finishstatus == "1" && $userid == $userreference){
                        echo'
                        <button class="B1" value="'.$courseid.'" onclick="redirectToSkillPost(this.value)">
                            <div class="banner"><img src="'.$bannersource.'"></img></div>
                            <div class="content">
                                <h1 id="companyname">'.$coursetitle.'</h1>
                                <h1 id="jobtitle">'.$coursedescription.'</h1>
                            </div>
                        </button>
                        ';
                    }
                }
            }
        } else {    
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo 'window.location.href("login.php");';
            echo '</script>';
        }
    }


    // Profile4
    // Get Saved Event Post When Login
    function getSavedEvent(){
        global $connection;
        
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

            $query = "SELECT * FROM savedevent;";
            $result = mysqli_query($connection, $query);

            if($result){
                $data = array(); 
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $eventid = htmlspecialchars($row['eventid'], ENT_QUOTES, 'UTF-8');
                    $userreference = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                    $isPin = htmlspecialchars($row['isPin'], ENT_QUOTES, 'UTF-8');

                    $eventid = isset($row['eventid']) ? htmlspecialchars($row['eventid'], ENT_QUOTES, 'UTF-8') : null;
        
                    $eventtitleQuery = "SELECT title FROM eventpost WHERE eventid = " . ($eventid ? "'" . $eventid . "'" : 'NULL');
                    $eventdescriptionQuery = "SELECT eventdescription FROM eventpost WHERE eventid = " . ($eventid ? "'" . $eventid . "'" : 'NULL');
                    $bannernameQuery = "SELECT source FROM banner INNER JOIN eventpost on eventpost.bannerid = banner.bannerid WHERE 
                    eventid = " . ($eventid ? "'" . $eventid . "'" : 'NULL');
        
                    $eventtitleResult = mysqli_query($connection, $eventtitleQuery);
                    $eventdescriptionResult = mysqli_query($connection, $eventdescriptionQuery);
                    $bannernameResult = mysqli_query($connection, $bannernameQuery);
        
                    $eventtitle = ($eventtitleResult && $eventtitleRow = mysqli_fetch_assoc($eventtitleResult)) ? $eventtitleRow['title'] : 'N/A';
                    $eventdescription = ($eventdescriptionResult && $eventdescriptionRow = mysqli_fetch_assoc($eventdescriptionResult)) ? $eventdescriptionRow['eventdescription'] : 'N/A';
                    $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';

                    if($isPin == "1" && $userid == $userreference){
                        echo'
                        <button class="B1" value="'.$eventid.'" onclick="redirectToEventPost(this.value)">
                            <div class="banner"><img src="'.$bannersource.'"></img></div>
                            <div class="content">
                                <h1 id="companyname">'.$eventtitle.'</h1>
                                <h1 id="jobtitle">'.$eventdescription.'</h1>
                            </div>
                        </button>
                        ';
                    }
                }
            }
        } else {    
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo 'window.location.href("login.php");';
            echo '</script>';
        }
    }


    // Profile4
    // Get Posted Event When Login
    function getPostEvent(){
        global $connection;
        
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

            $query = "SELECT * FROM eventpost WHERE adminid != '';";
            $result = mysqli_query($connection, $query);

            if($result){
                $data = array();
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $eventid = htmlspecialchars($row['eventid'], ENT_QUOTES, 'UTF-8');
                    $userreference = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                    $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

                    $eventid = isset($row['eventid']) ? htmlspecialchars($row['eventid'], ENT_QUOTES, 'UTF-8') : null;
        
                    $eventtitleQuery = "SELECT title FROM eventpost WHERE eventid = " . ($eventid ? "'" . $eventid . "'" : 'NULL');
                    $eventdescriptionQuery = "SELECT eventdescription FROM eventpost WHERE eventid = " . ($eventid ? "'" . $eventid . "'" : 'NULL');
                    $bannernameQuery = "SELECT source FROM banner INNER JOIN eventpost on eventpost.bannerid = banner.bannerid WHERE 
                    eventid = " . ($eventid ? "'" . $eventid . "'" : 'NULL');
        
                    $eventtitleResult = mysqli_query($connection, $eventtitleQuery);
                    $eventdescriptionResult = mysqli_query($connection, $eventdescriptionQuery);
                    $bannernameResult = mysqli_query($connection, $bannernameQuery);
        
                    $eventtitle = ($eventtitleResult && $eventtitleRow = mysqli_fetch_assoc($eventtitleResult)) ? $eventtitleRow['title'] : 'N/A';
                    $eventdescription = ($eventdescriptionResult && $eventdescriptionRow = mysqli_fetch_assoc($eventdescriptionResult)) ? $eventdescriptionRow['eventdescription'] : 'N/A';
                    $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';


                    if($finishstatus == "1" && $userid == $userreference){
                        echo'
                        <button class="B1" value="'.$eventid.'" onclick="redirectToEventPost(this.value)">
                            <div class="banner"><img src="'.$bannersource.'"></img></div>
                            <div class="content">
                                <h1 id="companyname">'.$eventtitle.'</h1>
                                <h1 id="jobtitle">'.$eventdescription.'</h1>
                            </div>
                        </button>
                        ';
                    }
                }
            }
        } else {    
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo 'window.location.href("login.php");';
            echo '</script>';
        }
    }


    // Profile5
    // Get Unfinished Post When Login
    function getUnfinishedPost(){
        global $connection;
        
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

            //Unfinished Job Post
            $query = "SELECT * FROM jobpost;";
            $result = mysqli_query($connection, $query);

            if($result){
                $data = array(); 
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $jobid = htmlspecialchars($row['jobid'], ENT_QUOTES, 'UTF-8');
                    $userreference = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                    $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

                    $jobid = isset($row['jobid']) ? htmlspecialchars($row['jobid'], ENT_QUOTES, 'UTF-8') : null;
        
                    $companynameQuery = "SELECT companyname FROM jobpost WHERE jobid = " . ($jobid ? "'" . $jobid . "'" : 'NULL');
                    $jobtitleQuery = "SELECT jobtitle FROM jobpost WHERE jobid = " . ($jobid ? "'" . $jobid . "'" : 'NULL');
                    $bannernameQuery = "SELECT source FROM banner INNER JOIN jobpost on jobpost.bannerid = banner.bannerid WHERE 
                    jobid = " . ($jobid ? "'" . $jobid . "'" : 'NULL');
        
                    $companynameResult = mysqli_query($connection, $companynameQuery);
                    $jobtitleResult = mysqli_query($connection, $jobtitleQuery);
                    $bannernameResult = mysqli_query($connection, $bannernameQuery);
        
                    $companyname = ($companynameResult && $companynameRow = mysqli_fetch_assoc($companynameResult)) ? $companynameRow['companyname'] : 'N/A';
                    $jobtitle = ($jobtitleResult && $jobtitleRow = mysqli_fetch_assoc($jobtitleResult)) ? $jobtitleRow['jobtitle'] : 'N/A';
                    $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';
                    
                    if($finishstatus == "0" && $userid == $userreference){
                        echo'
                        <button class="B1" value="'.$jobid.'" onclick="jobConfirm(this.value)">
                            <div class="banner"><img src="'.$bannersource.'"></img></div>
                            <div class="content">
                                <h1 id="companyname">'.$companyname.'</h1>
                                <h1 id="jobtitle">'.$jobtitle.'</h1>
                            </div>
                        </button>
                        ';
                    }
                }
            }

            //Unfinished Course Post
            $query = "SELECT * FROM coursepost;";
            $result = mysqli_query($connection, $query);

            if($result){
                $data = array(); // Initialize an array to store the fetched data
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $courseid = htmlspecialchars($row['courseid'], ENT_QUOTES, 'UTF-8');
                    $userreference = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                    $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

                    $courseid = isset($row['courseid']) ? htmlspecialchars($row['courseid'], ENT_QUOTES, 'UTF-8') : null;
        
                    $coursetitleQuery = "SELECT coursetitle FROM coursepost WHERE courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');
                    $coursedescriptionQuery = "SELECT coursedescription FROM coursepost WHERE courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');
                    $bannernameQuery = "SELECT source FROM banner INNER JOIN coursepost on coursepost.bannerid = banner.bannerid WHERE 
                    courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');
        
                    $coursetitleResult = mysqli_query($connection, $coursetitleQuery);
                    $coursedescriptionResult = mysqli_query($connection, $coursedescriptionQuery);
                    $bannernameResult = mysqli_query($connection, $bannernameQuery);
        
                    $coursetitle = ($coursetitleResult && $coursetitleRow = mysqli_fetch_assoc($coursetitleResult)) ? $coursetitleRow['coursetitle'] : 'N/A';
                    $coursedescription = ($coursedescriptionResult && $coursedescriptionRow = mysqli_fetch_assoc($coursedescriptionResult)) ? $coursedescriptionRow['coursedescription'] : 'N/A';
                    $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';

                    if($finishstatus == "0" && $userid == $userreference){
                        echo'
                        <button class="B1" value="'.$courseid.'" onclick="skillConfirm(this.value)">
                            <div class="banner"><img src="'.$bannersource.'"></img></div>
                            <div class="content">
                                <h1 id="companyname">'.$coursetitle.'</h1>
                                <h1 id="jobtitle">'.$coursedescription.'</h1>
                            </div>
                        </button>
                        ';
                    }
                }
            }

            //Unfinished Event Post
            $query = "SELECT * FROM eventpost;";
            $result = mysqli_query($connection, $query);

            if($result){
                $data = array(); // Initialize an array to store the fetched data
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $eventid = htmlspecialchars($row['eventid'], ENT_QUOTES, 'UTF-8');
                    $userreference = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                    $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

                    $eventid = isset($row['eventid']) ? htmlspecialchars($row['eventid'], ENT_QUOTES, 'UTF-8') : null;
        
                    $eventtitleQuery = "SELECT title FROM eventpost WHERE eventid = " . ($eventid ? "'" . $eventid . "'" : 'NULL');
                    $eventdescriptionQuery = "SELECT eventdescription FROM eventpost WHERE eventid = " . ($eventid ? "'" . $eventid . "'" : 'NULL');
                    $bannernameQuery = "SELECT source FROM banner INNER JOIN eventpost on eventpost.bannerid = banner.bannerid WHERE 
                    eventid = " . ($eventid ? "'" . $eventid . "'" : 'NULL');
        
                    $eventtitleResult = mysqli_query($connection, $eventtitleQuery);
                    $eventdescriptionResult = mysqli_query($connection, $eventdescriptionQuery);
                    $bannernameResult = mysqli_query($connection, $bannernameQuery);
        
                    $eventtitle = ($eventtitleResult && $eventtitleRow = mysqli_fetch_assoc($eventtitleResult)) ? $eventtitleRow['title'] : 'N/A';
                    $eventdescription = ($eventdescriptionResult && $eventdescriptionRow = mysqli_fetch_assoc($eventdescriptionResult)) ? $eventdescriptionRow['eventdescription'] : 'N/A';
                    $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';


                    if($finishstatus == "0" && $userid == $userreference){
                        echo'
                        <button class="B1" value="'.$eventid.'" onclick="eventConfirm(this.value)">
                            <div class="banner"><img src="'.$bannersource.'"></img></div>
                            <div class="content">
                                <h1 id="companyname">'.$eventtitle.'</h1>
                                <h1 id="jobtitle">'.$eventdescription.'</h1>
                            </div>
                        </button>
                        ';
                    }
                }
            }
        } else {    
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo 'window.location.href("login.php");';
            echo '</script>';
        }
    }


    // Profile5
    // Get Wating Post When Login
    function getWaitingPost(){
        global $connection;
        
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

            //Unfinished Job Post
            $query = "SELECT * FROM jobpost WHERE adminid IS NULL";
            $result = mysqli_query($connection, $query);

            if($result){
                $data = array(); 
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $jobid = htmlspecialchars($row['jobid'], ENT_QUOTES, 'UTF-8');
                    $userreference = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                    $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

                    $jobid = isset($row['jobid']) ? htmlspecialchars($row['jobid'], ENT_QUOTES, 'UTF-8') : null;
        
                    $companynameQuery = "SELECT companyname FROM jobpost WHERE jobid = " . ($jobid ? "'" . $jobid . "'" : 'NULL');
                    $jobtitleQuery = "SELECT jobtitle FROM jobpost WHERE jobid = " . ($jobid ? "'" . $jobid . "'" : 'NULL');
                    $bannernameQuery = "SELECT source FROM banner INNER JOIN jobpost on jobpost.bannerid = banner.bannerid WHERE 
                    jobid = " . ($jobid ? "'" . $jobid . "'" : 'NULL');
        
                    $companynameResult = mysqli_query($connection, $companynameQuery);
                    $jobtitleResult = mysqli_query($connection, $jobtitleQuery);
                    $bannernameResult = mysqli_query($connection, $bannernameQuery);
        
                    $companyname = ($companynameResult && $companynameRow = mysqli_fetch_assoc($companynameResult)) ? $companynameRow['companyname'] : 'N/A';
                    $jobtitle = ($jobtitleResult && $jobtitleRow = mysqli_fetch_assoc($jobtitleResult)) ? $jobtitleRow['jobtitle'] : 'N/A';
                    $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';

                    if($finishstatus == "1" && $userid == $userreference){
                        echo'
                        <button class="B1" value="'.$jobid.'" onclick="jobConfirm(this.value)">
                            <div class="banner"><img src="'.$bannersource.'"></img></div>
                            <div class="content">
                                <h1 id="companyname">'.$companyname.'</h1>
                                <h1 id="jobtitle">'.$jobtitle.'</h1>
                            </div>
                        </button>
                        ';
                    }
                }
            }

            //Unfinished Course Post
            $query = "SELECT * FROM coursepost WHERE adminid IS NULL;";
            $result = mysqli_query($connection, $query);

            if($result){
                $data = array(); // Initialize an array to store the fetched data
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $courseid = htmlspecialchars($row['courseid'], ENT_QUOTES, 'UTF-8');
                    $userreference = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                    $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

                    $courseid = isset($row['courseid']) ? htmlspecialchars($row['courseid'], ENT_QUOTES, 'UTF-8') : null;
        
                    $coursetitleQuery = "SELECT coursetitle FROM coursepost WHERE courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');
                    $coursedescriptionQuery = "SELECT coursedescription FROM coursepost WHERE courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');
                    $bannernameQuery = "SELECT source FROM banner INNER JOIN coursepost on coursepost.bannerid = banner.bannerid WHERE 
                    courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');
        
                    $coursetitleResult = mysqli_query($connection, $coursetitleQuery);
                    $coursedescriptionResult = mysqli_query($connection, $coursedescriptionQuery);
                    $bannernameResult = mysqli_query($connection, $bannernameQuery);
        
                    $coursetitle = ($coursetitleResult && $coursetitleRow = mysqli_fetch_assoc($coursetitleResult)) ? $coursetitleRow['coursetitle'] : 'N/A';
                    $coursedescription = ($coursedescriptionResult && $coursedescriptionRow = mysqli_fetch_assoc($coursedescriptionResult)) ? $coursedescriptionRow['coursedescription'] : 'N/A';
                    $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';

                    if($finishstatus == "1" && $userid == $userreference){
                        echo'
                        <button class="B1" value="'.$courseid.'" onclick="skillConfirm(this.value)">
                            <div class="banner"><img src="'.$bannersource.'"></img></div>
                            <div class="content">
                                <h1 id="companyname">'.$coursetitle.'</h1>
                                <h1 id="jobtitle">'.$coursedescription.'</h1>
                            </div>
                        </button>
                        ';
                    }
                }
            }

            //Unfinished Event Post
            $query = "SELECT * FROM eventpost WHERE adminid IS NULL;";
            $result = mysqli_query($connection, $query);

            if($result){
                $data = array(); // Initialize an array to store the fetched data
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $eventid = htmlspecialchars($row['eventid'], ENT_QUOTES, 'UTF-8');
                    $userreference = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');
                    $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

                    $eventid = isset($row['eventid']) ? htmlspecialchars($row['eventid'], ENT_QUOTES, 'UTF-8') : null;
        
                    $eventtitleQuery = "SELECT title FROM eventpost WHERE eventid = " . ($eventid ? "'" . $eventid . "'" : 'NULL');
                    $eventdescriptionQuery = "SELECT eventdescription FROM eventpost WHERE eventid = " . ($eventid ? "'" . $eventid . "'" : 'NULL');
                    $bannernameQuery = "SELECT source FROM banner INNER JOIN eventpost on eventpost.bannerid = banner.bannerid WHERE 
                    eventid = " . ($eventid ? "'" . $eventid . "'" : 'NULL');
        
                    $eventtitleResult = mysqli_query($connection, $eventtitleQuery);
                    $eventdescriptionResult = mysqli_query($connection, $eventdescriptionQuery);
                    $bannernameResult = mysqli_query($connection, $bannernameQuery);
        
                    $eventtitle = ($eventtitleResult && $eventtitleRow = mysqli_fetch_assoc($eventtitleResult)) ? $eventtitleRow['title'] : 'N/A';
                    $eventdescription = ($eventdescriptionResult && $eventdescriptionRow = mysqli_fetch_assoc($eventdescriptionResult)) ? $eventdescriptionRow['eventdescription'] : 'N/A';
                    $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';


                    if($finishstatus == "1" && $userid == $userreference){
                        echo'
                        <button class="B1" value="'.$eventid.'" onclick="eventConfirm(this.value)">
                            <div class="banner"><img src="'.$bannersource.'"></img></div>
                            <div class="content">
                                <h1 id="companyname">'.$eventtitle.'</h1>
                                <h1 id="jobtitle">'.$eventdescription.'</h1>
                            </div>
                        </button>
                        ';
                    }
                }
            }
        } else {    
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo 'window.location.href("login.php");';
            echo '</script>';
        }
    }


    // Profile6
    // Get User Information When Login
    function getUserInformation(){
        global $connection;
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
                        $firstname = htmlspecialchars($row['firstname'], ENT_QUOTES, 'UTF-8');
                        $lastname = htmlspecialchars($row['lastname'], ENT_QUOTES, 'UTF-8');
                        $email = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
                        $gender = htmlspecialchars($row['gender'], ENT_QUOTES, 'UTF-8');
                        $about = htmlspecialchars($row['about'], ENT_QUOTES, 'UTF-8');
                        $age = htmlspecialchars($row['age'], ENT_QUOTES, 'UTF-8');
                        $userjobtitle = htmlspecialchars($row['userjobtitle'], ENT_QUOTES, 'UTF-8');
                        $userpreference = htmlspecialchars($row['userpreference'], ENT_QUOTES, 'UTF-8');
                        $userevent = htmlspecialchars($row['userevent'], ENT_QUOTES, 'UTF-8');

                        $countryid = isset($row['countryid']) ? htmlspecialchars($row['countryid'], ENT_QUOTES, 'UTF-8') : null;
                        $bannerid = isset($row['bannerid']) ? htmlspecialchars($row['bannerid'], ENT_QUOTES, 'UTF-8') : null;
                        $profileid = isset($row['profileid']) ? htmlspecialchars($row['profileid'], ENT_QUOTES, 'UTF-8') : null;
            
                        $countrynameQuery = "SELECT name FROM country WHERE countryid = " . ($countryid ? "'" . $countryid . "'" : 'NULL');
                        $bannernameQuery = "SELECT source FROM banner WHERE bannerid = " . ($bannerid ? "'" . $bannerid . "'" : 'NULL');
                        $profilenameQuery = "SELECT source FROM profile WHERE profileid = " . ($profileid ? "'" . $profileid . "'" : 'NULL');
            
            
                        $countrynameResult = mysqli_query($connection, $countrynameQuery);
                        $bannernameResult = mysqli_query($connection, $bannernameQuery);
                        $profilenameResult = mysqli_query($connection, $profilenameQuery);
            
                        $countryname = ($countrynameResult && $countrynameRow = mysqli_fetch_assoc($countrynameResult)) ? $countrynameRow['name'] : 'N/A';
                        $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';
                        $profilesource = ($profilenameResult && $profilenameRow = mysqli_fetch_assoc($profilenameResult)) ? $profilenameRow['source'] : 'N/A';
                        break;
                    }
                }
            }
            
            echo'
            <div class="input-container">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" name="firstname" placeholder="'.$firstname.'">
            </div>
            <div class="input-container">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" placeholder="'.$lastname.'">
            </div>
            <div class="input-container">
                <label for="gender">Gender</label>
                <input type="text" id="gender" name="gender" placeholder="'.$gender.'">
            </div>
            <div class="input-container">
                <label for="age">Age</label>
                <input type="text" id="age" name="age" placeholder="'.$age.'">
            </div>
            <div class="input-container">
                <label for="email address">Email Address</label>
                <input type="text" id="email address" name="email" placeholder="'.$email.'">
            </div>
            <div class="input-container">
                <label for="userjobtitle">Job Title</label>
                <input type="text" id="userjobtitle" name="userjobtitle" placeholder="'.$userjobtitle.'">
            </div>
            <div class="input-container">
                <label for="userpreference">Preference</label>
                <input type="text" id="userpreference" name="userpreference" placeholder="'.$userpreference.'">
            </div>
            <div class="input-container">
                <label for="userevent">Event</label>
                <input type="text" id="userevent" name="userevent" placeholder="'.$userevent.'">
            </div>
            <div class="input-container">
                <label for="about">About Me</label>
                <input type="text" id="about" name="about" placeholder="'.$about.'">
            </div>
            <div class="input-container">
                <label for="country">Country</label>
                <select id="country" class="CountryList" name="country">
                <option value=""disabled selected>-- '.$countryname.' --</option>
            ';
        } else {
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo 'window.location.href("login.php");';
            echo '</script>';
        } 
    }


    // User Profile
    // Get User Profile Information When Login
    function getAdminProfile(){
        global $connection;
        if (!empty($_SESSION['email']) && !empty($_SESSION['password'])) {
            $email =  $_SESSION['email'];
            $password = $_SESSION['password'];
            $query = "SELECT * FROM admin;";
            $result = mysqli_query($connection, $query);
            
            if($result){
                $data = array(); 
    
                while($row = mysqli_fetch_assoc($result)){
                    $data[] = $row;
    
                    $emaildata = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
                    $passworddata = htmlspecialchars($row['password'], ENT_QUOTES, 'UTF-8');
    
                    if($email == $emaildata && $password == $passworddata){
                        $adminid = htmlspecialchars($row['adminid'], ENT_QUOTES, 'UTF-8');
                        $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
                        $email = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8');
                        $gender = htmlspecialchars($row['gender'], ENT_QUOTES, 'UTF-8');
                        break;
                    }
                }
            }

            echo'
            <div class="container">
            <div class="white_box"> 
                <div class="logo-container">
                    <img src="image/logo1.png" class="logo">
                    <span class="logo-text">Society <br> Connect </span>
                </div>
                <div class="main-content">
                    <a href="adminprofile1.php" class="n-content"><i class="fa-solid fa-user"></i>Admin Info</a>
                    <a href="adminprofile2.php" class="n-content"><i class="fa-solid fa-briefcase"></i>Database</a>
                    <a href="adminprofile3.php" class="n-content"><i class="fa-solid fa-layer-group"></i>Approval</a>
                </div>
                <a href="" class="log-out" style="margin-top:19%" onclick="logout()"><i class="fa-solid fa-arrow-right-from-bracket"></i>Log Out</a>
            </div>
    
            <div class="light_box">
                <div class="BannerBox"><img src="image/default_banner.jpg"></div>
                <div class="Profile"><img src="image/default_profile.png"></div>
                    <div class="AboveLeft"><p>'.$name.'</p>
                        <p><a href="" class="font_size">'.$email.'</a></p>
                    </div>
                    
                    <div class="AboveRight">
                        <img src="image/idtag.png" class="AboveMarker">
                        <div class="AboveRight">'.$adminid.'</div>
                    </div>
                    
                    <div class="about">
                        <h2 class="h1-content">Procedure</h2>
                            <p>
                                Title: Administration Interface Operation Procedure<br>
                                <br>
                                Objective:<br>
                                This procedure outlines the steps for accessing and utilizing the administration interface to manage system settings, user accounts, and other administrative tasks.<br>
                                <br>
                                Procedure:<br>
                                <br>
                                Accessing the Administration Interface:<br>
                                a. Open a web browser and navigate to the designated URL for the administration interface.<br>
                                b. Enter your username and password to log in to the system.<br>
                                <br>
                                Navigating the Dashboard:<br>
                                a. Upon successful login, you will be directed to the dashboard.<br>
                                b. Review the overview of system activities, alerts, and recent updates displayed on the dashboard.<br>
                                c. Use the navigation menu or dashboard widgets to access specific administrative functions.<br>
                                <br>
                                Managing System Settings:<br>
                                a. Navigate to the "Settings" or "System Configuration" section of the interface.<br>
                                b. Update system-wide settings such as timezone, language preferences, email configuration, etc., as needed.<br>
                                c. Save changes and ensure that they are applied across the system.<br>
                                <br>
                                Managing User Accounts:<br>
                                a. Access the "User Management" or "User Accounts" section.<br>
                                b. Add new user accounts or edit existing ones by providing necessary details such as username, email, role permissions, etc.<br>
                                c. Activate, deactivate, or delete user accounts as required.<br>
                                d. Ensure that user accounts are properly configured to maintain security and access levels.<br>
                                <br>
                                Monitoring System Activity:<br>
                                a. Navigate to the "Logs" or "Audit Trail" section to review system activity logs.<br>
                                b. Monitor user actions, system events, and any potential security incidents.<br>
                                c. Take necessary actions based on log entries, such as investigating suspicious activities or resolving errors.<br>
                                <br>
                                Performing Routine Maintenance:<br>
                                a. Regularly check for system updates and patches.<br>
                                b. Schedule backups of critical data and configurations to prevent data loss.<br>
                                c. Monitor system performance and address any issues promptly to ensure optimal operation.<br>
                                <br>
                                Logging Out:<br>
                                a. Once administrative tasks are completed, log out of the administration interface to secure access.<br>
                                b. Close the web browser window to prevent unauthorized access to the system.<br>
                            </p>
                    </div>
        
                    <div class="main-content-2">
                        <h5 class="h5-content">Job Title: <span>Admin</span></h5> 
                        <h5 class="h5-content">Gender: <span>'.$gender.'</span></h5>
                        <h5 class="h5-content">Email: <span>'.$email.'</span></h5>      
                    </div>
                </div>
            </div>
            ';
        } else {
            echo '<script>';
            echo 'window.alert("Please Login First!");';
            echo 'window.location.href("login.php");';
            echo '</script>';
        } 
    }
?>   