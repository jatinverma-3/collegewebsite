<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/connection.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $designation = mysqli_real_escape_string($conn, $_POST['designation']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);

    // Handle image upload
    // $upload_dir = '../college/admin/images';

    $upload_dir = 'C:\xampp\htdocs\college\admin\images';
    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($image_ext, $allowed_extensions)) {
        $new_image_name = uniqid() . '.' . $image_ext; // Unique image name
        $image_path = $upload_dir . $new_image_name;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($image_tmp_name, $image_path)) {
            // Insert data into the database
            $sql = "INSERT INTO faculty (name, designation, department, image, created_at) 
                    VALUES ('$name', '$designation', '$department', '$new_image_name', NOW())";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Faculty details added successfully!');</script>";
            } else {
                echo "<script>alert('Error: Could not save data to database.');</script>";
            }
        } else {
            echo "<script>alert('Error: Could not upload image.');</script>";
        }
    } else {
        echo "<script>alert('Invalid file format. Only JPG, JPEG, PNG, and GIF are allowed.');</script>";
    }
}

?>

<title>Faculty - NWCC</title>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Faculty</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Faculty</li>
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
                            <h3 class="card-title">Faculty Details</h3>
                        </div>
                        <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="prod-name">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Department</label>
                                    <input type="text" class="form-control" id="department" name="department" required>
                                </div>
                                <div class="form-group">
                                    <label for="main-image">Upload Image</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" name="image" required>
                                    </div>
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
