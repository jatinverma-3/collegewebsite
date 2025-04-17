<?php
include("includes/header.php"); 
include("includes/sidebar.php"); 
// include("includes/ind-functions.php"); 
?>

<title>Admin Dashboard</title>

<style>
    .clock-card {
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 5px;
    text-align: center;
}

.clock-card .card-body {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
}

.clock-card h2 {
    color: #007bff;
    font-size: 35px;
    margin-bottom: 10px;
}

.clock-card h1 {
    color: #007bff;
    font-size: 48px;
    font-weight: bold;
}

</style>



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card clock-card">
                <div class="card-body">
                  <h2 class="mb-0">Current Time is:</h2>
                  <h1 class="mb-0" id="clock"></h1>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card clock-card">
                <div class="card-body">
                  <h2 class="mb-0">Hello Admin</h2>
                  <h5>Access the things related to College at this admin panel. Have a good day!</h5>
                </div>
              </div>
            </div>
          </div>

          <img src="../College Website/images/banner1.jpg" alt="">
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script>
function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    
    hours = hours < 10 ? '0' + hours : hours;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;
    
    var time = hours + ':' + minutes + ':' + seconds;
    
    document.getElementById('clock').innerText = time;
    
    setTimeout(updateClock, 1000); // Update every second
}

updateClock(); // Initial call to start clock
</script>

<?php 
include("includes/footer.php"); 
?>