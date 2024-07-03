<?php
  include 'dbConn.php';
  include 'function.php';

  global $connection;
  $companyname = isset($_POST['txtcompanyname']) ? $_POST['txtcompanyname'] : "";
  $companyurl = isset($_POST['txtcompanyurl']) ? $_POST['txtcompanyurl'] : "";
  $jobtitle = isset($_POST['txtjobtitle']) ? $_POST['txtjobtitle'] : "";
  $categoryid = isset($_POST['jobcategory']) ? $_POST['jobcategory'] : "";
  $jobtype = isset($_POST['jobtype']) ? $_POST['jobtype'] : "";
  $city = isset($_POST['txtcity']) ? $_POST['txtcity'] : "";
  $countryid = isset($_POST['country']) ? $_POST['country'] : "";
  $deadline = isset($_POST['deadline']) ? $_POST['deadline'] : "";
  $joburl = isset($_POST['txtjoburl']) ? $_POST['txtjoburl'] : "";
  $salaryrange = isset($_POST['salaryrange']) ? $_POST['salaryrange'] : "";
  $jobdescription = isset($_POST['txtjobdescription']) ? $_POST['txtjobdescription'] : "";
  $jobrequirement = isset($_POST['txtjobrequirement']) ? $_POST['txtjobrequirement'] : "";
  $finishstatus = '';
  
  if (isset($_POST['btnPost'])){
    $finishstatus = '1';
    logicJobPost($companyname,$companyurl,$jobtitle,$categoryid,$jobtype,$countryid,$deadline,$joburl,$salaryrange,$jobdescription,$jobrequirement,$finishstatus);
  } elseif (isset($_POST['btnSave'])) {  
    $finishstatus = '0';
    logicJobPost($companyname,$companyurl,$jobtitle,$categoryid,$jobtype,$countryid,$deadline,$joburl,$salaryrange,$jobdescription,$jobrequirement,$finishstatus);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post Job</title>
  <link rel="icon" href="image/logo1.png">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/postjob.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script src="javascript/signin.js"></script>
  <script src="javascript/function.js"></script>
  <script src="https://kit.fontawesome.com/0b02c7455f.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat:wght@400;700&family=Oswald:wght@700&family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
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
    
    <!--Post Event Content-->
    <section>
        <section>
            <div class="ContainerJobImg">
                <img class="img1" src="image/job.png" alt="Create a Job">
                <div class="text">
                    <p>Create a <span>Job</span></p>
                </div>
            </div>
        </section>

        <section>
          <form id="form" action="#" method="POST" enctype="multipart/form-data">
              <div class="ContainerList">
                  <div class="List1">
                      <div>
                          <p>Company Name</p>
                          <input class="input1" type="text" placeholder="Name" name="txtcompanyname" required>
                      </div>
                      <div>
                          <p>Company Website</p>
                          <input class="input2" type="text" placeholder="Website Link" name="txtcompanyurl" required>
                      </div>
                  </div>

                  <div class="List2">
                      <div>
                          <p>Job Title</p>
                          <input class="input1" type="text" placeholder="Title" name="txtjobtitle" required>
                      </div>
                  </div>

                  <div class="List3">
                      <!--Job Category-->
                      <div class="List_3">
                          <p>Job Category</p>
                          <select class="select-btn2" id="Category" name="jobcategory">
                              <option value="" disabled selected>Select Your Option</option>
                              <?php printJobCategory() ?>
                          </select>
                      </div>       
                      <!--Job Type-->
                      <div>
                          <div class="select-menu1">
                              <p>Job type</p>
                              <select class="select-btn2" id="JobType" name="jobtype">
                                  <option value="" disabled selected>Select Your Option</option>
                                  <option value="Internship">Internship</option>
                                  <option value="Part Time">Part Time</option>
                                  <option value="Full Time">Full Time</option>
                              </select>
                          </div>
                      </div>
                  </div>

                  <div class="List4">
                      <!--Country-->
                      <div class="List_4">
                          <div>
                              <p>City, State Or Area</p>
                              <input class="input2" type="text" placeholder="City/Name" name="txtcity" required>
                          </div>
                          <div>
                              <p>Country</p>
                              <select class="select-menu3" id="Country" name="country" required>
                                  <option value="" disabled selected>Select Your Option</option>
                                  <?php printCountry() ?>
                              </select>
                          </div>
                      </div>
                      <!--Salary Range-->
                      <div>
                          <p>Salary Range</p>
                          <div class="select-menu">
                              <select class="select-btn" id="Salary" name="salaryrange" required>
                                  <option value="" disabled selected>Select Your Option</option>
                                  <option value="Free">Free</option>
                                  <option value="$1000 ~ $2000">$1000 ~ $2000</option>
                                  <option value="$2000 ~ $5000">$2000 ~ $5000</option>
                                  <option value="$5000 ~ $10000">$5000 ~ $10000</option>
                                  <option value="$10000 ~ $20000">$10000 ~ $20000</option>
                              </select>
                          </div>
                      </div>
                  </div>

                  <div class="List5">
                      <div>
                          <p>Company Profile</p>
                          <label id="companyprofile" for="input-file1"></label>
                          <input id="input-file1" class="input1" type="file" accept="image/jpeg, image/png, image/jpg" name="profile" required>
                      </div>
                      <div>
                          <p>Company Banner</p>
                          <label for="input-file2"></label>
                          <input id="input-file2" class="input2" type="file" accept="image/jpeg, image/png, image/jpg" name="banner" required>
                      </div>
                  </div>

                  <div class="List6">
                    <div>
                      <p>Application Deadline</p>
                      <label class="input1" for="deadline"></label>
                      <input type="date" id="deadline" name="deadline" required>
                    </div>
                  </div>

                  <div class="List7">
                    <div>
                      <p>Job Application Link</p>
                      <input class="input1" type="text" placeholder="Job application link url" name="txtjoburl" required>
                    </div>
                  </div>

                  <div class="List8">
                    <div>
                      <p>Job Description</p>
                      <textarea class="input1" rows="100" placeholder="Text" name="txtjobdescription" required></textarea>
                    </div>
                  </div>

                  <div class="List9">
                    <div>
                      <p>Job Requirement</p>
                      <textarea class="input1"  rows="100" placeholder="Text" name="txtjobrequirement" required></textarea>
                    </div>
                  </div>

                  <div class="List10">
                    <div class="Save">
                      <input type="submit" value="Save" name="btnSave" placeholder="Save"></input>  
                    </div>
                    <div class="Post">
                      <input type="submit" value="Post" name="btnPost" placeholder="Post"></input>
                    </div>
                  </div>
              </div>
          </form>
        </section>
    </section>
  <script src="javascript/header.js"></script>
</body>
</html>