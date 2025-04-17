<?php
include("includes/connection.php");

if(isset($_POST['opr'])){
    if($_POST['opr'] == "placements"){
        // Fetch all placements
        $query = "SELECT * FROM placements";
        $result = mysqli_query($conn, $query);

        // Arrays to store placement data
        $placements = [];

        // Loop through each row and add to placements array
        while ($row = mysqli_fetch_assoc($result)) {
            $placements[] = $row;
        }

        // Display placements
        if (!empty($placements)) {
            echo "<h1>Placements</h1>";
            echo '<div class="row" id="placements">';
            foreach ($placements as $placement) {
                echo '<div class="placement-col">';
                echo '<h1>' . $placement['title'] . '</h1>';
                echo '<h3>Company: ' . $placement['company'] . '</h3>';
                echo '<h3>Position: ' . $placement['position'] . '</h3>';
                echo '<p>Job Profile: ' . $placement['job_profile'] . '</p>';
                echo '<h4>Salary: ' . $placement['salary'] . '</h4>';
                echo '<h4>SSC Result: ' . $placement['ssc_result'] . '</h4>';
                echo '<h4>HSC Result: ' . $placement['hsc_result'] . '</h4>';
                echo '<h4>Graduation Result: ' . $placement['graduation'] . '</h4>';
                echo '<h5>Date: ' . $placement['date'] . '</h5>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "<h2>No placements available.</h2>";
        }
    }
}
?>
