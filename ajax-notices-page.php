<?php 
include("connection.php");

if (isset($_POST['opr'])) {
    if ($_POST['opr'] == "notices") {
        // Fetch all notices
        $s = "SELECT * FROM notices ORDER BY created_at DESC;"; // Fetching notices in descending order of creation
        $result = mysqli_query($conn, $s);

        // Loop through each row and display the notices
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="notice-card">';
                echo '<h2>' . htmlspecialchars($row['title']) . '</h2>'; // Sanitize output
                echo '<p>' . htmlspecialchars($row['description']) . '</p>';
                echo '<p><small>Created at: ' . date("F j, Y, g:i a", strtotime($row['created_at'])) . '</small></p>';
                echo '</div>';
            }
        } else {
            echo '<p>No notices available.</p>';
        }
    }
}
?>
