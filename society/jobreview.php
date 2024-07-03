<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Society</title>
  <link rel="icon" href="image/logo1.png">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/jobreview.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
            <li class="opt">
              <span class="opt-text">Login</span>
            </li>
            <li class="opt">
              <span class="opt-text" onclick="redirectToPostJob()">Post Job</span>
            </li>
            <li class="opt">
              <span class="opt-text" onclick="redirectToPostEvent()">Post Event</span>
            </li>
            <li class="opt">
              <span class="opt-text" onclick="redirectToPostLesson()">Post Course</span>
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
        <div class="ContainerPostreviewImg">
        <img class="img1" src="'.$bannersource.'" alt="jobreview">
        </div>
    </section>

    <section class="ContainerReview">
        <section>
            <div class="ContainerJobReview">
            <div class="ContainerJobReview-1">
                <div class="Bio">
                <div class="Profile">
                    <div>
                    <img src="'.$profilesource.'" alt="">
                    </div>
                </div>
                <!-- time -->
                <div class="time">
                    '.$deadline.'
                </div>
                </div>
        
                <div class="ContainerProfileList">
                <div class="Profilelist">
                    <!-- Company name -->
                    <h1>
                        '.$companyname.'
                    </h1>
                    <!-- Job Category Description-->
                    <p>
                        '.$categoryname.'
                    </p>
                </div>
                <div class="Profilelist-1">
                    <div class="icon1">
                    <div>
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <!-- Location -->
                    <div>
                        '.$countryname.'
                    </div>
                    </div>
                    
                    <div class="icon2">
                    <div>
                        <i class="fa-solid fa-suitcase"></i>
                    </div>
                    <!-- Job Category -->
                    <div>
                        '.$categoryname.'
                    </div>
                    </div>
                    
                    <div class="icon3">
                    <div>
                        <i class="fa-solid fa-list-check"></i>
                    </div>
                    <!-- Requirement -->
                    <div>
                        '.$jobtype.'
                    </div>
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
                <h2>Job Description</h2>
                <p>'.$jobdescription.'</p>
            </div>
        
            <div>
                <h2>Job Requirements</h2>
                <p>'.$jobrequirement.'</p>
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
  