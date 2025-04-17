<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
include("includes/ind-functions.php"); 
?>

<title>Search - Euphoria</title>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Search Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Search Users</li>
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
                <h3 class="card-title">View </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Add this above the table -->
                <form method="GET" action="">
                    <div class="input-group mb-3">
                        <!-- Search input with placeholder -->
                        <input type="text" name="search" class="form-control" placeholder="Search by name, email, or phone" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">

                        
                    </div>

                    <!-- Radio buttons with proper spacing and labels -->
                    <div class="form-group">
                        <label class="d-block mb-2"><strong>Search Type:</strong></label>

                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="buyer" value="buyer" <?php echo (isset($_GET['type']) && $_GET['type'] == 'buyer') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="buyer">End User</label>
                        </div>

                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" id="seller" value="seller" <?php echo (isset($_GET['type']) && $_GET['type'] == 'seller') ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="seller">Vendor</label>
                        </div>

                        <br>

                        <!-- Search button -->
                        <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" style="margin-top:20px">Search</button>
                        </div>

                    </div>
                </form>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



<?php 

if(isset($_GET['search']) && isset($_GET['type'])):
    if($_GET['type']=="buyer"){
        echo "<script>window.location.href='view-end-users.php?query=" .$_GET['search']. "';</script>";
    }else if($_GET['type']=="seller"){
        echo "<script>window.location.href='view-all-vendors.php?query=" .$_GET['search']. "';</script>";
    }
endif;


include("includes/footer.php");
?>