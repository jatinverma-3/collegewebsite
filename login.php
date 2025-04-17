<?php 
session_start();
if(isset($_SESSION['user_id']))
{
    echo "<script>window.location.href='index.php';</script>";
}
include("includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ness Wadia College - Admin Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h1><a href="index.php"><b>Ness Wadia College of Commerce</b></a></h1>
    <h4>Admin Login</h4>
  </div>
  <!-- /.login-logo -->
  <div class="card" style="margin-top:20px">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <center>
                <button type="submit" class="btn btn-primary">Sign In</button>
            </center>
          </div>
          <!-- /.col -->
        </div>
      </form>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>


<?php 

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        //echo "<script>console.log('".$_POST['email'].$_POST['password']."');</script>";
        $s = "SELECT * FROM admin WHERE email=? AND password=?";
        $stmt = $conn->prepare($s);
        $stmt->bind_param("ss",$_POST['email'],$_POST['password']);
        $stmt->execute();
        $result = $stmt->get_result();
        //print_r($result);

        if($result->num_rows == 1)
        {
            $_SESSION['user_id'] = $_POST['email'];
            echo "<script>window.location.href='index.php';</script>";
        }else{
            echo "<script>alert('Invalid user or password! Try again');</script>";
        }

    }else{
        echo "<script>alert('Enter valid details!');</script>";
    }
}

?>