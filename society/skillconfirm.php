<?php
    include 'dbConn.php';
    include 'function.php';

    global $connection;
    $courseid = isset($_GET['id']) ? $_GET['id'] : null;

    $lecturername = isset($_POST['lecturername']) ? $_POST['lecturername'] : "";
    $lecturerhour = isset($_POST['lecturerhour']) ? $_POST['lecturerhour'] : "";
    $categoryid = isset($_POST['category']) ? $_POST['category'] : "";
    $price = isset($_POST['price']) ? $_POST['price'] : "";
    $lecturerdescription = isset($_POST['lecturerdescription']) ? $_POST['lecturerdescription'] : "";
    $lecturertitle = isset($_POST['lecturertitle']) ? $_POST['lecturertitle'] : "";
    $finishstatus = '';

    if (isset($_POST['btnPost'])){

      $finishstatus = '1';
      $query = "UPDATE `coursepost` SET `finishstatus` = '$finishstatus' WHERE `courseid` = $courseid ;";
      $result = mysqli_query($connection, $query);

      if (!empty($_FILES["banner"]["name"])) {
          $filename = $_FILES["banner"]["name"];
          $tempname = $_FILES["banner"]["tmp_name"];
          $folder = "./userdata/" . $filename;
          $formattedfilename = $filename = "userdata/" . $_FILES["banner"]["name"];

          if (mysqli_query($connection, $query)) {
              if (move_uploaded_file($tempname, $folder)) {
                  $selectQuery = "SELECT bannerid FROM `banner` WHERE `name` = 'lessonbanner' AND `source` = '$filename'";
                  $result = mysqli_query($connection, $selectQuery);
                  if ($result && $row = mysqli_fetch_assoc($result)) {
                      $bannerid = $row['bannerid'];
                      $query = "UPDATE `coursepost` SET `bannerid` = '$bannerid' WHERE `courseid` = $courseid ;";
                      $result = mysqli_query($connection, $query);
                  }
              } 
          }
      }

      if (isset($_FILES["video"])) {
          $videoFile = $_FILES["video"];
          $videoName = $videoFile["name"];
          $fileTmpName = $videoFile["tmp_name"];
          $fileSize = $videoFile["size"];
          $fileError = $videoFile["error"];

          if ($fileError === UPLOAD_ERR_OK) {
              $destination = "userdata/" . $videoName;
              move_uploaded_file($fileTmpName, $destination);
              $query = "UPDATE `coursepost` SET `videourl` = '$destination' WHERE `courseid` = $courseid ;";
              $result = mysqli_query($connection, $query);
          }
      }

      if($categoryid != ""){
          $query = "UPDATE `coursepost` SET `categoryid` = '$categoryid' WHERE `courseid` = $courseid ;";
          $result = mysqli_query($connection, $query);
      }
      if($lecturername != ""){
          $query = "UPDATE `coursepost` SET `lecturername` = '$lecturername' WHERE `courseid` = $courseid ;";
          $result = mysqli_query($connection, $query);
      }
      if($lecturerhour != ""){
          $query = "UPDATE `coursepost` SET `coursehour` = '$lecturerhour' WHERE `courseid` = $courseid ;";
          $result = mysqli_query($connection, $query);
      }
      if($price != ""){
          $query = "UPDATE `coursepost` SET `feeindollar` = '$price' WHERE `courseid` = $courseid;";
          $result = mysqli_query($connection, $query);
      }
      if($lecturerdescription != ""){
          $query = "UPDATE `coursepost` SET `coursedescription` = '$lecturerdescription' WHERE `courseid` = $courseid ;";
          $result = mysqli_query($connection, $query);
      }
      if($lecturertitle != ""){
          $query = "UPDATE `coursepost` SET `coursetitle` = '$lecturertitle' WHERE `courseid` = $courseid ;";
          $result = mysqli_query($connection, $query);
      }

      echo '<script>';
      echo 'window.alert("Post Sucess!");';
      echo 'location.href="skillsync.php";';
      echo '</script>';

    } elseif (isset($_POST['btnSave'])) {  

      $finishstatus = '0';
      $query = "UPDATE `coursepost` SET `finishstatus` = '$finishstatus' WHERE `courseid` = $courseid ;";
      $result = mysqli_query($connection, $query);

      if (!empty($_FILES["banner"]["name"])) {
        $filename = $_FILES["banner"]["name"];
        $tempname = $_FILES["banner"]["tmp_name"];
        $folder = "./userdata/" . $filename;
        $formattedfilename = $filename = "userdata/" . $_FILES["banner"]["name"];
        $query = "INSERT INTO `banner` (`name`, `source`) VALUES ('lessonbanner', '$formattedfilename')";

        if (mysqli_query($connection, $query)) {
          if (move_uploaded_file($tempname, $folder)) {
            $selectQuery = "SELECT bannerid FROM `banner` WHERE `name` = 'lessonbanner' AND `source` = '$filename'";
            $result = mysqli_query($connection, $selectQuery);
            if ($result && $row = mysqli_fetch_assoc($result)) {
              $bannerid = $row['bannerid'];
              $query = "UPDATE `coursepost` SET `bannerid` = '$bannerid' WHERE `courseid` = $courseid ;";
              $result = mysqli_query($connection, $query);
            }
          } 
        }
      }

      if (isset($_FILES["video"])) {
        $videoFile = $_FILES["video"];
        $videoName = $videoFile["name"];
        $fileTmpName = $videoFile["tmp_name"];
        $fileSize = $videoFile["size"];
        $fileError = $videoFile["error"];

        if ($fileError === UPLOAD_ERR_OK) {
          $destination = "userdata/" . $videoName;
          move_uploaded_file($fileTmpName, $destination);
          $query = "UPDATE `coursepost` SET `videourl` = '$destination' WHERE `courseid` = $courseid ;";
          $result = mysqli_query($connection, $query);
        }
      }
      
      if($categoryid != ""){
        $query = "UPDATE `coursepost` SET `categoryid` = '$categoryid' WHERE `courseid` = $courseid ;";
        $result = mysqli_query($connection, $query);
      }
      if($lecturername != ""){
        $query = "UPDATE `coursepost` SET `lecturername` = '$lecturername' WHERE `courseid` = $courseid ;";
        $result = mysqli_query($connection, $query);
      }
      if($lecturerhour != ""){
        $query = "UPDATE `coursepost` SET `coursehour` = '$lecturerhour' WHERE `courseid` = $courseid ;";
        $result = mysqli_query($connection, $query);
      }
      if($price != ""){
        $query = "UPDATE `coursepost` SET `feeindollar` = '$price' WHERE `courseid` = $courseid;";
        $result = mysqli_query($connection, $query);
      }
      if($lecturerdescription != ""){
        $query = "UPDATE `coursepost` SET `coursedescription` = '$lecturerdescription' WHERE `courseid` = $courseid ;";
        $result = mysqli_query($connection, $query);
      }
      if($lecturertitle != ""){
        $query = "UPDATE `coursepost` SET `coursetitle` = '$lecturertitle' WHERE `courseid` = $courseid ;";
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
  <link rel="stylesheet" href="css/postlesson.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="javascript/function.js"></script>
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
  </script>
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

  
    <section>
      <div class="ContainerLessonImg">
        <img class="img1" src="image/lesson.png" alt="Create a Course">
        <div class="text">
          <p>Create a <span>Course</span></p>
        </div>
      </div>
    </section>

    <!--Get Previous Entry From Database By Id-->
    <?php
        $pageid = isset($_GET['id']) ? $_GET['id'] : null;

        $query = "SELECT * FROM coursepost WHERE courseid = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $pageid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if($result){
            $data = array(); 
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
                
                $courseid = htmlspecialchars($row['courseid'], ENT_QUOTES, 'UTF-8');
                $lecturername = htmlspecialchars($row['lecturername'], ENT_QUOTES, 'UTF-8');
                $coursehour = htmlspecialchars($row['coursehour'], ENT_QUOTES, 'UTF-8');
                $coursetitle = htmlspecialchars($row['coursetitle'], ENT_QUOTES, 'UTF-8');
                $coursedescription = htmlspecialchars($row['coursedescription'], ENT_QUOTES, 'UTF-8');
                $feeindollar = htmlspecialchars($row['feeindollar'], ENT_QUOTES, 'UTF-8');
                $videourl = htmlspecialchars($row['videourl'], ENT_QUOTES, 'UTF-8');
                $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

                $categoryid = isset($row['categoryid']) ? htmlspecialchars($row['categoryid'], ENT_QUOTES, 'UTF-8') : null;
                $bannerid = isset($row['bannerid']) ? htmlspecialchars($row['bannerid'], ENT_QUOTES, 'UTF-8') : null;

                $categorynameQuery = "SELECT name FROM category WHERE categoryid = " . ($categoryid ? "'" . $categoryid . "'" : 'NULL');
                $bannernameQuery = "SELECT source FROM banner INNER JOIN coursepost on coursepost.bannerid = banner.bannerid WHERE 
                courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');

                $categorynameResult = mysqli_query($connection, $categorynameQuery);
                $bannernameResult = mysqli_query($connection, $bannernameQuery);

                $categoryname = ($categorynameResult && $categorynameRow = mysqli_fetch_assoc($categorynameResult)) ? $categorynameRow['name'] : 'N/A';
                $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';
            }
        }

        echo'
        <form action="#" method="POST" enctype="multipart/form-data">
            <section>
                <div class="ContainerList">
                <div class="List1">
                    <div>
                    <p>Lecture Name</p>
                    <input class="input1" type="text" placeholder="'.$lecturername.'" name="lecturername">
                    </div>
                    <div>
                    <p>Lecture Hour</p>
                    <select class="input2" type="text" id="lecturerHourInput" name="lecturerhour">
                        <option value="'.$coursehour.'" disabled selected>'.$coursehour.'</option>
                        <option value="1 HOUR">1 HOUR</option>
                        <option value="2 HOUR">2 HOUR</option>
                        <option value="3 HOUR">3 HOUR</option>
                        <option value="4 HOUR">4 HOUR</option>
                        <option value="5 HOUR">5 HOUR</option>
                        <option value="6 HOUR">6 HOUR</option>
                    </select>
                    </div>
                </div>
            
                <div class="List2">
                    <div>
                    <p>Lecture Title</p>
                    <input class="input1" type="text" placeholder="'.$coursetitle.'" name="lecturertitle">
                    </div>
                </div>
            
                <div class="List3">
                    <div>
                    <p>Video Category</p>
                    <select class="input1" id="Category" name="category">
                        <option value="'.$categoryid.'" disabled selected>'.$categoryname.'</option>';
                    printCategory('CS%');
            echo'
                    </select>
                    </div>
                    <div>
                    <p>Fees</p>
                    <select class="input2" id="Price" name="price">
                        <option value="'.$feeindollar.'" disabled selected>'.$feeindollar.'</option>
                        <option value="Free">Free</option>
                        <option value="$10">$10</option>
                        <option value="$20">$20</option>
                        <option value="$30">$30</option>
                        <option value="$40">$40</option>
                        <option value="$50">$50</option>
                    </select>
            
                    </div>
                </div>

                <div class="List4">
                    <div>
                    <p>Upload Video</p>
                    <label for="input1">'.$videourl.'</label>
                    <input style="display:none" class="input1" id="input1" type="file" id="videoInput" accept="video/mp4,video/x-m4v,video/*" name="video">
                    </div>
                    <div>
                    <p>Thumbnail</p>
                    <label for="input2">'.$bannersource.'</label>
                    <input style="display:none" class="input2" id="input2" type="file" accept="image/jpeg, image/png, image/jpg" placeholder="Upload" name="banner">
                    </div>
                </div>
            
                <div class="List5">
                    <div>
                    <p>Lecturer Description</p>
                    <textarea class="input1" placeholder="'.$coursedescription.'" name="lecturerdescription"></textarea>
                    </div>
                </div>
            
                <div class="List6">
                    <div class="Save">
                    <input type="submit" id="Save "value="Save" name="btnSave" placeholder="Save"></input> 
                    </div>
                    <div class="Post">
                    <input type="submit" id="Post" value="Post" name="btnPost" placeholder="Post"></input>
                    </div>
                </div>
                </div>
            </section>
        </form>
        ';
    ?>

  <script src="javascript/header.js"></script>
</body>
</html>
