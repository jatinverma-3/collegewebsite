<?php
include("includes/connection.php"); // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted data
    $id = mysqli_real_escape_string($conn, $_POST['bid']);
    $table = mysqli_real_escape_string($conn, $_POST['table']);
    
    // Check if the table is 'announcements'
    if ($table === 'announcements') {
        // Query to delete the announcement record
        $delete_query = "DELETE FROM announcements WHERE id = '$id'";
        
        if (mysqli_query($conn, $delete_query)) {
            echo "Announcement deleted successfully!";
        } else {
            echo "Error deleting announcement: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid table selected!";
    }
} else {
    echo "Invalid request method!";
}
?>
