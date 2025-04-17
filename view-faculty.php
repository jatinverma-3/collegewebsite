<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/connection.php"); 

// Query to get all faculty details
$s = "SELECT * FROM faculty"; 
$result = mysqli_query($conn, $s);
?>

<title>View All Faculty - NWCC</title>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View All Faculty</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">View All Faculty</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">View Faculty</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover" style="margin-top:10px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['designation']; ?></td>
                                        <td><?php echo $row['department']; ?></td>
                                        <td><img src="../College Website/images/<?php echo $row['image']; ?>" alt="faculty image" style="width: 100px;"></td>
                                        <td><?php echo $row['created_at']; ?></td>
                                        <td>
                                            <button class="btn btn-danger" onclick="delete_data('<?php echo $row['id']; ?>','faculty')">Delete</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <br>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script>
    function delete_data(id, table) {
        var c = confirm("Do you really want to delete this faculty?");
        if (c) {
            datatosend = {
                bid: id,
                table: table
            };
            $.ajax({
                type: "POST",
                url: "delete-ajax.php",
                data: datatosend,
                success: function(response) {
                    alert(response);
                    window.location.href = 'view-faculty.php'; // Redirect to updated faculty list
                },
                error: function(err) {
                    console.error('Error:', err);
                }
            });
        }
    }
</script>

<?php 
include("includes/footer.php"); 
?>
