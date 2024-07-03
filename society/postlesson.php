<?php
  include 'dbConn.php';
  include 'function.php';

  global $connection;
  $lecturername = isset($_POST['lecturername']) ? $_POST['lecturername'] : "";
  $lecturerhour = isset($_POST['lecturerhour']) ? $_POST['lecturerhour'] : "";
  $categoryid = isset($_POST['category']) ? $_POST['category'] : "";
  $price = isset($_POST['price']) ? $_POST['price'] : "";
  $lecturerdescription = isset($_POST['lecturerdescription']) ? $_POST['lecturerdescription'] : "";
  $lecturertitle = isset($_POST['lecturertitle']) ? $_POST['lecturertitle'] : "";
  $finishstatus = '';
  
  if (isset($_POST['btnPost'])){
      $finishstatus = '1';
      logicLessonPost($lecturername,$lecturerhour,$lecturertitle,$categoryid,$price,$lecturerdescription,$finishstatus);
  } elseif (isset($_POST['btnSave'])) {  
      $finishstatus = '0';
      logicLessonPost($lecturername,$lecturerhour,$lecturertitle,$categoryid,$price,$lecturerdescription,$finishstatus);
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
  <link rel="stylesheet" href="css/postlesson.css">
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

  
    <section>
      <div class="ContainerLessonImg">
        <img class="img1" src="image/lesson.png" alt="Create a Course">
        <div class="text">
          <p>Create a <span>Course</span></p>
        </div>
      </div>
    </section>

    <form action="#" method="POST" enctype="multipart/form-data">
      <section>
        <div class="ContainerList">
          <div class="List1">
            <div>
              <p>Lecture Name</p>
              <input class="input1" type="text" placeholder="Name" name="lecturername">
            </div>
            <div>
              <p>Lecture Hour</p>
              <select class="input2" type="text" id="lecturerHourInput" name="lecturerhour">
                <option value="" disabled selected>Lecturer Hour</option>
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
              <input class="input1" type="text" placeholder="Title" name="lecturertitle">
            </div>
          </div>
      
          <div class="List3">
            <div>
              <p>Video Category</p>
              <select class="input1" id="Category" name="category">
                  <option value="" disabled selected>Category</option>
                  <?php printCategory('CS%') ?>
              </select>
            </div>
            <div>
              <p>Fees</p>
              <select class="input2" id="Price" name="price">
                  <option value="" disabled selected>Price: $</option>
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
              <label for="input1"></label>
              <input class="input1" id="input1" type="file" id="videoInput" accept="video/*" name="video" required>
            </div>
            <div>
              <p>Thumbnail</p>
              <label for="input2"></label>
              <input class="input2" id="input2" type="file" accept="image/jpeg, image/png, image/jpg" placeholder="Upload" name="banner">
            </div>
          </div>
    
          <div class="List5">
            <div>
              <p>Lecturer Description</p>
              <textarea class="input1" placeholder="Text" name="lecturerdescription"></textarea>
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
  <script src="javascript/header.js"></script>
</body>
</html>
