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
            
            $eventid = htmlspecialchars($row['eventid'], ENT_QUOTES, 'UTF-8');
            $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
            $eventdescription = htmlspecialchars($row['eventdescription'], ENT_QUOTES, 'UTF-8');
            $startdate = htmlspecialchars($row['startdate'], ENT_QUOTES, 'UTF-8');
            $enddate = htmlspecialchars($row['enddate'], ENT_QUOTES, 'UTF-8');
            $finishstatus = htmlspecialchars($row['finishstatus'], ENT_QUOTES, 'UTF-8');

            $countryid = isset($row['countryid']) ? htmlspecialchars($row['countryid'], ENT_QUOTES, 'UTF-8') : null;
            $bannerid = isset($row['bannerid']) ? htmlspecialchars($row['bannerid'], ENT_QUOTES, 'UTF-8') : null;
            $profileid = isset($row['profileid']) ? htmlspecialchars($row['profileid'], ENT_QUOTES, 'UTF-8') : null;

            $countrynameQuery = "SELECT name FROM country WHERE countryid = " . ($countryid ? "'" . $countryid . "'" : 'NULL');
            $bannernameQuery = "SELECT source FROM banner WHERE bannerid = " . ($bannerid ? "'" . $bannerid . "'" : 'NULL');
            $profilenameQuery = "SELECT source FROM profile WHERE profileid = " . ($profileid ? "'" . $profileid . "'" : 'NULL');

            $countrynameResult = mysqli_query($connection, $countrynameQuery);
            $bannernameResult = mysqli_query($connection, $bannernameQuery);
            $profilenameResult = mysqli_query($connection, $profilenameQuery);

            $countryname = ($countrynameResult && $countrynameRow = mysqli_fetch_assoc($countrynameResult)) ? $countrynameRow['name'] : 'N/A';
            $bannersource = ($bannernameResult && $bannernameRow = mysqli_fetch_assoc($bannernameResult)) ? $bannernameRow['source'] : 'N/A';
            $profilesource = ($profilenameResult && $profilenameRow = mysqli_fetch_assoc($profilenameResult)) ? $profilenameRow['source'] : 'N/A';

            echo'
            <button class="EventPost" value="'.$eventid.'" onclick="redirectToEventPost(this.value)">
                <div class= "Banner2"><img src="'.$bannersource.'"></img></div>

                <div class="BookMark">
                    <i id="BookMarkIcon" class="fa-solid fa-bookmark" data-id="'.$eventid.'" onclick="toggleEventBookmark(this)"></i>
                </div>

                <div class="Line"></div>
                <h1 id="EventTitle">
                '.$title.'
                </h1>
                <p id="EventContent">
                '.$eventdescription.'
                </p>
                <p id="Date">'.$startdate.' - '.$enddate.'</p>
                <img id="Calendar" src="image/calendar.png">
                <p id="Location1">'.$countryname.'</p>
                <img id="Location2" src="image/location2.png">
                <div id="Detail">Detail</div>
                <img id="External" src="image/externallink.png">
            </button>';
        }
    }
?>