<?php
  include 'dbConn.php';
  include 'function.php';

    global $connection;
    global $result;

    $query = isset($_POST['q']) ? urldecode($_POST['q']) : '';

    $result = mysqli_query($connection, $query);

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
            $bannername = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';
            $profilename = ($profilenameResult && $profilenameRow = mysqli_fetch_assoc($profilenameResult)) ? $profilenameRow['source'] : 'N/A';

            echo'
            <button class="JobPost" value="'.$jobid.'" onclick = "showJobMainPost('.$jobid.')">
                <img id="Profiles" src="'.$profilename.'">
                <p id="CompanyName">'.$companyname.'</p>
                <p id="CompanyJobTitle">'.$jobtitle.'</p>

                <div class="BookMark">
                    <i id="BookMarkIcon" class="fa-solid fa-bookmark" data-id="'.$jobid.'" onclick="toggleJobBookmark(this)" oninput="showJobBookmark(this)"></i>
                </div>
                
                <p id="Tag">
                    <img src="image/location.png">'.$countryname.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="image/job5.png">'.$categoryname.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="image/requirement.png">'.$salaryrange.'
                </p>

                <p id="UpdateTime">'.$deadline.'</p>

                <hr id="Line"></hr>

                <p id="Content">'.$jobdescription.'</p>
            </button><br><br>';
        }
    }
?>