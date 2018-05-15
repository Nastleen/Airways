<?php
include_once 'includes/db_connect.php';

class Seats{
	private $arr=array();

	public function build_plane($ar){
		$this->arr=$ar;
		for($j=1;$j<10;$j++){
			$class="row row--".$j;
			echo '<li class="'.$class.'" style="padding-right: 100%;">';
            echo '<ol class="seats" type="A" ">';
		for($i='A';$i<='F';$i++){
			$char=$j.$i;
		
			if(in_array($char,$this->arr)){
					  echo '<li class="seat">';
					    echo '<label  style="    margin-left: 13px;    background: #9797ad; ">'.$char.'</label>';
					    echo '</li>';
				
			}
			else{
		  echo '<li class="seat">';
          echo '<input type="checkbox" name="flight[]" id="'.$char.'" value="'.$char.'" />';
          echo '<label for="'.$char.'">'.$char.'</label>';
        echo '</li>';
			}
		}
		echo '</ol>';
		echo '</li>';
		
		}
	}
	
}

if(isset($_GET['f'])&&$_GET['f']!=""){
	$stack=array();
	$sql="SELECT * FROM seating where flight_id='".$_GET['f']."'";
	$data=mysqli_query($mysqli,$sql);
        if(mysqli_num_rows($data)!=0){
			
			 while($rows=$data->fetch_assoc()){
				 array_push($stack,$rows['seat_id']);
			 }
		}
		else echo mysqli_error($mysqli);
	
		 $s=new Seats();
		$s->build_plane($stack);
}
else echo "f is not passing";

?>