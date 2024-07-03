<script src="javascript/function.js" defer></script>

<!--List Out All Database-->
<?php
    include 'dbConn.php';
    global $connection;

    $tablename = isset($_POST['q']) ? $_POST['q'] : '';

    if($tablename === 'coursepost'){
        $primarycolumn = "courseid";
    }elseif($tablename === 'eventpost'){
        $primarycolumn = "eventid";
    }elseif($tablename === 'jobpost'){
        $primarycolumn = "jobid";
    }else{
        $primarycolumn = "";
    }

    if (!empty($tablename)) {
        $query = "SELECT * FROM $tablename WHERE finishstatus = '1' ORDER BY adminid ASC";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<table>";
            // Fetch and print table headers
            echo "<tr>";
            while ($row = mysqli_fetch_field($result)) {
                echo "<th>" . $row->name . "</th>";
            }
            echo "<th> Approval </th>";
            echo "<th> Reject </th>";
            echo "</tr>";

            // Fetch and print each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "<td><a href='#' onclick='approveRow(\"$tablename\", \"$primarycolumn\", \"" . $row[$primarycolumn] . "\")'>Approve</a></td>";
                echo "<td><a href='#' onclick='rejectRow(\"$tablename\", \"$primarycolumn\", \"" . $row[$primarycolumn] . "\")'>Reject</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            
            mysqli_free_result($result);
        } else {
            echo "Error executing query: " . mysqli_error($connection);
        }
    } else {
        echo "No table selected.";
    }
?>