<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/connection.php");

// Fetch all placements from the database
$query = "SELECT * FROM placements";
$result = mysqli_query($conn, $query);
?>

<title>View Placements - NWCC</title>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Placements</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Placements</li>
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
                            <h3 class="card-title">List of Placements</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Company</th>
                                        <th>Position</th>
                                        <th>Job Profile</th>
                                        <th>Salary</th>
                                        <th>SSC Result</th>
                                        <th>HSC Result</th>
                                        <th>Graduation</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['company']; ?></td>
                                            <td><?php echo $row['position']; ?></td>
                                            <td><?php echo $row['job_profile']; ?></td>
                                            <td><?php echo $row['salary']; ?></td>
                                            <td><?php echo $row['ssc_result']; ?></td>
                                            <td><?php echo $row['hsc_result']; ?></td>
                                            <td><?php echo $row['graduation']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td>
                                                <button class="btn btn-danger" onclick="delete_placement(<?php echo $row['id']; ?>)">Delete</button>
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
    function delete_placement(id) {
        var confirmDelete = confirm("Do you really want to delete this placement?");
        if (confirmDelete) {
            $.ajax({
                type: "POST",
                url: "delete-ajax-placement.php",
                data: { bid: id, table: 'placements' },
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
