<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Society</title>
  <link rel="icon" href="image/logo1.png">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/eventreview.css">
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

        $query = "SELECT * FROM eventpost WHERE eventid = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $pageid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        // Fetch the data
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
                    </div>

                <div class="ContainerProfileList">
                <div class="Profilelist">
                    <h1>
                    '.$title.'
                    </h1>
                    <!-- Job Category Description-->
                    <p>
                    '.$startdate.'
                    </p>
                    <p>
                    '.$enddate.'
                    </p>
                    <p>
                    '.$countryname.'
                </p>
                    <div class="time">
                        <!--Empty div-->
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
            <h2>Event Description</h2>
            <p>'.$eventdescription.'</p>
            </div>
        </section>
        </section>
        ';
    ?>
    <script src="javascript/header.js" defer></script>
</body>
</html>
  