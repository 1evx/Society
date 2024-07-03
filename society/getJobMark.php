<script src="javascript/function.js" defer></script>

<?php
    session_start();
    include 'dbConn.php';

    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
        $jobid = isset($_POST['jobid']) ? $_POST['jobid'] : '';

        // Check if the job is bookmarked by the user
        $query = "SELECT * FROM savedjob WHERE jobid = '$jobid' AND userid = '$_SESSION[userid]' AND isPin = '1'";
        $result = mysqli_query($connection, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Fetch the jobid from the result set
            $row = mysqli_fetch_assoc($result);
            $jobid = $row['jobid'];

            echo "<script>addJobBookmark('$jobid');</script>";
        }
    } else {
        echo 'fail'; 
    }
?>
