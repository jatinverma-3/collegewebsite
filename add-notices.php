<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/connection.php"); // Your DB connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the input
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Insert data into the notices table
    $sql = "INSERT INTO notices (title, description, created_at) 
            VALUES ('$title', '$description', NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Notice added successfully!');</script>";
    } else {
        echo "<script>alert('Error: Could not add notice. " . mysqli_error($conn) . "');</script>";
    }
}
?>

<title>Add Notice - NWCC</title>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Notice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Notice</li>
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
                            <h3 class="card-title">Notice Details</h3>
                        </div>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
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
