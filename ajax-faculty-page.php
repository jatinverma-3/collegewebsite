<?php
include("includes/connection.php"); // Include your database connection

// Fetch all faculty members from the database
$sql = "SELECT * FROM faculty";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    echo "<h1>Faculty Members</h1>";
    echo '<div class="faculty-container">'; // Use a container for styling

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="faculty-card">';
        echo '<img src="images/' . $row['image'] . '" alt="' . htmlspecialchars($row['name']) . '">';
        echo '<h2>' . htmlspecialchars($row['name']) . '</h2>';
        echo '<p><strong>Designation:</strong> ' . htmlspecialchars($row['designation']) . '</p>';
        echo '<p><strong>Department:</strong> ' . htmlspecialchars($row['department']) . '</p>';
        echo '</div>';
    }

    echo '</div>';
} else {
    echo '<p>No faculty members found.</p>';
}
?>
