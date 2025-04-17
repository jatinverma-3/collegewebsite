<?php
include("includes/connection.php"); // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted data
    $id = mysqli_real_escape_string($conn, $_POST['bid']);
    $table = mysqli_real_escape_string($conn, $_POST['table']);
    
    // Check if the table is 'events'
    if ($table === 'events') {
        // Query to delete the event record
        $delete_query = "DELETE FROM events WHERE id = '$id'";
        
        if (mysqli_query($conn, $delete_query)) {
            echo "Event deleted successfully!";
        } else {
            echo "Error deleting event: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid table selected!";
    }
} else {
    echo "Invalid request method!";
}
?>
