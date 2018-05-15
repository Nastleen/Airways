
<?php
include_once 'includes/db_connect.php';

include_once 'includes/functions.php';
include_once 'parts/header.php';
sec_session_start();
echo "<body>";
echo "<div id='card' style='	box-sizing: border-box;
    width:40%;

	padding-bottom: 20px;
    padding-top: 20px;
    text-align: center;
    border: black;
    border-radius: 2px;
    border-color: black;
	margin-left: 10%;
    border-style: solid;'>";
	


if (login_check($mysqli) == true)
    {
    $logged = 'accessing';
    }
  else
    {
    $logged = 'not accessing';
    }

$username = $_SESSION['username'];
$getemail = mysqli_query($mysqli, "SELECT email FROM members WHERE username = '$username' ");
$email = '';

while ($gear = mysqli_fetch_array($getemail))
    {
    $email = $gear['email'];
    }


$count=0;
$sql="SELECT * from flights where flight_id=".$_POST['fli'];
if($result=mysqli_query($mysqli,$sql)){
	$row=mysqli_fetch_assoc($result);
echo "<h4> Flight: ".$row['flight_name']." </h4>";
echo "<h4 style='color:red;'>Exparation date : ".$row['flight_date']."</h4>";
}

if (isset($_POST['seatme'])&&isset($_POST['fli']))
    {
    if (!empty($_POST['flight']))
        {
        foreach($_POST['flight'] as $key => $selected)
            {
				$count++;
            echo "<p>You have selected seat: " . $selected . "</p>";
            $sql="INSERT INTO `seating`(`seat_id`, `flight_id`, `email`)VALUES('".$selected."','".$_POST['fli']."','".$email."')";
			
			if(mysqli_query($mysqli,$sql))echo $selected." is available!";
			else echo mysqli_error($mysqli);
            }

        }
    }
		$t=0;
if(isset($_POST['vouchercheck'])){
	$sql="SELECT * from vouchers";
	$result=mysqli_query($mysqli,$sql);

	while($row=mysqli_fetch_assoc($result)){
		if($row['voucher']==$_POST['vouchercheck']){
			$t=1;
		}
		
	}
}
	echo "<br>";
if($t==1){

	echo " Your voucher is is VALID!";
			echo "<br>";
	echo "Your amount due is: $".$count*150/2 .".00";
}
else{
	echo "<br>";
		echo " You don't have a voucher, or it is not VALID!";
		echo "<br><br>";
		echo "Your payment is: $".$count*150 .".00";
}
        echo "<form>";
        echo "<br/><a href='user.php'>Back to seating</a>";
		 echo "<br/> ";
		echo "<br/><button onclick='myFunction()'>Print this page</button>";
		echo "</form>";
		echo "<script>
function myFunction() {
    window.print();
}
</script>";

		
		echo "</div>";
		echo "</body>";
		echo "</html>";
		
		
	/*

$seated = mysqli_query($mysqli, "SELECT seat_id FROM seating WHERE seat_id = '" . $theseat . "' ");
$testme = '';

while ($row = mysqli_fetch_array($seated))
    {
    $testme = $row['seat_id'];
    }

$countUser = mysqli_query($mysqli, "SELECT email FROM seating WHERE email = '" . $email . "' ");
$theuser = '';


while ($row = mysqli_fetch_array($countUser))
    {
    $theuser = $row['email'];
    }

if (($userVouch != $dinkle))
    {
    print 'But there is no voucher or you entered your voucher wrong,<br /> Please re-enter the voucher and try again.<br />';
    echo "<br/><a href='user.php'>Back to seating</a>";
    }
  else
    {
    $var = 1;
    if ($theseat != $testme && $theuser == $email)
        {
        $result = mysqli_query($mysqli, "INSERT INTO seating (flight_id, email, seat_id) VALUES ('$var', '$email', '$selected')");
        echo "<font color='green'> You have successfully taken seat.<br />";
        echo "<br/><a href='user.php'>Back to seating</a>";
        }
      else
        {
        print 'Your voucher is VALID but ' . "$theseat" . " is taken already. <br />";
        print 'or you have already booked a seat.';
        echo "<br/><a href='user.php'>Back to seating</a>";
        }
    }
	*/
	/*
	$userVouch = $_POST['vouchercheck'];
$VouchExist = mysqli_query($mysqli, "SELECT voucher FROM vouchers WHERE voucher = '" . $userVouch . "' ");
$dinkle = '';

while ($row = mysqli_fetch_array($VouchExist))
    {
    $dinkle = $row['voucher'];
    }

$theseat = '';
*/

?>
