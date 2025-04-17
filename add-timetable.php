<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/connection.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $instructions = mysqli_real_escape_string($conn, $_POST['instructions']);
    $contact_info = mysqli_real_escape_string($conn, $_POST['contact_info']);

    // Insert into timetable
    $timetable_sql = "INSERT INTO timetable (title, location, instructions, contact_info) 
                      VALUES ('$title', '$location', '$instructions', '$contact_info')";

    if (mysqli_query($conn, $timetable_sql)) {
        $timetable_id = mysqli_insert_id($conn);

        if (isset($_POST['subjects']) && !empty($_POST['subjects'])) {
            $subjects = $_POST['subjects'];
            $exam_dates = $_POST['exam_dates'];
            $exam_times = $_POST['exam_times'];
            $durations = $_POST['durations'];

            foreach ($subjects as $index => $subject) {
                $subject = mysqli_real_escape_string($conn, $subject);
                $exam_date = mysqli_real_escape_string($conn, $exam_dates[$index]);
                $exam_time = mysqli_real_escape_string($conn, $exam_times[$index]);
                $duration = mysqli_real_escape_string($conn, $durations[$index]);

                $subject_sql = "INSERT INTO timetable_subjects (timetable_id, subject, exam_date, exam_time, duration) 
                                VALUES ('$timetable_id', '$subject', '$exam_date', '$exam_time', '$duration')";
                mysqli_query($conn, $subject_sql);
            }

            echo "<script>alert('Timetable added successfully!');</script>";
        } else {
            echo "<script>alert('Please fill in all subject details.');</script>";
        }
    } else {
        echo "<script>alert('Error: Could not add timetable. " . mysqli_error($conn) . "');</script>";
    }
}
?>

<title>Add Timetable - NWCC</title>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Add Timetable</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>
                <div class="form-group">
                    <label for="instructions">Instructions</label>
                    <textarea class="form-control" id="instructions" name="instructions"></textarea>
                </div>
                <div class="form-group">
                    <label for="contact_info">Contact Information</label>
                    <input type="text" class="form-control" id="contact_info" name="contact_info">
                </div>

                <div id="subject-fields">
                    <h4>Subjects and Exam Details</h4>
                    <div class="subject-group">
                        <input type="text" name="subjects[]" placeholder="Subject" class="form-control" required>
                        <input type="date" name="exam_dates[]" class="form-control" required>
                        <input type="time" name="exam_times[]" class="form-control" required>
                        <input type="text" name="durations[]" placeholder="Duration" class="form-control" required>
                    </div>
                </div>

                <button type="button" class="btn btn-secondary" onclick="addSubjectField()">Add Another Subject</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</div>

<script>
function addSubjectField() {
    const fields = `
        <div class="subject-group">
            <input type="text" name="subjects[]" placeholder="Subject" class="form-control" required>
            <input type="date" name="exam_dates[]" class="form-control" required>
            <input type="time" name="exam_times[]" class="form-control" required>
            <input type="text" name="durations[]" placeholder="Duration" class="form-control" required>
        </div>
    `;
    document.getElementById('subject-fields').insertAdjacentHTML('beforeend', fields);
}
</script>

<?php 
include("includes/footer.php"); 
?>
