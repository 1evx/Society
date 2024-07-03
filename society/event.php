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
    <link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="css/eventminipost.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="javascript/function.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://kit.fontawesome.com/0b02c7455f.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat:wght@400;700&family=Oswald:wght@700&family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <title>Event</title>
</head>

<body style="background-color: rgba(55,55,89,255)";>
    <div class="Mcontainer">
        <!--Search Bar-->
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

        <!--Main Banner-->
        <div class="MainBanner">
            <img id="BannerBackground" src="image/eventbackground.png">
            <h1 id="BannerTitle" class="glitch-glow">
                Start Your<br>Own Journey
            </h1>
        </div>

        <!--Event Post Section-->
        <div class="PurpleBackground">
            <!--Display Section-->
            <p id="TotalEvent">
                <?php printSum("eventid","eventpost") ?><br>Event
            </p>

            <p id="TotalCountry">
                <?php printSum("countryid","country") ?><br>Country
            </p>

            <p id="TotalView">
                <?php printSum("userid","user") ?><br>User
            </p>
            
            <!--Search Bar-->
            <div class="SearchBar">

                <form id="AreaForm"  autocomplete="off">
                    <img id="CountryImage" src="image/malaysia.png">
                    <select id="CountrySelect" name="Country" value="" onchange="showCountry(this.value)" oninput="updateSearchConditions2(this.value)" autocomplete="on">
                        <option value="" disabled selected>Select Country</option>
                        <option value="">All Country</option>
                        <?php printCountry() ?>
                    </select>
                </form>

                <form id="JobForm" autocomplete="on">
                    <img id="SearchImage" src="image/search.png">
                    <input type="text" id="SearchSelect" value="" name="fname" value="" placeholder="Search for Job Title, Area or Company" oninput="updateSearchConditions2(this.value)"
                    onfocus="if(this.value=='Search for Job Title, Area or Company') this.value='';" onblur="if(this.value=='') this.value='';">
                </form>

                <form id="CategoryForm" autocomplete="off">
                    <img id="CategoryImage" src="image/jobcategory.png">
                    <select id="CategorySelect" name="Category" value="" oninput="updateSearchConditions2(this.value)">
                        <option value="" disabled selected>Sort By</option>
                        <option value="startdate">Most Recent</option>
                        <option value="title">Title</option>
                        <option value="country.name">Country</option>
                    </select>
                </form>

            </div>

            <!--Mini Post - eventminipost.php-->
            <div class = "IframeContainer1">
                <button class="EventPost">
                    <div class= "Banner2"></div>
                    <div class="BookMark">
                        <i id="BookMarkIcon" class="fa-solid fa-bookmark" data-id="'.$jobid.'" onclick="toggleEventBookmark(this)"></i>
                    </div>
                    <h1 id="EventTitle">
                    Wildlife Conservation Campaign
                    </h1>
                    <p id="EventContent">
                    Lorem ipsum dolor sit amet consectetur. Nisl pretium quis in tortor enim
                    orci diam et. Et ultrices egestas diam adipiscing nec sed eu. Dolor mi
                    meno.
                    </p>
                    <p id="Date">3JAN - 13JAN</p>
                    <img id="Calendar" src="image/calendar.png">
                    <p id="Location1">JOHOR</p>
                    <img id="Location2" src="image/location2.png">
                    <div id="Detail">Detail</div>
                    <img id="External" src="image/externallink.png">
                </button>
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
      </div>
    </section>
  <script src="javascript/header.js"></script>
  </div>
</body>
</html>