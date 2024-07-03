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
            
            $courseid = htmlspecialchars($row['courseid'], ENT_QUOTES, 'UTF-8');
            $lecturername = htmlspecialchars($row['lecturername'], ENT_QUOTES, 'UTF-8');
            $coursehour = htmlspecialchars($row['coursehour'], ENT_QUOTES, 'UTF-8');
            $coursetitle = htmlspecialchars($row['coursetitle'], ENT_QUOTES, 'UTF-8');
            $coursedescription = htmlspecialchars($row['coursedescription'], ENT_QUOTES, 'UTF-8');
            $feeindollar = htmlspecialchars($row['feeindollar'], ENT_QUOTES, 'UTF-8');
            $videourl = htmlspecialchars($row['videourl'], ENT_QUOTES, 'UTF-8');
            $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');
            $userid = htmlspecialchars($row['userid'], ENT_QUOTES, 'UTF-8');

            $categoryid = isset($row['categoryid']) ? htmlspecialchars($row['categoryid'], ENT_QUOTES, 'UTF-8') : null;
            $bannerid = isset($row['bannerid']) ? htmlspecialchars($row['bannerid'], ENT_QUOTES, 'UTF-8') : null;

            $categorynameQuery = "SELECT name FROM category WHERE categoryid = " . ($categoryid ? "'" . $categoryid . "'" : 'NULL');
            $bannernameQuery = "SELECT source FROM banner INNER JOIN coursepost on coursepost.bannerid = banner.bannerid WHERE 
            courseid = " . ($courseid ? "'" . $courseid . "'" : 'NULL');

            $categorynameResult = mysqli_query($connection, $categorynameQuery);
            $bannernameResult = mysqli_query($connection, $bannernameQuery);

            $categoryname = ($categorynameResult && $categorynameRow = mysqli_fetch_assoc($categorynameResult)) ? $categorynameRow['name'] : 'N/A';
            $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';

            echo'
            <button class="SkillPost" value="'.$courseid.'" onclick="redirectToSkillPost(this.value)">
                <div class= "Banner2"><img id="BannerImage" src="'.$bannersource.'"></img></div>

                <div class="BookMark">
                    <i id="BookMarkIcon" class="fa-solid fa-bookmark" data-id="'.$courseid.'" onclick="toggleCourseBookmark(this)"></i>
                </div>

                <div class="SeparateLine"></div>
                <p id="Time">'.$coursehour.'</p>
                <p id="Rate">5.0</p>
                <p id="Price">'.$feeindollar.'</p>
                <p id="Total">(19321)</p>
                <p id="LecturerName">'.$lecturername.'</p>
        
                <h1 id="CourseName">
                '.$coursetitle.'
                </h1>
        
                <div id="Container1">
                <img id="Star1" src="image/star.png">
                <img id="Star2" src="image/star.png">
                <img id="Star3" src="image/star.png">
                <img id="Star4" src="image/star.png">
                <img id="Star5" src="image/star.png">
                </div>
            </button>';
        }
    }
?>