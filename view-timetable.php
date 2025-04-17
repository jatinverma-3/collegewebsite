<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/connection.php");

$query = "SELECT * FROM timetable";
$result = mysqli_query($conn, $query);
?>

<title>View Timetables - NWCC</title>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Timetables</h1>
    </section>

    <section class="content">
        <div class="container-fluid">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td>
                                <button class="btn btn-danger" onclick="delete_timetable(<?php echo $row['id']; ?>)">Delete</button>
                                <a href="timetable-details.php?id=<?php echo $row['id']; ?>" class="btn btn-info">View Details</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script>
    function delete_timetable(id) {
        var confirmDelete = confirm("Do you really want to delete this timetable?");
        if (confirmDelete) {
            $.ajax({
                type: "POST",
                url: "delete-timetable.php",
                data: { id: id },
                success: function(response) {
                    alert(response);
                    location.reload(); // Reload the page to reflect changes
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }
    }
</script>

<?php 
include("includes/footer.php"); 
?>
