<?php 
include("connection.php");

if(isset($_POST['opr'])){
    if($_POST['opr'] == "courses"){
        // Fetch all courses
        $s = "SELECT * FROM course;";
        $result = mysqli_query($conn, $s);
        
        // Arrays to store courses by category
        $juniorCourses = [];
        $ugCourses = [];
        $pgCourses = [];

        // Loop through each row and categorize the courses
        while($row = mysqli_fetch_assoc($result)) {
            if($row['category'] == "Junior College") {
                $juniorCourses[] = $row;
            } elseif($row['category'] == "Undergraduate") {
                $ugCourses[] = $row;
            } elseif($row['category'] == "Postgraduate") {
                $pgCourses[] = $row;
            }
        }

        // Display Junior College courses
        if(!empty($juniorCourses)) {
            echo "<h1>Junior College</h1>";
            echo '<div class="row" id="juniorcollege">';
            foreach ($juniorCourses as $course) {
                echo '<div class="course-col">';
                echo '<h1>' . $course['name'] . '</h1>';
                echo '<h3>' . $course['section'] . '</h3>';
                echo '<h2>' . $course['tenure'] . '</h2>';
                echo '<h2>' . $course['fees'] . '</h2>';
                echo '<p>' . $course['info'] . '</p>';
                echo '</div>';
            }
            echo '</div>';
        }


        // Display Undergraduate courses
        if(!empty($ugCourses)) {
            echo "<h1>Undergraduate (UG)</h1>";
            echo '<div class="row" id="ug">';
            foreach ($ugCourses as $course) {
                echo '<div class="course-col">';
                echo '<h1>' . $course['name'] . '</h1>';
                echo '<h3>' . $course['section'] . '</h3>';
                echo '<h2>' . $course['tenure'] . '</h2>';
                echo '<h2>' . $course['fees'] . '</h2>';
                echo '<p>' . $course['info'] . '</p>';
                echo '</div>';
            }
            echo '</div>';
        }
        

        // Display Postgraduate courses

        if(!empty($ugCourses)) {
            echo "<h1>Post graduate (PG)</h1>";
            echo '<div class="row" id="pg">';
            foreach ($pgCourses as $course) {
                echo '<div class="course-col">';
                echo '<h1>' . $course['name'] . '</h1>';
                echo '<h3>' . $course['section'] . '</h3>';
                echo '<h2>' . $course['tenure'] . '</h2>';
                echo '<h2>' . $course['fees'] . '</h2>';
                echo '<p>' . $course['info'] . '</p>';
                echo '</div>';
            }
            echo '</div>';
        }
        
    }
}
?>
