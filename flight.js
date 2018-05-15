var on=false;
function show(str){
	
	
	if(!on){
	var d=document.getElementById(str);
	if(d){
		d.style.display='block';
	}
	on=true;
	}
	else{
		var d=document.getElementById(str);
	if(d){
		d.style.display='none';
	}
	on=false;
	}
}





function flightdel(str) {
	
    if (str == "") {
        document.getElementById("flights").innerHTML = "";
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
                document.getElementById("flights").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","Admin/flight_control.php?DelFlight="+str.value,true);
        xmlhttp.send();
    }
}
function insertflight(){
	
	var inputs=document.getElementsByName("add_flight");
	
	if (inputs[0].value == "") {
        document.getElementById("flights").innerHTML = "";
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
                document.getElementById("flights").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","Admin/flight_control.php?Inname="+inputs[0].value+"&& Inendtime="+inputs[1].value+" && InputCap="+inputs[2].value,true);
        xmlhttp.send();
    }

    

}