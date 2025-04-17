<?php 
include("connection.php");

if(isset($_POST['opr'])){
    if($_POST['opr'] == "events"){
        // Fetch all events
        $s = "SELECT * FROM events;";
        $result = mysqli_query($conn, $s);
        
        // Arrays to store events
        $events = [];

        // Loop through each row and add to the events array
        while($row = mysqli_fetch_assoc($result)) {
            $events[] = $row;
        }

        // Display all events
        if(!empty($events)) {
            echo "<h1>Events</h1>";
            echo '<div class="row" id="events">';
            foreach ($events as $event) {
                echo '<div class="event-col">';
                echo '<h1>' . $event['event_name'] . '</h1>';
                echo '<h3>Date: ' . $event['event_date'] . '</h3>';
                echo '<h3>Time: ' . $event['event_time'] . '</h3>';
                echo '<h2>Venue: ' . $event['venue'] . '</h2>';
                echo '<p>' . $event['description'] . '</p>';
                echo '<h4>Audience: ' . $event['audience'] . '</h4>'; // Display audience
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "<h2>No events available.</h2>";
        }
    }
}
?>
