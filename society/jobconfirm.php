<?php
  include 'dbConn.php';
  include 'function.php';

  global $connection;
  $jobid = isset($_GET['id']) ? $_GET['id'] : null;

  $companyname = isset($_POST['txtcompanyname']) ? $_POST['txtcompanyname'] : "";
  $companyurl = isset($_POST['txtcompanyurl']) ? $_POST['txtcompanyurl'] : "";
  $jobtitle = isset($_POST['txtjobtitle']) ? $_POST['txtjobtitle'] : "";
  $categoryid = isset($_POST['jobcategory']) ? $_POST['jobcategory'] : "";
  $jobtype = isset($_POST['jobtype']) ? $_POST['jobtype'] : "";
  $city = isset($_POST['txtcity']) ? $_POST['txtcity'] : "";
  $countryid = isset($_POST['country']) ? $_POST['country'] : "";
  $deadline = isset($_POST['deadline']) ? $_POST['deadline'] : "";
  $joburl = isset($_POST['txtjoburl']) ? $_POST['txtjoburl'] : "";
  $salaryrange = isset($_POST['salaryrange']) ? $_POST['salaryrange'] : "";
  $jobdescription = isset($_POST['txtjobdescription']) ? $_POST['txtjobdescription'] : "";
  $jobrequirement = isset($_POST['txtjobrequirement']) ? $_POST['txtjobrequirement'] : "";
  $finishstatus = '';
  
  // Logic for update and post 
  if (isset($_POST['btnPost'])){
        $finishstatus = '1';
        $query = "UPDATE `jobpost` SET `finishstatus` = '$finishstatus' WHERE `jobid` = $jobid ;";
        $result = mysqli_query($connection, $query);

        // If banner image is not empty
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
                        $query = "UPDATE `jobpost` SET `bannerid` = '$bannerid' WHERE `jobid` = $jobid ;";
                        $result = mysqli_query($connection, $query);
                    }
                } 
            }
        }

        // If profile image is not empty
        if (!empty($_FILES["profile"]["name"])) {
            $filename = $_FILES["profile"]["name"];
            $tempname = $_FILES["profile"]["tmp_name"];
            $folder = "./userdata/" . $filename;
            $formattedprofile = $filename = "userdata/" . $_FILES["profile"]["name"];
            $insertQuery = "INSERT INTO `profile` (`name`, `source`) VALUES ('companyprofile', '$formattedprofile ')";
    
            if (mysqli_query($connection, $insertQuery)) {
    
                if (move_uploaded_file($tempname, $folder)) {
    
                    $selectQuery = "SELECT profileid FROM `profile` WHERE `name` = 'companyprofile' AND `source` = '$filename'";
                    $result = mysqli_query($connection, $selectQuery);
                    if ($result && $row = mysqli_fetch_assoc($result)) {
                        $profileid = $row['profileid'];
                        $query = "UPDATE `jobpost` SET `profileid` = '$profileid' WHERE `jobid` = $jobid ;";
                        $result = mysqli_query($connection, $query);
                    }
                }
            }
        }

        if($companyname != ""){
            $query = "UPDATE `jobpost` SET `companyname` = '$companyname' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($companyurl != ""){
            $query = "UPDATE `jobpost` SET `companyurl` = '$companyurl' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($jobtitle != ""){
            $query = "UPDATE `jobpost` SET `jobtitle` = '$jobtitle' WHERE `jobid` = $jobid;";
            $result = mysqli_query($connection, $query);
        }
        if($categoryid != ""){
            $query = "UPDATE `jobpost` SET `categoryid` = '$categoryid' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($deadline != ""){
            $query = "UPDATE `jobpost` SET `deadline` = '$deadline' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($countryid != ""){
            $query = "UPDATE `jobpost` SET `countryid` = '$countryid' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($jobtype != ""){
            $query = "UPDATE `jobpost` SET `jobtype` = '$jobtype' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($joburl != ""){
            $query = "UPDATE `jobpost` SET `joburl` = '$joburl' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($salaryrange != ""){
            $query = "UPDATE `jobpost` SET `salaryrange` = '$salaryrange' WHERE `jobid`= $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($jobdescription != ""){
            $query = "UPDATE `jobpost` SET `jobdescription` = '$jobdescription' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($jobrequirement != ""){
            $query = "UPDATE `jobpost` SET `jobrequirement` = '$jobrequirement' WHERE `jobid`= $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        echo '<script>';
        echo 'window.alert("Post Sucess!");';
        echo 'location.href="jobfinder.php";';
        echo '</script>';

    } elseif (isset($_POST['btnSave'])) {  
        $finishstatus = '0';
        $query = "UPDATE `jobpost` SET `finishstatus` = '$finishstatus' WHERE `jobid` = $jobid ;";
        $result = mysqli_query($connection, $query);

        // If banner image is not empty
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
                        $query = "UPDATE `jobpost` SET `bannerid` = '$bannerid' WHERE `jobid` = $jobid ;";
                        $result = mysqli_query($connection, $query);
                    }
                } 
            }
        }

        // If profile image is not empty
        if (!empty($_FILES["profile"]["name"])) {
            $filename = $_FILES["profile"]["name"];
            $tempname = $_FILES["profile"]["tmp_name"];
            $folder = "./userdata/" . $filename;
            $formattedprofile = $filename = "userdata/" . $_FILES["profile"]["name"];
            $insertQuery = "INSERT INTO `profile` (`name`, `source`) VALUES ('companyprofile', '$formattedprofile ')";
    
            if (mysqli_query($connection, $insertQuery)) {
    
                if (move_uploaded_file($tempname, $folder)) {
    
                    $selectQuery = "SELECT profileid FROM `profile` WHERE `name` = 'companyprofile' AND `source` = '$filename'";
                    $result = mysqli_query($connection, $selectQuery);
                    if ($result && $row = mysqli_fetch_assoc($result)) {
                        $profileid = $row['profileid'];
                        $query = "UPDATE `jobpost` SET `profileid` = '$profileid' WHERE `jobid` = $jobid ;";
                        $result = mysqli_query($connection, $query);
                    }
                }
            }
        }

        if($companyname != ""){
            $query = "UPDATE `jobpost` SET `companyname` = '$companyname' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($companyurl != ""){
            $query = "UPDATE `jobpost` SET `companyurl` = '$companyurl' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($jobtitle != ""){
            $query = "UPDATE `jobpost` SET `jobtitle` = '$jobtitle' WHERE `jobid` = $jobid;";
            $result = mysqli_query($connection, $query);
        }
        if($categoryid != ""){
            $query = "UPDATE `jobpost` SET `categoryid` = '$categoryid' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($deadline != ""){
            $query = "UPDATE `jobpost` SET `deadline` = '$deadline' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($countryid != ""){
            $query = "UPDATE `jobpost` SET `countryid` = '$countryid' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($jobtype != ""){
            $query = "UPDATE `jobpost` SET `jobtype` = '$jobtype' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($joburl != ""){
            $query = "UPDATE `jobpost` SET `joburl` = '$joburl' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($salaryrange != ""){
            $query = "UPDATE `jobpost` SET `salaryrange` = '$salaryrange' WHERE `jobid`= $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($jobdescription != ""){
            $query = "UPDATE `jobpost` SET `jobdescription` = '$jobdescription' WHERE `jobid` = $jobid ;";
            $result = mysqli_query($connection, $query);
        }
        if($jobrequirement != ""){
            $query = "UPDATE `jobpost` SET `jobrequirement` = '$jobrequirement' WHERE `jobid`= $jobid ;";
            $result = mysqli_query($connection, $query);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Society</title>
    <link rel="icon" href="image/logo1.png">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/postjob.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <script src="javascript/signin.js"></script>
    <script src="javascript/function.js"></script>
    <script src="https://kit.fontawesome.com/0b02c7455f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat:wght@400;700&family=Oswald:wght@700&family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
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
        <h1 style="font-family: Ubuntu;"><a href="#">Society Connect</a></h1>
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
              <li class="opt" onclick="redirectTo('postjob.php')">
                <span class="opt-text">Post Job</span>
              </li>
              <li class="opt" onclick="redirectTo('postevent.php')">
                <span class="opt-text">Post Event</span>
              </li>
              <li class="opt" onclick="redirectTo('postlesson.php')">
                <span class="opt-text">Post Course</span>
              </li>
              <li class="opt" onclick="redirectWhenLogin('profile1.php')">
                <span class="opt-text">Profile</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    
    <!--Post Event Content-->
    <section>
        <section>
            <div class="ContainerJobImg">
                <img class="img1" src="image/job.png" alt="Create a Job">
                <div class="text">
                    <p>Create a <span>Job</span></p>
                </div>
            </div>
        </section>

        <!-- Get Previous Value From Data By Id -->
        <?php
            $pageid = isset($_GET['id']) ? $_GET['id'] : null;

            $query = "SELECT * FROM jobpost WHERE jobid = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "i", $pageid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Fetch the data
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;

                $jobid = htmlspecialchars($row['jobid'], ENT_QUOTES, 'UTF-8');
                $jobtitle = htmlspecialchars($row['jobtitle'], ENT_QUOTES, 'UTF-8');
                $companyname = htmlspecialchars($row['companyname'], ENT_QUOTES, 'UTF-8');
                $companyurl = htmlspecialchars($row['companyurl'], ENT_QUOTES, 'UTF-8');
                $salaryrange = htmlspecialchars($row['salaryrange'], ENT_QUOTES, 'UTF-8');
                $deadline = htmlspecialchars($row['deadline'], ENT_QUOTES, 'UTF-8');
                $joburl = htmlspecialchars($row['joburl'], ENT_QUOTES, 'UTF-8');
                $jobtype = htmlspecialchars($row['jobtype'], ENT_QUOTES, 'UTF-8');
                $jobdescription = htmlspecialchars($row['jobdescription'], ENT_QUOTES, 'UTF-8');
                $jobrequirement = htmlspecialchars($row['jobrequirement'], ENT_QUOTES, 'UTF-8');
                $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

                $countryid = isset($row['countryid']) ? htmlspecialchars($row['countryid'], ENT_QUOTES, 'UTF-8') : null;
                $categoryid = isset($row['categoryid']) ? htmlspecialchars($row['categoryid'], ENT_QUOTES, 'UTF-8') : null;
                $bannerid = isset($row['bannerid']) ? htmlspecialchars($row['bannerid'], ENT_QUOTES, 'UTF-8') : null;
                $profileid = isset($row['profileid']) ? htmlspecialchars($row['profileid'], ENT_QUOTES, 'UTF-8') : null;
                $userid = isset($row['userid']) ? htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8') : null;

                $countrynameQuery = "SELECT name FROM country WHERE countryid = " . ($countryid ? "'" . $countryid . "'" : 'NULL');
                $categorynameQuery = "SELECT name FROM category WHERE categoryid = " . ($categoryid ? "'" . mysqli_real_escape_string($connection, $categoryid) . "'" : 'NULL');
                $bannernameQuery = "SELECT source FROM banner WHERE bannerid = " . ($bannerid ? "'" . $bannerid . "'" : 'NULL');
                $profilenameQuery = "SELECT source FROM profile WHERE profileid = " . ($profileid ? "'" . $profileid . "'" : 'NULL');

                $countrynameResult = mysqli_query($connection, $countrynameQuery);
                $categorynameResult = mysqli_query($connection, $categorynameQuery);
                $bannernameResult = mysqli_query($connection, $bannernameQuery);
                $profilenameResult = mysqli_query($connection, $profilenameQuery);

                $countryname = ($countrynameResult && $countrynameRow = mysqli_fetch_assoc($countrynameResult)) ? $countrynameRow['name'] : 'N/A';
                $categoryname = ($categorynameResult && $categorynameRow = mysqli_fetch_assoc($categorynameResult)) ? $categorynameRow['name'] : 'N/A';
                $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';
                $profilesource = ($profilenameResult && $profilenameRow = mysqli_fetch_assoc($profilenameResult)) ? $profilenameRow['source'] : 'N/A';
            }
            echo'
            <section>
            <form id="form" action="#" method="POST" enctype="multipart/form-data">
                <div class="ContainerList">
                    <div class="List1">
                        <div>
                            <p>Company Name</p>
                            <input class="input1" type="text" value="'.$companyname.'" name="txtcompanyname" required>
                        </div>
                        <div>
                            <p>Company Website</p>
                            <input class="input2" type="text" value="'.$companyurl.'" name="txtcompanyurl" required>
                        </div>
                    </div>
  
                    <div class="List2">
                        <div>
                            <p>Job Title</p>
                            <input class="input1" type="text" value="'.$jobtitle.'" name="txtjobtitle" required>
                        </div>
                    </div>
  
                    <div class="List3">
                        <!--Job Category-->
                        <div class="List_3">
                            <p>Job Category</p>
                            <select class="select-btn2" id="Category" name="jobcategory">
                                <option value="'.$categoryid.'" disabled selected>'.$categoryname.'</option>';
                                printJobCategory(); 
            echo'
                                </select>
                                </div>       
                                <!--Job Type-->
                                <div>
                                    <div class="select-menu1">
                                        <p>Job type</p>
                                        <select class="select-btn2" id="JobType" name="jobtype">
                                            <option value="" disabled selected>'.$jobtype.'</option>
                                            <option value="Internship">Internship</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Full Time">Full Time</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
          
                            <div class="List4">
                                <!--Country-->
                                <div class="List_4">
                                    <div>
                                        <p>City, State Or Area</p>
                                        <input class="input2" type="text" placeholder="City/Name" name="txtcity">
                                    </div>
                                    <div>
                                        <p>Country</p>
                                        <select class="select-menu3" id="Country" name="country" required>
                                            <option value="'.$countryid.'" disabled selected>'.$countryname.'</option>';
                                            printCountry();
            echo'
                                        </select>
                                    </div>
                                </div>
                                <!--Salary Range-->
                                <div>
                                    <p>Salary Range</p>
                                    <div class="select-menu">
                                        <select class="select-btn" id="Salary" name="salaryrange" required>
                                            <option value="'.$salaryrange.'" disabled selected>'.$salaryrange.'</option>
                                            <option value="Free">Free</option>
                                            <option value="$1000 ~ $2000">$1000 ~ $2000</option>
                                            <option value="$2000 ~ $5000">$2000 ~ $5000</option>
                                            <option value="$5000 ~ $10000">$5000 ~ $10000</option>
                                            <option value="$10000 ~ $20000">$10000 ~ $20000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
          
                            <div class="List5">
                                <div>
                                    <p>Company Profile</p>
                                    <label id="companyprofile" for="input-file1">'.$profilesource.'</label>
                                    <input style="display:none" id="input-file1" class="input1" type="file" accept="image/jpeg, image/png, image/jpg" name="profile">
                                </div>
                                <div>
                                    <p>Company Banner</p>
                                    <label for="input-file2">'.$bannersource.'</label>
                                    <input style="display:none" id="input-file2" class="input2" type="file" accept="image/jpeg, image/png, image/jpg" name="banner">
                                </div>
                            </div>
          
                            <div class="List6">
                              <div>
                                <p>Application Deadline</p>
                                <label class="input1" for="deadline"></label>
                                <input type="date" id="deadline" name="deadline" value="'.$deadline.'" required>
                              </div>
                            </div>
          
                            <div class="List7">
                              <div>
                                <p>Job Application Link</p>
                                <input class="input1" type="text" value="'.$joburl.'" name="txtjoburl" required>
                              </div>
                            </div>
          
                            <div class="List8">
                              <div>
                                <p>Job Description</p>
                                <textarea class="input1" rows="100" placeholder="'.$jobdescription.'" value="'.$jobdescription.'" name="txtjobdescription"></textarea>
                              </div>
                            </div>
          
                            <div class="List9">
                              <div>
                                <p>Job Requirement</p>
                                <textarea class="input1"  rows="100" placeholder="'.$jobrequirement.'" value="'.$jobrequirement.'" name="txtjobrequirement"></textarea>
                              </div>
                            </div>
          
                            <div class="List10">
                              <div class="Save">
                                <input type="submit" value="Save" name="btnSave" placeholder="Save"></input>  
                              </div>
                              <div class="Post">
                                <input type="submit" value="Post" name="btnPost" placeholder="Post"></input>
                              </div>
                            </div>
                        </div>
                    </form>
                </section>
                ';
        ?>
    </section>
  <script src="javascript/header.js"></script>
</body>
</html>