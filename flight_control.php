<?php 

if(isset($_GET['DelFlight'])&& $_GET['DelFlight']!=""){
	include_once '../includes/db_connect.php';
	$flight=new flight_control($mysqli);
	$flight->DelFlight($_GET['DelFlight']);
	$flight->impFlightmanager();
	
	
}

	
if(isset($_GET['Inname'])&&isset($_GET['Inendtime'])&&isset($_GET['InputCap'])){
		include_once '../includes/db_connect.php';
	$flight=new flight_control($mysqli);
	$flight->InsertFlight($_GET['Inname'],$_GET['Inendtime'],$_GET['InputCap']);
	$flight->impFlightmanager();

}
class flight_control{
	public $con;
	public function __construct($c){
		$this->con=$c;
	}

	public function impFlightmanager(){
		echo "<div id='addflight' style='    display: none;'/>";
		echo "<from >";
		echo "<input type='text' name='add_flight' placeholder='FLIGHT NAME' />";
		echo "<br>";
		echo "<input type='text' name='add_flight' placeholder='DATE: ex 2018-05-1'/>";
			echo "<br>";
		echo "<input type='text' name='add_flight' placeholder='Capacity'/>";
			echo "<br>";
		echo "<br><input type='submit' class= 'btn btn-success' value='Add' onclick='insertflight()'/>";
		echo "</form>";
		
		
		
		echo "</div>";
		echo "<table width='80%' border='0'>";
   

        echo "<th bgcolor='#CCCCCC'> Plane(s) with seats available</th>";
		echo "<th  bgcolor='#CCCCCC'> Cancel Flight(s) </th>";
       
	   $sql="SELECT * FROM flights";
	   $data=mysqli_query($this->con,$sql);
	   while($rows=mysqli_fetch_array($data)){
		   echo "<tr>";
		   echo "<td>";
		   echo $rows['flight_name'];
		   echo "</td>";
		   echo "<td>";

		   echo "<center><input type='button' value ='".$rows['flight_id']."' onclick='flightdel(this)' /></center>";
		  
		   echo "</td>";
		   echo "</tr>";
	   }
	   echo "</table>";
	
	   
		
	}
	public function DelFlight($name){
		$sql="DELETE FROM flights where flight_id='".$name."'";

		if(mysqli_query($this->con,$sql)){
			echo "Flight has been canceled";
		}
		else echo mysqli_error($this->con);
		$sql="DELETE FROM seating where flight_id='".$name."'";
	
		if(mysqli_query($this->con,$sql)){
			echo "Flight has been canceled";
		}
		else echo mysqli_error($this->con);

		
	}
	public function InsertFlight($flight_name,$flight_date,$flight_capacity){
		$sql="INSERT INTO `flights`(`flight_name`, `flight_date`, `flight_capacity`)VALUES 
		('".$flight_name."', '".$flight_date."', '".$flight_capacity."')";
		if(mysqli_query($this->con,$sql)){
			echo "Flight added";
		}
		else echo mysqli_error($this->con);
		
	}
	public function getTotalaccounts(){
		echo "<table width='80%' border=0>";
        echo "<tr bgcolor='#CCCCCC'>";
            echo "<td>Total number of accounts created</td>";
        echo "</tr>";
		$totsaccounts = mysqli_query($this->con, "SELECT DISTINCT COUNT(id) from members");
            while($accountcreate = mysqli_fetch_array($totsaccounts)) {  
            echo "<tr>";       
            echo "<td>".$accountcreate[0]."</td>";
			}
			echo "</table>";
	
		
	}
	public function getNumberOfSeats(){
		echo "<table width='80%' border=0>";
        echo "<tr bgcolor='#CCCCCC'>";
        echo "<td>Total number of seats booked</td>";
        echo "</tr>";
		$totsseat = mysqli_query($this->con, "SELECT DISTINCT COUNT(seat_id) from seating");
            while($seatbook = mysqli_fetch_array($totsseat)) {  
            echo "<tr>";       
            echo "<td>".$seatbook[0]."</td>";
            }  
		echo "</table>";
			
	}
	public function getEmails(){
		echo "<table width='80%' border=0>";
        echo "<tr bgcolor='#CCCCCC'>";
        echo "<td>Email associated with a booked flight</td>";
        echo "</tr>";
		$emailassoc = mysqli_query($this->con, "SELECT DISTINCT members.email FROM seating INNER JOIN members on seating.email = members.email");
            
        while($emailshow = mysqli_fetch_array($emailassoc)) {         
            echo "<tr>";
            echo "<td>".$emailshow['email']."</td>";
          }
		  echo "   </table>   ";

	}
	
    
	
	
	
	
    
	
	
 }

?>