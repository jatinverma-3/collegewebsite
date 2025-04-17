<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/connection.php"); // Your DB connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the input
    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
    $event_time = mysqli_real_escape_string($conn, $_POST['event_time']);
    $venue = mysqli_real_escape_string($conn, $_POST['venue']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $audience = mysqli_real_escape_string($conn, $_POST['audience']); // New field

    // Insert data into the events table
    $sql = "INSERT INTO events (event_name, event_date, event_time, venue, description, audience, created_at) 
            VALUES ('$event_name', '$event_date', '$event_time', '$venue', '$description', '$audience', NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Event added successfully!');</script>";
    } else {
        echo "<script>alert('Error: Could not add event. " . mysqli_error($conn) . "');</script>";
    }
}

?>

<title>Add Event - NWCC</title>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Events</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Events</li>
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
                            <h3 class="card-title">Event Details</h3>
                        </div>
                        <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="event-name">Event Name</label>
                                    <input type="text" class="form-control" id="event_name" name="event_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="event-date">Event Date</label>
                                    <input type="date" class="form-control" id="event_date" name="event_date" required>
                                </div>
                                <div class="form-group">
                                    <label for="event-time">Event Time</label>
                                    <input type="time" class="form-control" id="event_time" name="event_time" required>
                                </div>
                                <div class="form-group">
                                    <label for="venue">Venue</label>
                                    <input type="text" class="form-control" id="venue" name="venue" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="audience">Audience (Department)</label>
                                    <input type="text" class="form-control" id="audience" name="audience">
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
