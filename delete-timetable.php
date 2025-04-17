<?php
include("includes/connection.php");

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    // Delete timetable and related subjects
    $delete_subjects_query = "DELETE FROM timetable_subjects WHERE timetable_id = '$id'";
    mysqli_query($conn, $delete_subjects_query);

    $delete_timetable_query = "DELETE FROM timetable WHERE id = '$id'";
    
    if (mysqli_query($conn, $delete_timetable_query)) {
        echo "Timetable deleted successfully!";
    } else {
        echo "Error deleting timetable: " . mysqli_error($conn);
    }
}
?>
