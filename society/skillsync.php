<?php
  include 'dbConn.php';
  include 'function.php';
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
  <link rel="stylesheet" href="css/skillsync.css">
  <link rel="stylesheet" href="css/skillminipost.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="https://kit.fontawesome.com/0b02c7455f.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat:wght@400;700&family=Oswald:wght@700&family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
  <title>Skill Sync</title>
</head>

<body>
  <div class="pictures">
    
    <Pic_Hidden class="hidden">
      <img src="image/skill1.png" >
    </Pic_Hidden>
    <Pic_Hidden class="hidden">
      <img src="image/skill2.png" >
    </Pic_Hidden>
    <Pic_Hidden class="hidden">
      <img  src="image/skill3.png" >
    </Pic_Hidden>
    <Pic_Hidden class="hidden">
      <img  src="image/skill4.png">
    </Pic_Hidden>

    <script src="javascript/skillsync.js"></script>
  </div>

  <div class="Mcontainer">  
  <header>
    <div class="leftheader" >
      <div>
        <a href="#">
          <img class="logoimg" src="image/logo1.png" alt="Society Logo">
        </a>
      </div>
      <div class="logotitle">
        <h5 style="font-family: 'Inter', sans-serif;"><a href="mainpage.php">Society <br> Connect</a></h5>
      </div>
      <div class="navigationbar">
        <nav>
          <ul>
            <li><a href="mainpage.php" style="font-family:'Inter',sans-serif;">Home</a></li>
            <li><a href="jobfinder.php" style="font-family: 'Inter',sans-serif;">Job Finder</a></li>
            <li><a href="skillsync.php" style="font-family: 'Inter',sans-serif;">Skill Sync</a></li>
            <li><a href="event.php" style="font-family: 'Inter',sans-serif;">Event</a></li>
            <li><a href="about.php" style="font-family: 'Inter',sans-serif;">About us</a></li>
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
    
    <!--First Banner-->
    <div class = "Banner">
      <p id = "BannerTitle"><a>Unleash</a> Your Endless Possibilities</p>
      <img id = "Unleash" src = "image/unleash.png">

      <img id = "WhitePath1" src = "image/whitepath1.png">
      <img id = "GrayPath1" src = "image/graypath1.png">
      <img id = "WhitePath2" src = "image/whitepath2.png">
      <img id = "GrayPath2" src = "image/graypath2.png">

      <img id = "Table" src = "image/3dtable.png">

      <p id="Mastery">Path To Mastery</p>

    </div>

    <!--Background-->
    <div class="Container1">
      <div class="Background"></div>

      <form id="Lecturer" autocomplete="off">
        <select id="LecturerSelect" name="Lecturer" onchange="updateLecturer(this.value)">
          <option value="">Lecturer</option>
          <?php printLecturer() ?>
        </select>
      </form>

      <button id="TopSelect" value="courseid" onclick="updateTop(this.value)" autocomplete="off">All</button>

      <form id="Course" autocomplete="off">
        <select id="CourseSelect" name="Course" onchange="updateCourse(this.value)">
          <option value="">Course</option>
          <?php printCourseTitle() ?>
        </select>
      </form>

      <script>
        document.querySelectorAll('.SkillCategory').forEach(function(button) {
          button.addEventListener('click', function() {
            // Get the value of the clicked button
            var categoryValue = this.value;

            // Call the function to update search conditions with the category value
            updateCategory(categoryValue);

            // Set a class to represent the "clicked" state
            this.classList.add("clicked");
            });
        });
      </script>

      <button class ="SkillCategory" id="Productivity" type="button" value="Productivity" onclick="updateCategory(this.value)">Productivity</button>
      <button class ="SkillCategory" id="Photography" type="button" value="Photography" onclick="updateCategory(this.value)">Photography</button>
      <button class ="SkillCategory" id="Art" type="button" value="Art" onclick="updateCategory(this.value)">Art</button>
      <button class ="SkillCategory" id="Marketing" type="button" value="Marketing" onclick="updateCategory(this.value)">Marketing</button>
      <button class ="SkillCategory" id="Accounting" type="button" value="Accounting" onclick="updateCategory(this.value)">Accounting</button>
      <button class ="SkillCategory" id="Magic" type="button" value="Magic" onclick="updateCategory(this.value)">Magic</button>
      <button class ="SkillCategory" id="Music" type="button" value="Music" onclick="updateCategory(this.value)">Music</button>
      <button class ="SkillCategory" id="GraphicDesign" type="button" value="GraphicDesign" onclick="updateCategory(this.value)">Graphic Design</button>
      <button class ="SkillCategory" id="Animation" type="button" value="Animation" onclick="updateCategory(this.value)">Animation</button>
      <button class ="SkillCategory" id="Coding" type="button" value="Coding" onclick="updateCategory(this.value)">Coding</button>
      <button class ="SkillCategory" id="Crafts" type="button" value="Craft" onclick="updateCategory(this.value)">Craft</button>
      
      <!--Skill Sync Post--> 
      <div class = "IframeContainer1">
        <div class="DownPost">
          <button class="SkillPost">
          <div class= "Banner2"><img id="BannerImage" src="/image/duck.jpeg"></img></div>

            <div class="BookMark">
                <i id="BookMarkIcon" class="fa-solid fa-bookmark" data-id="" onclick="toggleCourseBookmark(this)"></i>
            </div>

            <p id="Time">1h 30m</p>
            <p id="Rate">5.0</p>
            <p id="Price">Free</p>
            <p id="Total">(14500)</p>
            <p id="LecturerName">Robert Brooks</p>
      
            <h1 id="CourseName">
              Graphics Design: A Beginners Guide To Web Design Using Figma
            </h1>
      
            <div id="Container1">
              <img id="Star1" src="image/star.png">
              <img id="Star2" src="image/star.png">
              <img id="Star3" src="image/star.png">
              <img id="Star4" src="image/star.png">
              <img id="Star5" src="image/star.png">
            </div>
          </button>
        </div>
      </div>
    </div>

    <section>
    <!--Footer-->
      <div class = "Footer">
        <div class = "FooterContent">
          <div class="Content1">
            <div>
              <h1 id="JFFooter">
                Job Finder<hr id = "Line1">
                <a id = "TextLink" href="jobfinder.php"><p id="JobSearch">Job Search</p></a>
                <a id = "TextLink" onclick="redirectWhenLogin('profile2.php')"><p id="SavedJob">Saved Job</p></a>
                <a id = "TextLink" onclick="redirectWhenLogin('profile2.php')"><p id="PostJob">Post Job</p></a>
              </h1>
            </div>
            <div>
              <h1 id="SSFooter">
                Skill Sync<hr id = "Line1">
                <a id = "TextLink" href="skillsync.php"><p id="Course">Course </p></a>
                <a id = "TextLink" onclick="redirectWhenLogin('profile3.php')"><p id="SavedCourse">Saved Course</p></a>
                <a id = "TextLink" onclick="redirectWhenLogin('profile3.php')"><p id="BeLecturer">Be Lecturer</p></a>
              </h1>
            </div>
            <div>
              <h1 id="EFooter">
                Community<hr id = "Line1">
                <a id = "TextLink" href="event.php"><p id="Event">Event</p></a>
                <a id = "TextLink" onclick="redirectWhenLogin('profile4.php')"><p id="SavedEvent">Saved Event</p></a>
                <a id = "TextLink" onclick="redirectWhenLogin('profile4.php')"><p id="PostEvent">Post Event</p></a>
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
            <a id = "TextLink" href="about.php"><p id="TermsOfUse">Terms of Use</p></a>
              <a id = "TextLink" href="about.php"><p id="PrivacyPolicy">Privacy Policy</p></a>
            </div>
          </div>
        </div>
    </div>

  </section>
  <script src="javascript/header.js"></script>
  <script src="javascript/skillsync.js"></script>
</body>

</html>