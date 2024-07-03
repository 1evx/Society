<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Society</title>
  <link rel="icon" href="image/logo1.png">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/coursereview.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="javascript/function.js" defer></script>
  <script src="https://kit.fontawesome.com/0b02c7455f.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat:wght@400;700&family=Oswald:wght@700&family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
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
          </ul>
            </div>
        </div>
        </div>
    </header>
  
   <!-- Content -->
    <?php
    include 'dbConn.php';
    include 'function.php';
    
    $pageid = isset($_GET['id']) ? $_GET['id'] : null;

    $query = "SELECT * FROM coursepost WHERE courseid = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $pageid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Fetch the data
    while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
        
      $courseid = htmlspecialchars($row['courseid'], ENT_QUOTES, 'UTF-8');
      $lecturername = htmlspecialchars($row['lecturername'], ENT_QUOTES, 'UTF-8');
      $coursehour = htmlspecialchars($row['coursehour'], ENT_QUOTES, 'UTF-8');
      $coursetitle = htmlspecialchars($row['coursetitle'], ENT_QUOTES, 'UTF-8');
      $coursedescription = htmlspecialchars($row['coursedescription'], ENT_QUOTES, 'UTF-8');
      $feeindollar = htmlspecialchars($row['feeindollar'], ENT_QUOTES, 'UTF-8');
      $videourl = htmlspecialchars($row['videourl'], ENT_QUOTES, 'UTF-8');
      $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');
      $userid = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

      $categoryid = isset($row['categoryid']) ? htmlspecialchars($row['categoryid'], ENT_QUOTES, 'UTF-8') : null;
      $bannerid = isset($row['bannerid']) ? htmlspecialchars($row['bannerid'], ENT_QUOTES, 'UTF-8') : null;

      $categorynameQuery = "SELECT name FROM category WHERE categoryid = " . ($categoryid ? "'" . mysqli_real_escape_string($connection, $categoryid) . "'" : 'NULL');
      $bannernameQuery = "SELECT source FROM banner WHERE bannerid = " . ($bannerid ? "'" . $bannerid . "'" : 'NULL');

      $categorynameResult = mysqli_query($connection, $categorynameQuery);
      $bannernameResult = mysqli_query($connection, $bannernameQuery);

      $categoryname = ($categorynameResult && $categorynameRow = mysqli_fetch_assoc($categorynameResult)) ? $categorynameRow['name'] : 'N/A';
      $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';
    }
    echo'
    <section>
      <div class="ContainerPostreviewImg">
        <img class="img1" src="'.$bannersource.'" alt="jobreview">
      </div>
    </section>

    <section class="ContainerReview">
      <section>
        <div class="ContainerJobReview">
          <div class="ContainerJobReview-1">

            <div class="ContainerProfileList">
              <div class="Profilelist">
                <!-- Company name -->
                <!-- time -->
                <h1>
                  '.$lecturername.'
                </h1>
                <!-- Job Category Description-->
                <p>
                  '.$coursetitle.'
                </p>
                <p>
                  '.$feeindollar.'
                </p>
                <div class="time">
                  '.$coursehour.'
                </div>
              </div>
            </div>
          </div>

          <div class="ContainerJobReview-2">
            <div>
              <div>
                <button class="Applybutton">
                  Apply Now
                </button>
              </div>
              <div>
                <button class="Savebutton">
                  Save
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div>
        <video width="700" height="500" controls>
          <source src="'.$videourl.'" type="video/mp4">
          <source src="'.$videourl.'" type="video/ogg">
          Your browser does not support the video tag.
        </video>
          <h2>Course Description</h2>
          <p>'.$coursedescription.'</p>
        </div>
      </section>
    </section>
    ';
  ?>

    <script src="javascript/header.js" defer></script>
    <script>
      const iconMenu = document.querySelector(".ContainerJobReview-2")
      const bMark = document.querySelector(".bookMark")

      bMark.addEventListener("click", () => iconMenu.classList.toggle("active"));
    </script>


</body>
</html>
  