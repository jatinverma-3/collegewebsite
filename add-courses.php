<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/connection.php"); // Your DB connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $tenure = mysqli_real_escape_string($conn, $_POST['tenure']);
    $fees = mysqli_real_escape_string($conn, $_POST['fees']);
    $info = mysqli_real_escape_string($conn, $_POST['info']);

    // Insert data into the course table
    $sql = "INSERT INTO course (name, category, section, tenure, fees, info, created_at) 
            VALUES ('$name', '$category', '$section', '$tenure', '$fees', '$info', NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Course added successfully!');</script>";
    } else {
        echo "<script>alert('Error: Could not add course. " . mysqli_error($conn) . "');</script>";
    }
}

?>

<title>Add Course - NWCC</title>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Courses</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Courses</li>
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
                            <h3 class="card-title">Course Details</h3>
                        </div>
                        <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="prod-name">Full Name of Course</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Category</label>
                                    <select name="category" id="category" required class="form-control">
                                        <option value="Junior College">Junior College</option>
                                        <option value="Undergraduate">Undergraduate</option>
                                        <option value="Postgraduate">Postgraduate</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Section</label>
                                    <select name="section" id="section" class="form-control">
                                        <option value="Grant">Grant</option>
                                        <option value="Non Grant">Non Grant</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="prod-name">Tenure</label>
                                    <input type="text" class="form-control" id="tenure" name="tenure" required>
                                </div>

                                <div class="form-group">
                                    <label for="prod-name">Fees</label>
                                    <input type="text" class="form-control" id="fees" name="fees" required>
                                </div>

                                <div class="form-group">
                                    <label for="prod-name">Course Information</label>
                                    <input type="text" class="form-control" id="info" name="info" required>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php 
include("includes/footer.php"); 
?>
