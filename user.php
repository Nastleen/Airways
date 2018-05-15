<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>


<html>
<html lang="en">
    <head>
	  <link rel="icon" href="pictures/Logo.PNG" sizes="65x56">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">



        <title>Secure Login: Plane Creation</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/user.css" rel="stylesheet">
	<script>
	function showset(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","selectseats.php?f="+str,true);
        xmlhttp.send();
    }
}
</script>



    </head>
    <body>
        <?php $_SESSION['page']=2;require_once("parts/navigation.php"); ?>




    <?php if (login_check($mysqli) == true && ($_SESSION['username'] == "admin")||($_SESSION['username']=="gchokhon")):?> 

      <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4">Admin Panel</h1>
          <div class="list-group">
            <div class="btn-group-horizontal ">
          <a href="protected_page.php" class="btn btn-Primary" role="button">Admin Page</a><br>
          <a href="user.php" class="btn btn-Primary" role="button">User Page</a><br>
          <a href="index.php" class="btn btn-Primary" role="button">HomePage</a><br>
          </div>
          </div>
        </div>


    <?php elseif (login_check($mysqli) == true  && $_SESSION['username'] != "admin") : ?>
     <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">
          <h1 class="my-4"></h1>
          <div class="list-group">
          </div>
        </div>
        <!-- /.col-lg-3 -->

      <?php else: ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>

    <?php if (login_check($mysqli) == true) : ?>
        <div class="col-lg-9">

          <div class="card mt-4">
            <div class="card-body">
              <h3 class="card-title" style="text-align: center;"><u>Select your seat(s) and flight(s) below!</u></h3>
              <p class="card-text">


            
            <center><p>Welcome <b><?php echo htmlentities($_SESSION['username']); ?></b>!</p></center>
            <center><p>
               - First select the flight you would like to buy a ticket for.<br>
               - Then, select which seat you would like to sit in.<br>
               - Then, enter your voucher (if you have one). <br>
               - If your given voucher is invalid or you don't have one, you will pay full price!<br>
            </p></center>
              </p>
            </div>
          </div>
         <!-- /.card -->

          <div class="card card-outline-secondary my-4 text-center">
            <div class="card-header">
              Order form
            </div>
	






                <div class="plane">
		
  <div class="cockpit" >
    <h1>Plane</h1>
  </div>
  <div class="exit exit--front fuselage text-center">
  </div>
  <form action="flightselect.php" method="post" name="form"> 

<td>Please select your flight here!</td>
  <?php 
  $cdate= date("Y-m-d");
		$sql="SELECT * FROM flights" ;
        $data=mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($data)!=0){
			
			echo "<select name='fli' onchange='showset(this.value)'>";
			echo "<option value=''></option>";
	    while($rows=$data->fetch_assoc()){
			
			if($rows['flight_date']> $cdate)
			  echo "<option value=".$rows['flight_id'].">".$rows['flight_name']."</option>";
		  else{
		
			  $sql="DELETE FROM `flights` WHERE `flight_id`='".$rows['flight_id']."'";
			
			  if(mysqli_query($mysqli,$sql)){
			  }
			  else echo mysqli_error($mysqli);
			  $sql="DELETE FROM `seating` WHERE `flight_id`='".$rows['flight_id']."'";
		  }
		
		}
	
		echo "</select>";
	
		}
		else echo mysqli_error($mysqli);
		
		?>
		<br>
		<br>
    <td>Please enter your voucher here!</td>
    <td><input type="text" name="vouchercheck"></td>
	<div id="txtHint">
  
  </div>
  <div class="exit exit--back fuselage">    
  </div>
</div>
<input type="submit" class="btn btn-primary" name="seatme" value="Submit Order" style="font-weight: bold;">

</form>



          </div>
          <!-- /.card -->

          <div class="card card-outline-secondary my-4"> 
            <div class="card-header" style="text-align: center;"> 
             Seats that have been taken
            </div> 
            <div class="card-body"> 


<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
     $query = mysqli_query($mysqli, "SELECT seat_id, flight_id FROM seating WHERE CONCAT(`flight_id`, `seat_id`) LIKE '%".$valueToSearch."%'"); 
}
 else {
    $query = mysqli_query($mysqli, "SELECT seat_id, flight_id FROM seating");
}
?>



          <form action="user.php" method="post">
            <input type="text" name="valueToSearch" placeholder="       Value To Search"><br><br>
            <input type="submit" class="btn btn-warning" name="search" value="Filter Seats"><br><br>
            
            <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <th>Seat Number</th>
                    <th>Flight Number</th>
        </tr>
        <?php while($row = mysqli_fetch_array($query)) {
                
                echo"<tr>";
                echo "<td>".$row['seat_id']."</td>";
                echo "<td>".$row['flight_id']."</td>";
                echo"<tr>";
              }
                ?>
    </table>  
        </form>

    </table>      


            </div> 
          </div>

        </div>
        <!-- /.col-lg-9 -->

      </div>



    </div>
    <!-- /.container -->

    </body>

<?php require_once("parts/footer.php"); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
</html>