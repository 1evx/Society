<?php
  include "dbConn.php";
  include "function.php";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="javascript/function.js" defer></script>
  <link rel = "stylesheet" href = "css/mainpage.css">
  <link rel= "stylesheet" href="css/header.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://kit.fontawesome.com/0b02c7455f.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat:wght@400;700&family=Oswald:wght@700&family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
  <title>Society</title>
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
  
  <section>
    <div class="LUYFBackground">
      <img src="image/2770018.jpg" alt="">
      <!--Banner-->
      <div class="ShapeYourFuture">
        <div>
          <div>
            <h1>Light Up Your Future</h1>
          </div>
        </div>
        <div class="Containerbutton">
          <!-- <div class = "Container1">
            <button id="SignUp" type="button" onclick="redirectTo('signup.php')">Get Started</button>
          </div> -->
  
          <!-- <div class = "Container2">
            <button id="SignIn" type="button" onclick="redirectToSignIn()">Sign In</button>
          </div> -->
        </div>
      </div>
      
    </div>
    <div>
      
    </div>
    <!--Top Categories Section-->
    <div class="Blackground"></div>
  </section>
  
   
  <section>
      <!--Job Finder-->
      <div class = "JobFinder">
        <img src="image/job_finder.png">
        
        <h1>Job Finder</h1>
        <p> The Job Finder revolution is here to reshape your destiny. In a world brimming with opportunities, our revolutionary platform is your passport to a future where dreams become reality.</p>
    
        <button id = "FindJob"  type="button" onclick="redirectToJobFinder()">Find Your Jobs <span class="FindJobtext">Click here</span> ➜</button>
      </div>
  </section>
      
  <section>
    <!--Skill Sync-->
    <div class = "SkillSync">
      <div class = "SkillSyncimg">
        <div>
          <img id="SSBackground" src = "image/skill_sync.png">
        </div>
        <div class="skillsyncbanner">
          <img id="SplashBanner" src = "image/splash_banner.png" alt = "Splash Banner">
          <img id="PaintRoller" src = "image/paint_roller.png" alt = "Paint Roller">
        </div>
      </div>
      <div class = "SkillSyncfunction">
        <div class = "SkillSyncfunctiontext">
          <div class = "SkillSyncfunctiontext1" >
            <h1>Skill Sync</h1>
          </div>
          <div class = "SkillSyncfunctiontext2">
            <p id="SSContent">
              Empower yourself with up-to-the-minute market insights. Skill Sync provides you with the latest trends, industry demands, and skill prerequisites
            </p>
            <hr>
          </div>
        </div>
        <div class = "functiontext">
          <div class = "functiontext1">
            <div>
              <p id="Courses"><?php printConditionalSum("categoryid","category","categoryid LIKE 'CS%' ") ?><br/>Categories</p>
            </div>
            <div>
              <p id="Classes"><?php printConditionalSum("courseid","coursepost","finishstatus = '1' ") ?><br/>Classes</p>
            </div>
          </div>
          <div class = "functiontext2">
            <div>
              <p id="Students"><?php printSum("userid","user") ?><br/>Students</p>
            </div>
            <div>
              <p id="Teachers"><?php printConditionalSum("userid","coursepost","finishstatus = '1' ") ?><br/>Teachers</p>
            </div>
          </div>
      </div>
    </div>
  </section>    
      
  <section>
    <!--Event Till Ship-->
    <div class = "Event">
      <div class="eventimg">
        <div class="eventimg1">
          <img id="Event1" src = "image/event1.png">
        </div>
        <div class="eventimg2">
          <img id="Event2" src = "image/event2.png">
        </div>
        <div class="eventimg3">
          <img id="Event3" src = "image/event3.png">
        </div>
      </div>
      
      <div>
        <div class="eventtext">
          <div id = "SYA">
            <!-- <img id = "SYA" src = "image/start_your_adventure.png"> -->
            <h7 >Start your Future</h7>
          </div>
          <div id = "Econtent">
            <p>guiding you towards a world of endless possibilities</p>
            <!-- <img id = "Econtent" src = "image/econtent.png">   -->
          </div>
          <div>
            <button id = "JoinEvent"  onclick="redirectTo('event.php')">Join Event</button>
          </div>
        </div>
        <!-- <img id="Ship" src = "image/ship.png"> -->
      </div>
    </div>
  </section>
    
  <section>
    <!--Footer-->
      <div class = "Footer">
        <div>
          <!-- <img class="footerimg" src = "image/wave2.png"> -->
        </div>  
        <div class = "FooterContent">
          <div class="Content1">
            <div>
              <h1 id="JFFooter">
                Job Finder<hr id = "Line1">
                <a id = "TextLink" href="jobfinder.php"><p id="JobSearch">Job Search</p></a>
                <a id = "TextLink" href="url"><p id="SavedJob">Saved Job</p></a>
                <a id = "TextLink" href="url"><p id="PostJob">Post Job</p></a>
              </h1>
            </div>
            <div>
              <h1 id="SSFooter">
                Skill Sync<hr id = "Line1">
                <a id = "TextLink" href="skillsync.php"><p id="Course">Course </p></a>
                <a id = "TextLink" href="url"><p id="SavedCourse">Saved Course</p></a>
                <a id = "TextLink" href="url"><p id="BeLecturer">Be Lecturer</p></a>
              </h1>
            </div>
            <div>
              <h1 id="EFooter">
                Community<hr id = "Line1">
                <a id = "TextLink" href="event.php"><p id="Event">Event</p></a>
                <a id = "TextLink" href="url"><p id="SavedEvent">Saved Event</p></a>
                <a id = "TextLink" href="url"><p id="PostEvent">Post Event</p></a>
              </h1>
            </div>
            <div>
              <h1 id = "AboutUs">
                About Us<hr id = "Line1">
                <a id = "TextLink" href="about.php"><p id="Company">Company</p></a>
                <a id = "TextLink" href="about.php"><p id="ContactUs">Contact Us</p></a>
                <a id = "TextLink" href="about.php"><p id="Faq">FAQ</p></a>
              </h1>
            </div>
            <div class="Content4">
              <div>
                <img id = "Twitter" src = "image/twitter.png">
                <img id = "Facebook" src = "image/facebook.png">
                <img id = "Insta" src = "image/insta.png">
                <img id = "Youtube" src = "image/youtube.png">
              </div>
              <div>
                <h3 id="FooterSlogan">Shape <br> your future in <br> Society</h3>
              </div>
            </div>
          </div>
          
          <div class="Content2">
            <hr id = "Line2">
            <div class="Content3">
              <a id = "TextLink" href="url"><p id="TermsOfUse">Terms of Use</p></a>
              <a id = "TextLink" href="url"><p id="PrivacyPolicy">Privacy Policy</p></a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <script src="javascript/header.js"></script>
</body>
</html>