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
    <link rel = "stylesheet" href = "css/header.css">
    <link rel="stylesheet" href="css/jobminipost.css">
    <link rel = "stylesheet" href = "css/jobmainpost.css">
    <link rel = "stylesheet" href = "css/jobfinder.css">
    <script src="javascript/function.js" defer></script>
    <script>
        // script for counting total number of jobs display.
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOMContentLoaded event fired');
            // Initial count
            updateJobCount();
            // Use MutationObserver to detect changes in the DOM
            var observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.addedNodes.length > 0) {
                        // Check if the added nodes contain elements with the 'JobPost' class
                        var addedJobPosts = Array.from(mutation.addedNodes)
                            .filter(node => node.classList && node.classList.contains('JobPost'));

                        if (addedJobPosts.length > 0) {
                            updateJobCount();
                        }
                    }
                });
            });

            // Define the target node for the observer (common ancestor)
            var targetNode = document.body;
            // Configuration of the observer
            var config = { childList: true, subtree: true };
            // Start observing the target node for changes
            observer.observe(targetNode, config);
        });

    </script>
    <script src="https://kit.fontawesome.com/0b02c7455f.js" crossorigin="anonymous"></script>
    <title>Job Finder</title>
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
        <h1 style="font-family: 'Inter',sans-serif;"><a href="mainpage.php">Society Connect</a></h1>
      </div>
      <div class="navigationbar">
        <nav>
          <ul>
            <li><a href="mainpage.php" style="font-family: 'Inter',sans-serif;">Home</a></li>
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
    <div class = "Mcontainer">
        <!-- Main Banner -->
        <div class="Banner">
          <div class = "BannerContent">
              <div class="Bannertext">
                  <h1>Your Success <br> Story Awaits </h1>
                  <p>Step into a world where your ambitions take center stage, and success is not just a destination but a journey.</p>
              </div>
              <div class="bannerbackgound">
                  <div class="bannerfloat">
                      <div class="Circle1"></div>
                      <div class="Circle2"></div>
                      <div class="Circle3"></div>
                      <div class="Rect1"></div>
                      <div class="Rect2"></div>
                      <div class="Rect3"></div>
                  </div>
              </div>
              <div class="bannerimg">
                      <div class="bannerimg1"><img id = "Job1" src = "image/job1.png" alt = "Job1"></div>
                      <div class="bannerimg2"><img id = "Job2" src = "image/job3.png" alt = "Job3"></div>
                      <div class="bannerimg3"><img id = "Job3" src = "image/job2.png" alt = "Job2"></div>
                      <div class="bannerimg4"><img id = "Job4" src = "image/job4.png" alt = "Job4"></div>
              </div>
          </div>
        </div>

        <!-- Find Job Section -->
        <div class="Blackground">
            <!-- Choice Banner -->
            <div class = "Banner2">
              <div>
                <img id="DesiredJob" src="image/desiredjob.png">
                <img id="HireStar" src="image/hirestar.png">
              </div>
              <div class="Banner2Content">
                <div class="Banner2Content1">
                  <img id="FindYourDesiredJob" src="image/findyourdesiredjob.png">
                  <button id = "FindJob" type="button" onclick="redirectToJobSection()">Start Now ➜</button>
                </div>
                <div class="Banner2Content2">
                  <img id="HireYourStarEmployee" src="image/hireyourstaremployee.png">
                  <button id = "Hire" type="button" onclick="redirectTo('postjob.php')">Start Now ➜</button>
                </div>
              </div>
            </div>

            <!--Search Bar-->
            <div class="SearchBar">
                <div class="SearchBarcontent1">
                  <form id="CountryForm">
                    <img id="CountryImage" src="image/malaysia.png">
                    <select id="CountrySelect" name="Country" onchange="showCountry(this.value)" oninput="updateSearchConditions(this.value)" autocomplete="on">
                        <option value="" disabled selected>Select Country</option>
                        <option value="">All Country</option>
                        <?php printCountry() ?>
                    </select>
                  </form>
                </div>
                <div>

                </div class="SearchBarcontent2">
                  <form id="JobForm" autocomplete="on">
                      <img id="SearchImage" src="image/search.png">
                      <input type="text" id="SearchSelect" name="fname" value="" placeholder="Search for Job Title, Area or Company" oninput="updateSearchConditions(this.value)"
                      onfocus="if(this.value=='Search for Job Title, Area or Company') this.value='';" onblur="if(this.value=='') this.value='';">
                  </form>
                <div class="SearchBarcontent3">
                  <form id="CategoryForm" autocomplete="off">
                      <img id="CategoryImage" src="image/jobcategory.png">
                      <select id="CategorySelect" name="Category" oninput="updateSearchConditions(this.value)">
                          <option value="" disabled selected>Select Category</option>
                          <option value="">All Category</option>
                          <?php printJobCategory() ?>
                      </select>
                  </form>
                </div>
            </div>


            <!--Search Bar 2(Sorted Bar)-->
            <div class="SearchContent">
              <div class="SearchContent1">
                <div class="SearchBar2">
                  <div class="TotalJob">    
                      <p id="JobNumber">Total Jobs</p>         
                  </div>
  
                  <div class="SortedBy">
                    <div>
                      <p>Sort By :</p>
                    </div>
                    <div class="Sort">
                      <select id="SortCategory" oninput="updateSearchConditions(this.value)">
                        <option value="" disabled selected>None</option>
                        <option value="companyname">Company</option>
                        <option value="deadline">Deadline</option>
                        <option value="jobtype">JobCategory</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class = "IframeContainer1">
                  <div class="JobPostDefault">
                      <img id="Profiles" src="image/default_image.jpg">
                      <p id="CompanyName">Company Name Sdn Bhd</p>
                      <p id="CompanyJobTitle">Company Job Title</p>
                      <div class="BookMark">
                          <i id="BookMarkIcon" class="fa-solid fa-bookmark"></i>
                      </div>
                      <p id="Tag">
                          <img src="image/location.png">Country &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <img src="image/job5.png">Job Category &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <img src="image/requirement.png">Minimum Requirement
                      </p>
                      <p id="UpdateTime">2023-10-10</p>
                      <hr id="Line"></hr>
                      <p id="Content">Lorem ipsum dolor sit amet consectetur. Mauris ut tortor placerat.Lorem ipsum dolor sit amet consectetur. Mauris ut tortor placerat.</p>
                  </div>
                </div>
                <div class="SearchBar2button">
                  <button id = "Rect3" type="button" value="HireStar" name="btnHS">
                    <img id="Plus" src="image/plus.png">
                  </button>
                </div>
              </div>
              <div class="SearchContent2">
                <div class = "IframeContainer2">
                  <div class="JobDescriptionPost">
                      <div class="JobBanner"></div>
                      <div class="JobProfile"></div>
                      <div class="CompanyName">Company Name Sdn Bhd</div>
                      <div class="JobTitle">Junior Graphic Designer For Mobile Phone</div>
                      <div class="UpdateTime2">Deadline: 2023-06-15</div>
  
                      <p id="Tag2">
                          <img src="image/location.png">Country &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <img src="image/job5.png">Job Category &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <img src="image/requirement.png">Minimum Requirement
                      </p>
  
                      <button id="Save" type="button">Save</button>
  
                      <button id="ApplyNow" type="button">Apply Now</button>
                      <h1 id="JobDescriptions">Job Descriptions
                          <p id="Content1">
                              Lorem ipsum dolor sit amet consectetur. Facilisis sit nunc vitae nisl aenean. Sit ornare non bibendum cursus aliquet ac. 
                              Interdum odio etiam dolor est neque lacus. Malesuada vulputate eu diam donec donec placerat vitae aliquet. Faucibus enim eu aliquet consectetur. 
                              Eget orci aliquam sit mi quis purus sagittis gravida. Diam elit dictum phasellus scelerisque. Enim ut mauris eget urna et tristique auctor massa. 
                              Facilisi praesent malesuada in nec nibh. Integer enim nisi in condimentum turpis ut. Massa praesent diam eget cursus pharetra.<br/>
                          </p>
                      </h1>
                      <h1 id="JobRequirements">Job Requirements
                          <p id="Content2">
                              Lorem ipsum dolor sit amet consectetur. Facilisis sit nunc vitae nisl aenean. Sit ornare non bibendum cursus aliquet ac. 
                              Interdum odio etiam dolor est neque lacus. Malesuada vulputate eu diam donec donec placerat vitae aliquet. Faucibus enim eu aliquet consectetur. 
                              Eget orci aliquam sit mi quis purus sagittis gravida. Diam elit dictum phasellus scelerisque. Enim ut mauris eget urna et tristique auctor massa. 
                              Facilisi praesent malesuada in nec nibh. Integer enim nisi in condimentum turpis ut. Massa praesent diam eget cursus pharetra.<br/>
                          </p>
                      </h1>
                  </div>
                </div>
              </div>
            </div>
            
            
            

            <!-- Plus Button -->
            

            <!-- Main Menu -->
            

            <!--Footer-->
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

    <script src="javascript/header.js"></script>
</body>

</html>