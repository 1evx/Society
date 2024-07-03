<?php 
  include 'dbConn.php';
  include 'function.php';

  global $connection;
  $eventtitle = isset($_POST['txttitle']) ? $_POST['txttitle'] : "";
  $startdate = isset($_POST['txtsdate']) ? $_POST['txtsdate'] : "";
  $enddate = isset($_POST['txtedate']) ? $_POST['txtedate'] : "";
  $countryid = isset($_POST['txtcountry']) ? $_POST['txtcountry'] : "";
  $eventdescription = isset($_POST['txtdescription']) ? $_POST['txtdescription'] : "";
  $finishstatus = '';
  
  if (isset($_POST['btnPost'])){
      $finishstatus = '1';
      logicEventPost($eventtitle,$startdate,$enddate,$countryid,$eventdescription,$finishstatus);
  } elseif (isset($_POST['btnSave'])) {  
      $finishstatus = '0';
      logicEventPost($eventtitle,$startdate,$enddate,$countryid,$eventdescription,$finishstatus);
      echo '<script>';
      echo 'window.alert("Please fill all the field!");';
      echo '</script>';
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
        <h1 style="font-family:'Inter',sans-serif;"><a href="#">Society Connect</a></h1>
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
              <input class="input1" type="text" placeholder="Title" name="txttitle" required>
            </div>
          </div>
      
          <div class="List2">
            <div>
              <p>Start Date</p>
              <input class="input1" type="date" placeholder="Start Date" name="txtsdate" required>
            </div>
            <div>
              <p>End Date</p>
              <input class="input2" type="date" placeholder="End Date" name="txtedate" required>
            </div>
          </div>
    
          <div class="List3">
            <div class="List_3">
              <p>Location</p>
              <select class="select-menu3" id="Country" name="txtcountry">
                  <option value="" disabled selected>Select Your Option</option>
                  <?php printCountry() ?>
              </select>
            </div>
            <div>
              <p>Thumbnail</p>
              <label for="input-file2"></label>
              <input id="input-file2" class="input2" type="file" accept="image/jpeg, image/png, image/jpg" name="banner" required>
            </div>
          </div>
    
          <div class="List4">
            <div>
              <p>Event Description</p>
              <textarea class="input1"  rows="100" placeholder="Text" name="txtdescription" required></textarea>
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
  <script src="javascript/header.js"></script>
</body>
</html>
