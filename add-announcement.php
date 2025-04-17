<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/connection.php"); // Your DB connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $headline = mysqli_real_escape_string($conn, $_POST['headline']);
    $introduction = mysqli_real_escape_string($conn, $_POST['introduction']);
    $placement_details = mysqli_real_escape_string($conn, $_POST['placement_details']);
    $significance = mysqli_real_escape_string($conn, $_POST['significance']);
    $student_achievements = mysqli_real_escape_string($conn, $_POST['student_achievements']);
    $quotes = mysqli_real_escape_string($conn, $_POST['quotes']);

    // Insert query
    $query = "INSERT INTO announcements (headline, introduction, placement_details, significance, student_achievements, quotes) 
              VALUES ('$headline', '$introduction', '$placement_details', '$significance', '$student_achievements', '$quotes')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Announcement added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding announcement: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<title>Add Announcement - NWCC</title>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Announcement</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Announcement</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">New Announcement</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="headline">Headline</label>
                                    <input type="text" class="form-control" name="headline" required>
                                </div>
                                <div class="form-group">
                                    <label for="introduction">Introduction</label>
                                    <textarea class="form-control" name="introduction" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="placement_details">Placement Details</label>
                                    <textarea class="form-control" name="placement_details" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="significance">Significance</label>
                                    <textarea class="form-control" name="significance" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="student_achievements">Student Achievements</label>
                                    <textarea class="form-control" name="student_achievements" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="quotes">Quotes</label>
                                    <textarea class="form-control" name="quotes" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Announcement</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include("includes/footer.php"); ?>
