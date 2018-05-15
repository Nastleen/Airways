<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'Admin/flight_control.php';
sec_session_start();

/*
0 => string '__construct' (length=11)
  1 => string 'impFlightmanager' (length=16)
  2 => string 'DelFlight' (length=9)
  3 => string 'InsertFlight' (length=12)
  4 => string 'getTotalaccounts' (length=16)
  5 => string 'getNumberOfSeats' (length=16)
  6 => string 'getEmails' (length=9)
*/

?> 

<!DOCTYPE html> 
<html lang="en"> 
    <head> 
	  <link rel="icon" href="pictures/Logo.PNG" sizes="65x56">
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
        <meta name="description" content=""> 
        <meta name="author" content=""> 

        <title>Secure Login: Plane Create</title> 


            <!-- Bootstrap core JavaScript --> 
    <script src="vendor/jquery/jquery.min.js"></script> 
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
	<script src="Admin/flight.js"></script>

    <!-- Bootstrap core CSS --> 
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 

    <!-- Custom styles for this template --> 
    <link href="css/test.css" rel="stylesheet"> 
    </head> 
    <body> 
        <!-- Navigation --> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> 
      <div class="container"> 
        <a class="navbar-brand" href="index.php">Airways</a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> 
          <span class="navbar-toggler-icon"></span> 
        </button> 
        <div class="collapse navbar-collapse" id="navbarResponsive"> 
          <ul class="navbar-nav ml-auto"> 
            <li class="nav-item "> 
              <a class="nav-link" href="index.php">Home 
                <span class="sr-only">(current)</span> 
              </a> 
            </li> 
            <?php if (login_check($mysqli) == true && $_SESSION['username'] == "admin"):?> 

<li class="nav-item active">
              <a class="nav-link" href="protected_page.php">Plane Control</a>
            </li>


<?php elseif (login_check($mysqli) == true  && $_SESSION['username'] != "admin") : ?>

<li class="nav-item active">
              <a class="nav-link" href="user.php">Plane</a>
            </li>

<?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Plane</a>
            </li>
<?php endif; ?>
            <li class="nav-item"> 
              <a class="nav-link" href="register.php">Login</a> 
            </li> 
          </ul> 
        </div> 
      </div> 
    </nav> 
    <?php
if (login_check($mysqli) == true && ($_SESSION['username'] == "admin")||($_SESSION['username']=='gchokhon')):?> 
    <!-- Page Content --> 
    <div class="container"> 

      <div class="row"> 

        <div class="col-lg-3"> 
          <center><h1 class="my-4">About</h1><center> 
          <div class="list-group"> 
            <a class="list-group-item ">This contains admin functions</a> 
             
          </div> 
        </div> 
        <!-- /.col-lg-3 --> 

        <div class="col-lg-9"> 

          <div class="card mt-4" style="text-align: center;"> 
            <div class="card-body"> 
              <h3 class="card-title">Admin Control Center</h3> 
              
              <p class="card-text"> 


             
            <p>Welcome <?php echo htmlentities($_SESSION['username']);?>, here are some useful links!</p> 


	<div class="btn-group-horizontal ">
  	  <a href="user.php" class="btn btn-warning role="button">User Page</a>
  	  <a href="index.php" class="btn btn-primary" role="button">Homepage</a>
	</div><br>
   
            </div> 
          </div> 
         <!-- /.card --> 


                   <div class="card card-outline-secondary my-4"> 
            <div class="card-header"> 
               <center>Vouchers<center> 
            </div> 
            <div class="card-body"> 
                    <div class="wrapper"> 
        <div class="container-fluid"> 
            <div class="row"> 

             <form action="addvoucher.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Voucher</td>
                <td><input type="text" name="voucher"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" class="btn btn-success" name="SubmitVoucher" value="Submit new voucher(s)"><br></td>
            </tr>
        </table>
    </form>    
   

<table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>ID</td>
            <td>Voucher</td>
	    <td>Function</td>
        </tr>
        <?php 
            $vouchlist = mysqli_query($mysqli, "SELECT * FROM vouchers");
        while($resvouch = mysqli_fetch_array($vouchlist)) {         
            echo "<tr>";
            echo "<td>".$resvouch['id']."</td>";
            echo "<td>".$resvouch['voucher']."</td>";
            echo "<td><a href=\"editvoucher.php?id=$resvouch[id]\">Edit</a> | 
                      <a href=\"deletevoucher.php?id=$resvouch[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
        }
        ?>
    </table>      


                <div class="col-md-12"> 
                </div> 
            </div>         
        </div> 
    </div> 
            </div> 
          </div> 
          <!-- /.card --> 
		  

          <div class="card card-outline-secondary my-4"> 
            <div class="card-header"> 
             <center>Plane Manager</center>
            </div> 
            <div class="card-body"> 
			<?php 
			/*
0 => string '__construct' (length=11)
  1 => string 'impFlightmanager' (length=16)
  2 => string 'DelFlight' (length=9)
  3 => string 'InsertFlight' (length=12)
  4 => string 'getTotalaccounts' (length=16)
  5 => string 'getNumberOfSeats' (length=16)
  6 => string 'getEmails' (length=9)
*/
			$flight=new flight_control($mysqli);
			$class_methods = get_class_methods($flight);
			//var_dump( $class_methods);
			$flight->getTotalaccounts();
			$flight->getNumberOfSeats();
			$flight->getEmails();
			?>



   






	<center><button class="btn btn-success" onClick='show("addflight")' > Add Flight </button><br><br>
	<div id="flights">
	<table>

	<?php 

	$flight=new flight_control($mysqli);
	$flight->impFlightmanager();



	?>


	</div>
	</center>

    <!--table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Plane with seats available</td>
        </tr>
        <?php 
		/*
            $planeavail = mysqli_query($mysqli, "SELECT DISTINCT flights.flight_name FROM flights INNER JOIN seating on seating.flight_id = flights.flight_id ");

            while($planeshow = mysqli_fetch_array($planeavail)) {  
            echo "<tr>";       
            echo "<td>".$planeshow['flight_name']."</td>";
            }
			*/
            
        ?>
    </table-->    


            </div> 
          </div> 
          <!-- /.card --> 

        </div> 
        <!-- /.col-lg-9 --> 

      </div> 



    </div> 
    <!-- /.container --> 

 
 
 

<?php require_once("parts/footer.php"); ?>

    </body> 

        <?php
else:
?> 
           <p> 
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>. 
            </p> 
        <?php
endif;
?> 
</html>