<?php
  include 'dbConn.php';
  include 'function.php';

    global $connection;
    global $result;

    $CountryId = isset($_POST['q']) ? mysqli_real_escape_string($connection, $_POST['q']) : '';
    
    if ($CountryId != ''){
        $query = 
        "SELECT * FROM jobpost 
        WHERE UPPER(jobpost.jobid) = '$CountryId'
        AND finishstatus = '1'";
    
    } 
    
    if (!empty($query)) {
        $result = mysqli_query($connection, $query);
    } else {
        echo "No search criteria provided.";
    }

    if($result){
        $data = array(); // Initialize an array to store the fetched data

        while($row = mysqli_fetch_assoc($result)){
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

            echo '
            <div class="JobDescriptionPost">
                <div class="JobBanner"><img class="JobBannerImg" src=" '.$bannersource.' "></div>
                <div class="JobProfile"><img class="JobProfileImg" src=" '.$profilesource.' "></div>
                <div class="CompanyName">'.$companyname.'</div>
                <div class="JobTitle">'.$jobtitle.'</div>
                <div class="UpdateTime2">Deadline: '.$deadline.'</div>
            
                <p id="Tag2">
                    <img src="image/location.png">'.$countryname.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="image/job5.png">'.$categoryname.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="image/requirement.png">'. $jobtype . '
                </p>
            
                <button id="Save" type="button" data-id="'.$jobid.'" onclick="addJobBookmark(this)">Save</button>
                <button id="ApplyNow" type="button" onclick="redirectTo("'.$joburl.'")")">Apply Now</button>
                
                <h1 id="JobDescriptions">Job Description
                    <p id="Content1">
                        '.$jobdescription.'<br/>
                    </p>
                </h1>
            
                <h1 id="JobRequirements">Job Requirement
                    <p id="Content2">
                        '.$jobrequirement.'<br/>
                    </p>
                </h1>
            </div>';
        }
    }


?>
