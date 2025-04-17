<?php
include("includes/connection.php");

if (isset($_POST['opr'])) {
    if ($_POST['opr'] == "timetable") {
        // Fetch all timetables
        $s = "SELECT * FROM timetable";
        $result = mysqli_query($conn, $s);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<h2>' . $row['title'] . '</h2>';

            $timetable_id = $row['id'];
            $subject_query = "SELECT * FROM timetable_subjects WHERE timetable_id = '$timetable_id'";
            $subject_result = mysqli_query($conn, $subject_query);

            echo '<table class="table">';
            echo '<tr><th>Subjects</th><th>Exam Date</th><th>Exam Time</th><th>Duration</th></tr>';
            while ($subject_row = mysqli_fetch_assoc($subject_result)) {
                echo '<tr>';
                echo '<td>' . $subject_row['subject'] . '</td>';
                echo '<td>' . $subject_row['exam_date'] . '</td>';
                echo '<td>' . $subject_row['exam_time'] . '</td>';
                echo '<td>' . $subject_row['duration'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';

            echo '<p>Location: ' . $row['location'] . '</p>';
            echo '<p>Instructions: ' . $row['instructions'] . '</p>';
            echo '<p>Contact: ' . $row['contact_info'] . '</p>';
            echo '<hr>';
        }
    }
}
?>
