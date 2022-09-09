<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MY CALENDER</title>
	<link rel="stylesheet" type="text/css" href="calenderCss.css">
</head>
<body><center>
	<?php
		$MONTH = date('F');		// F - A full textual representation of a month (January through December)
		$Year = date('Y');		// Y - A four digit representation of a year
		echo "<h2>".$MONTH." ".$Year."</h2>";
	?>
	<div class="calender">
		<div class="row heading">
			<div class="col">Sun</div>
			<div class="col">Mon</div>
			<div class="col">Tue</div>
			<div class="col">Wed</div>
			<div class="col">Thu</div>
			<div class="col">Fri</div>
			<div class="col">Sat</div>
		</div>
		<?php
			$i = 1;
			$days = date('t');			//  t - The number of days in the given month
			// $week = date('w');			//  w - A numeric representation of the day (0 for Sunday, 6 for Saturday)
			$weekDay = date("w", mktime(0,0,0,9,1,2022));
			for ($r=0; $r < 5; $r++) { 
				echo "<div class='row'>";
				for ($j=0; $j < 7; $j++) { 
					if ($i <= $days) {
						// $w = date("l", mktime(0,0,0,01,09,2022));
						// echo $w;
						if ($j < $weekDay && $i == 1) {
							echo "<div class='col'></div>";
						}
						else{
							echo "<div class='col' id = 'td".$i."' onclick = 'changColor(id)'>".$i."</div>";
							$i++;
						}
					}
				}
				echo "</div>";
			}
		?>

	</div></center>
	<script type="text/javascript">
	var date = new Date();
	var currentYear  = date.getFullYear();
	var currentMonth = date.getMonth();
	var currentDate  = date.getDate();
	// document.getElementById('demo').innerHTML = new Date(currentYear, currentMonth+1, 0).getDate();
	var days = new Date(currentYear, currentMonth+1, 0).getDate();

	document.getElementById("td"+currentDate).style.color = "white";
	document.getElementById("td"+currentDate).style.backgroundColor = "blue";
	function changColor(id) {
		for (var i = 1; i <= days; i++) {
			if (id == "td"+i) {
				document.getElementById("td"+i).style.backgroundColor = "lightblue";
				document.getElementById("td"+i).style.color = "white";
			}
			else{
				document.getElementById("td"+i).style.backgroundColor = "";
				document.getElementById("td"+i).style.color = "black";
			}
			document.getElementById("td"+currentDate).style.color = "white";
			document.getElementById("td"+currentDate).style.backgroundColor = "blue";
		}
	}
	</script>
</body>
</html>