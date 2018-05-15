<?php

include_once 'includes/db_connect.php';

include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true)
  {
  $logged = 'in';
  }
  else
  {
  $logged = 'out';
  }

?>
<?php 
require_once("parts/header.php");
$_SESSION['page']=1;
require_once("parts/navigation.php");

?>

  
    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <h1 class="my-4"><center>User Status</center>
          </h1>
          <div class="list-group">
            <a class="list-group-item ">
<?php
if (isset($_GET['error']))
  {
  echo '<p class="error">Error Logging In!</p>';
  }
?> 
              <?php
if (login_check($mysqli) == true)
  {
  echo '<p><center>Currently logged ' . $logged . ' as:<br><br><b> ' . htmlentities($_SESSION['username']) . '</b></center></p>';
  echo '<a href="includes/logout.php" class="btn btn-primary" role="button">Log out</a>';
  }
  else
  {
  echo '<p><center>Currently logged ' . $logged . '.</center></p>' . '</a>';
  echo '<li class="list-group-item"><center>' . "If you don't have a login, please register with us!" . '</center></li>';
  echo '<a href="register.php" class="btn btn-primary" role="button">Register</a>';
  }
  
?> 
            </a>
          </div>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="pictures/index_plane.jpg" height="900" width="400" alt="">
            <div class="card-body text-center">
              <h3 class="card-title text-center">Welcome to Airways flights</h3>
              <h4>Flights are $150, half off with a valid voucher!</h4>
              <br>
              <p class="card-text ">
              </p>
            </div>
          </div>
          <!-- /.card -->
          <!-- /.card -->
        </div>
        <!-- /.col-lg-9 -->
      </div>
    </div>
    <!-- /.container -->
  </body>
  <?php 
  require_once("parts/footer.php");
  ?>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js">
  </script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js">
  </script>
</html>