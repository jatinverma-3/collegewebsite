<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/connection.php"); 

// Fetch all announcements from the database
$query = "SELECT * FROM announcements";
$result = mysqli_query($conn, $query);
?>

<title>View Announcements - NWCC</title>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Announcements</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Announcements</li>
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
                            <h3 class="card-title">List of Announcements</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Headline</th>
                                        <th>Introduction</th>
                                        <th>Placement Details</th>
                                        <th>Significance</th>
                                        <th>Student Achievements</th>
                                        <th>Quotes</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['headline']; ?></td>
                                            <td><?php echo $row['introduction']; ?></td>
                                            <td><?php echo $row['placement_details']; ?></td>
                                            <td><?php echo $row['significance']; ?></td>
                                            <td><?php echo $row['student_achievements']; ?></td>
                                            <td><?php echo $row['quotes']; ?></td>
                                            <td><?php echo $row['created_at']; ?></td>
                                            <td>
                                                <button class="btn btn-danger" onclick="delete_announcement(<?php echo $row['id']; ?>)">Delete</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script>
    function delete_announcement(id) {
        var confirmDelete = confirm("Do you really want to delete this announcement?");
        if (confirmDelete) {
            $.ajax({
                type: "POST",
                url: "delete-ajax-announcement-page.php",
                data: { bid: id, table: 'announcements' },
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
