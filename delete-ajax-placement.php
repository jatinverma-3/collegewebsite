<?php
include("includes/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['bid']);
    $table = mysqli_real_escape_string($conn, $_POST['table']);
    
    if ($table === 'placements') {
        $delete_query = "DELETE FROM placements WHERE id = '$id'";
        
        if (mysqli_query($conn, $delete_query)) {
            echo "Placement deleted successfully!";
        } else {
            echo "Error deleting placement: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid table selected!";
    }
} else {
    echo "Invalid request method!";
}
?>
