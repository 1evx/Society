<?php
  include 'dbConn.php';
  include 'function.php';

  global $connection;
  $eventid = isset($_GET['id']) ? $_GET['id'] : null;

  $eventtitle = isset($_POST['txttitle']) ? $_POST['txttitle'] : "";
  $startdate = isset($_POST['txtsdate']) ? $_POST['txtsdate'] : "";
  $enddate = isset($_POST['txtedate']) ? $_POST['txtedate'] : "";
  $countryid = isset($_POST['txtcountry']) ? $_POST['txtcountry'] : "";
  $eventdescription = isset($_POST['txtdescription']) ? $_POST['txtdescription'] : "";
  $finishstatus = '';
  
  // Logic for update and post 
  if (isset($_POST['btnPost'])){
        $finishstatus = '1';
        $query = "UPDATE `eventpost` SET `finishstatus` = '$finishstatus' WHERE `eventid` = $eventid ;";
        $result = mysqli_query($connection, $query);

        // If banner image is not empty
        if (!empty($_FILES["banner"]["name"])) {
            $filename = $_FILES["banner"]["name"];
            $tempname = $_FILES["banner"]["tmp_name"];
            $folder = "./userdata/" . $filename;
            $formattedfilename = $filename = "userdata/" . $_FILES["banner"]["name"];
            $query = "INSERT INTO `banner` (`name`, `source`) VALUES ('eventbanner', '$formattedfilename')";
        
            if (mysqli_query($connection, $query)) {
                // Move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $folder)) {
                    // Retrieve bannerid for the inserted image
                    $selectQuery = "SELECT bannerid FROM `banner` WHERE `name` = 'eventbanner' AND `source` = '$filename'";
                    $result = mysqli_query($connection, $selectQuery);
                    if ($result && $row = mysqli_fetch_assoc($result)) {
                        $bannerid = $row['bannerid'];
                        $query = "UPDATE `eventpost` SET `bannerid` = '$bannerid' WHERE `eventid` = $eventid ;";
                        $result = mysqli_query($connection, $query);
                    }
                } 
            }
        }

        if($eventtitle != ""){
            $query = "UPDATE `eventpost` SET `title` = '$eventtitle' WHERE `eventid` = $eventid ;";
            $result = mysqli_query($connection, $query);
        }
        if($startdate != ""){
            $query = "UPDATE `eventpost` SET `startdate` = '$startdate' WHERE `eventid` = $eventid ;";
            $result = mysqli_query($connection, $query);
        }
        if($enddate != ""){
            $query = "UPDATE `eventpost` SET `enddate` = '$enddate' WHERE `eventid` = $eventid;";
            $result = mysqli_query($connection, $query);
        }
        if($countryid != ""){
            $query = "UPDATE `eventpost` SET `countryid` = '$countryid' WHERE `eventid` = $eventid ;";
            $result = mysqli_query($connection, $query);
        }
        if($eventdescription != ""){
            $query = "UPDATE `eventpost` SET `eventdescription` = '$eventdescription' WHERE `eventid` = $eventid ;";
            $result = mysqli_query($connection, $query);
        }

        echo '<script>';
        echo 'window.alert("Post Sucess!");';
        echo 'location.href="event.php";';
        echo '</script>';

    } elseif (isset($_POST['btnSave'])) {  
        $finishstatus = '0';
        $query = "UPDATE `eventpost` SET `finishstatus` = '$finishstatus' WHERE `eventid` = $eventid ;";
        $result = mysqli_query($connection, $query);

        // If banner image is not empty
        if (!empty($_FILES["banner"]["name"])) {
            $filename = $_FILES["banner"]["name"];
            $tempname = $_FILES["banner"]["tmp_name"];
            $folder = "./userdata/" . $filename;
            $formattedfilename = $filename = "userdata/" . $_FILES["banner"]["name"];
            $query = "INSERT INTO `banner` (`name`, `source`) VALUES ('eventbanner', '$formattedfilename')";
        
            if (mysqli_query($connection, $query)) {
                // Move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $folder)) {
                    // Retrieve bannerid for the inserted image
                    $selectQuery = "SELECT bannerid FROM `banner` WHERE `name` = 'eventbanner' AND `source` = '$filename'";
                    $result = mysqli_query($connection, $selectQuery);
                    if ($result && $row = mysqli_fetch_assoc($result)) {
                        $bannerid = $row['bannerid'];
                        $query = "UPDATE `eventpost` SET `bannerid` = '$bannerid' WHERE `eventid` = $eventid ;";
                        $result = mysqli_query($connection, $query);
                    }
                } 
            }
        }


        if($eventtitle != ""){
            $query = "UPDATE `eventpost` SET `title` = '$eventtitle' WHERE `eventid` = $eventid ;";
            $result = mysqli_query($connection, $query);
        }
        if($startdate != ""){
            $query = "UPDATE `eventpost` SET `startdate` = '$startdate' WHERE `eventid` = $eventid ;";
            $result = mysqli_query($connection, $query);
        }
        if($enddate != ""){
            $query = "UPDATE `eventpost` SET `enddate` = '$enddate' WHERE `eventid` = $eventid;";
            $result = mysqli_query($connection, $query);
        }
        if($countryid != ""){
            $query = "UPDATE `eventpost` SET `countryid` = '$countryid' WHERE `eventid` = $eventid ;";
            $result = mysqli_query($connection, $query);
        }
        if($eventdescription != ""){
            $query = "UPDATE `eventpost` SET `eventdescription` = '$eventdescription' WHERE `eventid` = $eventid ;";
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
  <link rel="stylesheet" href="css/postevent.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
  </script>
  <script src="javascript/function.js"></script>
  <script src="https://kit.fontawesome.com/0b02c7455f.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat:wght@400;700&family=Oswald:wght@700&family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
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
          <button class="button1">
            <i id="icon1" class="fa-solid fa-bell"></i>
          </button>
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
    
    <!--Get Previous Entry From Database by Id-->
    <?php 
      $pageid = isset($_GET['id']) ? $_GET['id'] : null;

      $query = "SELECT * FROM eventpost WHERE eventid = ?";
      $stmt = mysqli_prepare($connection, $query);
      mysqli_stmt_bind_param($stmt, "i", $pageid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      
      while ($row = mysqli_fetch_assoc($result)) {
          $data[] = $row;
              
          $eventid = htmlspecialchars($row['eventid'], ENT_QUOTES, 'UTF-8');
          $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
          $eventdescription = htmlspecialchars($row['eventdescription'], ENT_QUOTES, 'UTF-8');
          $startdate = htmlspecialchars($row['startdate'], ENT_QUOTES, 'UTF-8');
          $enddate = htmlspecialchars($row['enddate'], ENT_QUOTES, 'UTF-8');
          $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

          $countryid = isset($row['countryid']) ? htmlspecialchars($row['countryid'], ENT_QUOTES, 'UTF-8') : null;
          $bannerid = isset($row['bannerid']) ? htmlspecialchars($row['bannerid'], ENT_QUOTES, 'UTF-8') : null;

          $countrynameQuery = "SELECT name FROM country WHERE countryid = " . ($countryid ? "'" . $countryid . "'" : 'NULL');
          $bannernameQuery = "SELECT source FROM banner WHERE bannerid = " . ($bannerid ? "'" . $bannerid . "'" : 'NULL');


          $countrynameResult = mysqli_query($connection, $countrynameQuery);
          $bannernameResult = mysqli_query($connection, $bannernameQuery);

          $countryname = ($countrynameResult && $countrynameRow = mysqli_fetch_assoc($countrynameResult)) ? $countrynameRow['name'] : 'N/A';
          $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';
      }
      echo '
      <form id="form" action="#" method="POST" enctype="multipart/form-data">
        <section>
            <section>
            <div class="ContainerEventImg">
                <img class="img1" src="image/event.png" alt="Create an Event">
                <div class="text">
                <p>Create a <span>Event</span></p>
                </div>
            </div>
            </section>
            
            <section>
            <div class="ContainerList">
                <div class="List1">
                <div>
                    <p>Event Title</p>
                    <input class="input1" type="text" placeholder="'.$title.'" name="txttitle">
                </div>
                </div>
            
                <div class="List2">
                <div>
                    <p>Start Date</p>
                    <input class="input1" type="date" value="'.$startdate.'" name="txtsdate">
                </div>
                <div>
                    <p>End Date</p>
                    <input class="input2" type="date" value="'.$enddate.'" name="txtedate">
                </div>
                </div>

                <div class="List3">
                <div class="List_3">
                    <p>Location</p>
                    <select class="select-menu3" id="Country" name="txtcountry">
                        <option value="'.$countryid.'" disabled selected>'.$countryname.'</option>';
                        printCountry();
        echo'
                    </select>
                </div>
                <div>
                    <p>Thumbnail</p>
                    <label for="input-file2">'.$bannersource.'</label>
                    <input style="display:none" id="input-file2" class="input2" type="file" accept="image/jpeg, image/png, image/jpg" name="banner">
                </div>
                </div>

                <div class="List4">
                <div>
                    <p>Event Description</p>
                    <textarea class="input1"  rows="100" placeholder="'.$eventdescription.'" name="txtdescription"></textarea>
                </div>
                </div>

                <div class="List5">
                <div class="Save">
                    <input type="submit" value="Save" name="btnSave" placeholder="Save"></input> 
                </div>
                <div class="Post">
                    <input type="submit" value="Post" name="btnPost" placeholder="Post"></input>
                </div>
                </div>
            </div>
            </section>
        </section>
      </form>
      ';
    ?>

  <script src="javascript/header.js"></script>
</body>
</html>
