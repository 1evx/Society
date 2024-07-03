<!--deleteRow()-->
<script src="javascript/function.js" defer></script>

<!--List Out All Database-->
<?php
    include 'dbConn.php';
    global $connection;

    $tablename = isset($_POST['q']) ? $_POST['q'] : '';

    if($tablename === 'admin'){
        $primarycolumn = "adminid";
    }elseif($tablename === 'banner'){
        $primarycolumn = "bannerid";
    }elseif($tablename === 'category'){
        $primarycolumn = "categoryid";
    }elseif($tablename === 'country'){
        $primarycolumn = "countryid";
    }elseif($tablename === 'coursepost'){
        $primarycolumn = "courseid";
    }elseif($tablename === 'eventpost'){
        $primarycolumn = "eventid";
    }elseif($tablename === 'jobpost'){
        $primarycolumn = "jobid";
    }elseif($tablename === 'profile'){
        $primarycolumn = "profileid";
    }elseif($tablename === 'review'){
        $primarycolumn = "reviewid";
    }elseif($tablename === 'savedcourse'){
        $primarycolumn = "savedcourseid";
    }elseif($tablename === 'savedevent'){
        $primarycolumn = "savedeventid";
    }elseif($tablename === 'savedjob'){
        $primarycolumn = "savedjobid";
    }elseif($tablename === 'user'){
        $primarycolumn = "userid";
    }else{
        $primarycolumn = "";
    }

    if (!empty($tablename)) {
        $query = "SELECT * FROM $tablename";
        $result = mysqli_query($connection, $query);

        if ($result) {
            echo "<table>";
            // Fetch and print table headers
            echo "<tr>";
            while ($row = mysqli_fetch_field($result)) {
                echo "<th>" . $row->name . "</th>";
            }
            echo "<th> Decimate </th>";
            echo "<th> Create </th>";
            echo "<th> Alter </th>";
            echo "</tr>";

            // Fetch and print each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "<td><a href='#' onclick='deleteRow(\"$tablename\", \"$primarycolumn\", \"" . $row[$primarycolumn] . "\")'>Delete</a></td>";
                echo "<td><a href='addRow.php?tablename=" . urlencode($tablename) . "'>Create</a></td>";
                echo "<td><a href='updateRow.php?tablename=$tablename&primarycolumn=$primarycolumn&id=" . $row[$primarycolumn] . "'>Update</a></td>";
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