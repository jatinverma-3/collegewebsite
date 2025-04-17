<?php 
include("includes/connection.php");

if (isset($_POST['opr'])) {
    if ($_POST['opr'] == "announcements") {
        // Fetch all announcements
        $s = "SELECT * FROM announcements;";
        $result = mysqli_query($conn, $s);
        
        // Arrays to store announcements
        $announcements = [];

        // Loop through each row and add to the announcements array
        while ($row = mysqli_fetch_assoc($result)) {
            $announcements[] = $row;
        }

        // Display all announcements
        if (!empty($announcements)) {
            echo "<h1>Announcements</h1>";
            echo '<div class="row" id="announcements">';
            foreach ($announcements as $announcement) {
                echo '<div class="announcement-col">';
                echo '<h1>' . $announcement['headline'] . '</h1>';
                echo '<h3>Introduction: ' . $announcement['introduction'] . '</h3>';
                echo '<h4>Placement Details: ' . $announcement['placement_details'] . '</h4>';
                echo '<h4>Significance: ' . $announcement['significance'] . '</h4>';
                echo '<h4>Student Achievements: ' . $announcement['student_achievements'] . '</h4>';
                echo '<p>Quotes: ' . $announcement['quotes'] . '</p>';
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "<h2>No announcements available.</h2>";
        }
    }
}
?>
