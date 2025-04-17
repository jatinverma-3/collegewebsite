<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/connection.php"); 

// Handle form submission to add new placement
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $job_profile = mysqli_real_escape_string($conn, $_POST['job_profile']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $ssc_result = mysqli_real_escape_string($conn, $_POST['ssc_result']);
    $hsc_result = mysqli_real_escape_string($conn, $_POST['hsc_result']);
    $graduation = mysqli_real_escape_string($conn, $_POST['graduation']);

    $query = "INSERT INTO placements (title, company, position, job_profile, salary, date, ssc_result, hsc_result, graduation) 
              VALUES ('$title', '$company', '$position', '$job_profile', '$salary', '$date', '$ssc_result', '$hsc_result', '$graduation')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Placement added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<title>Add Placement - NWCC</title>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Placement</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Placement</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>
                <div class="form-group">
                    <label for="company">Company</label>
                    <input type="text" name="company" class="form-control" id="company" required>
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" name="position" class="form-control" id="position" required>
                </div>
                <div class="form-group">
                    <label for="job_profile">Job Profile</label>
                    <textarea name="job_profile" class="form-control" id="job_profile" required></textarea>
                </div>
                <div class="form-group">
                    <label for="salary">Salary</label>
                    <input type="number" name="salary" class="form-control" id="salary" required>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" id="date" required>
                </div>
                <div class="form-group">
                    <label for="ssc_result">SSC Result</label>
                    <input type="number" step="0.01" name="ssc_result" class="form-control" id="ssc_result" required>
                </div>
                <div class="form-group">
                    <label for="hsc_result">HSC Result</label>
                    <input type="number" step="0.01" name="hsc_result" class="form-control" id="hsc_result" required>
                </div>
                <div class="form-group">
                    <label for="graduation">Graduation Result</label>
                    <input type="number" step="0.01" name="graduation" class="form-control" id="graduation" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Placement</button>
            </form>
        </div>
    </section>
</div>

<?php 
include("includes/footer.php"); 
?>
