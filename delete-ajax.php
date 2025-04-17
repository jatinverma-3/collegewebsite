<?php
include("includes/connection.php"); // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the posted data
    $id = mysqli_real_escape_string($conn, $_POST['bid']);
    $table = mysqli_real_escape_string($conn, $_POST['table']);
    
    // Check if the table is 'faculty'
    if ($table === 'faculty') {
        // Select the faculty member's image so we can delete it from the server as well
        $get_image_query = "SELECT image FROM faculty WHERE id = '$id'";
        $image_result = mysqli_query($conn, $get_image_query);
        $image_row = mysqli_fetch_assoc($image_result);
        $image_path = '../College Website/images/' . $image_row['image'];

        // Query to delete the faculty record
        $delete_query = "DELETE FROM faculty WHERE id = '$id'";
        
        if (mysqli_query($conn, $delete_query)) {
            // If the faculty record is deleted, delete the image file from the server
            if (file_exists($image_path)) {
                unlink($image_path); // Delete the image file
            }
            echo "Faculty member deleted successfully!";
        } else {
            echo "Error deleting faculty: " . mysqli_error($conn);
        }
    } 

    else if ($table === 'course') {
        // Query to delete the course record
        $delete_query = "DELETE FROM course WHERE id = '$id'";
        
        if (mysqli_query($conn, $delete_query)) {
            echo "Course deleted successfully!";
        } else {
            echo "Error deleting course: " . mysqli_error($conn);
        }
    } 

    else if ($table === 'notices') {
        // Query to delete the notice record
        $delete_query = "DELETE FROM notices WHERE id = '$id'";
        
        if (mysqli_query($conn, $delete_query)) {
            echo "Notice deleted successfully!";
        } else {
            echo "Error deleting notice: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid table selected!";
    }
    
    
} else {
    echo "Invalid request method!";
}

?>
