<div id="date-server">
	<i class="icon-hdd"></i>&nbsp;
	<span id="date-server-content">
	</span>
</div>
<script>
//	Variable Globales
global_date   = new Date(0,0,0,<? echo date("H, i, s"); ?>)
global_hour   = global_date.getHours();
global_minute = global_date.getMinutes();
global_second = global_date.getSeconds();

function getDateServer(){

	var output;
	
	//	Secondes
	if (global_second < 10)
		global_second = "0" + Math.round(global_second);
	else if(global_second >= 60) {
		global_second = "00";
		global_minute++;
	}
	
	//	Minutes
	if (global_minute < 10)
		global_minute = "0" + Math.round(global_minute);
	else if(global_minute >= 60) {
		global_minute = "00";
		global_hour++;
	}
	
	//	Heures
	if (global_hour < 10)
		global_hour = "0" + Math.round(global_hour);
	else if(global_hour >= 24) {
		global_hour = "00";
	}
	
	//	Output
	output = global_hour + ":" + global_minute + ":" + global_second;
	document.getElementById("date-server-content").innerHTML=output;
	global_second++;
}

//	Timer : each second
setInterval("getDateServer()", 1000);
</script>