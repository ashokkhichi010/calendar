<?php 
	error_reporting(0);
	session_start();
	$currentDay = date('d');
	$currentMonth = date('n');
	$currentYear = date('Y');

	$selectedYear = $currentYear;
	$selectedMonth = $currentMonth;
	
	$numMonth = array(
		'Jan' => 1,
		'Feb' => 2,
		'Mar' => 3,
		'Apr' => 4,
		'May' => 5,
		'Jun' => 6,
		'Jul' => 7,
		'Aug' => 8,
		'Sep' => 9,
		'Oct' => 10,
		'Nov' => 11,
		'Dec' => 12
	);
	$fullMonth = array(
		1  =>' January',
		2  =>' February',
		3  =>' March',
		4  =>' April',
		5  =>' May',
		6  =>' Jun',
		7  =>' July',
		8  =>' August',
		9  =>' September',
		10 =>' October',
		11 =>' November',
		12 =>' December'
	);
	if (isset($_POST['year'])) {
		$_SESSION['year'] = $_POST['year'];
	}
	elseif (isset($_POST['month'])) {
		$_SESSION['month'] = $numMonth[$_POST['month']];
	}
	elseif (isset($_POST['previous'])){
		$_SESSION['month']--;
		if ($_SESSION['month'] == 0) {
			$_SESSION['month'] = 12;
			$_SESSION['year']--;
		}
	}
	elseif (isset($_POST['next'])){
		$_SESSION['month']++;
		if ($_SESSION['month'] == 13) {
			$_SESSION['month'] = 1;
			$_SESSION['year'] ++;
		}
	}
	else{
		$_SESSION['year'] = $currentYear;
		$_SESSION['month'] =$currentMonth;
	}
	$selectedMonth = $_SESSION['month'];
	$selectedYear = $_SESSION['year'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CALENDER</title>
	<link rel="stylesheet" type="text/css" href="css/calenderCss.css">
</head>
<body>
<center>
	<div class="calender">
		
		<div id="mainPart" class="row">
			<div id="year" class="btn" onclick="select(id)"><?php echo $selectedYear;?></div>
			<div id="month" class="btn" onclick="select(id)"><?php echo $fullMonth[$selectedMonth];?></div>
			<form method="post">
				<div id="pre-next">
					<input id="previous" type="submit" name="previous" value="<" />
					<input id="next" type="submit" name="next" value=">" />
					<input class="btn" id="today" type="submit" name="today" value="TO DAY" />
				</div>
			</form>
		</div>
		<form method="post">
		<div id="years">
			<?php
				$yearStart = 2021;
				$yearEnd = 2040;
				for ($i = 1; $i <= 5; $i++) { 
					echo "<div class='row-2'>";
					for ($j=0; $j <= 3; $j++) { 
						if ($yearStart <= $yearEnd) {
							echo "<input id='".$yearStart."' class='col-2' type='submit' name = 'year' value='".$yearStart."' onclick='select(id)' />";
							$yearStart++;
						}
					}
					echo "</div>";
				}
			?>
		</div>
		<div id="months">
			<?php
				$monthStart = 1;
				for ($i=0; $i < 3; $i++) { 
					echo "<div class='row-2'>";
					for ($j=0; $j < 4; $j++) { 
						if ($monthStart <= 12) {
							$shortMonth = date('M',mktime(0,0,0,$monthStart,1,$selectedYear));
							$numMonth   = date('n',mktime(0,0,0,$monthStart,1,$selectedYear));
							$fullMonth  = date('F',mktime(0,0,0,$monthStart,1,$selectedYear));
							echo "<input id='".$numMonth."' class='col-2' type='submit' name = 'month' value='".$shortMonth."' onclick='selectMonths(id)' />";
							$monthStart++;
						}
					}
					echo "</div>";
				}
			?>
		</div>
		</form>
		<div id="heading" class="row">
			<div class="col">Su</div>
			<div class="col">Mo</div>
			<div class="col">Tu</div>
			<div class="col">We</div>
			<div class="col">Th</div>
			<div class="col">Fr</div>
			<div class="col">Sa</div>
		</div>
		<div id="day">
		<?php 
			for($year = $selectedYear; $year <= $selectedYear; $year++){
				for($month = $selectedMonth; $month <= $selectedMonth; $month++){
					$day = 1;
					$monthDays = date("t", mktime(0,0,0,$month,1,$year));
					$startingWeekDay = date('w', mktime(0,0,0,$month,1,$year));
					for($week = 1; $week <= 6; $week++){ 
						echo '<div class="row">';
						for($i = 1; $i <= 7; $i++){
							if ($i <= $startingWeekDay) {
								echo '<div class = "empty col"></div>';
							}else if ($day <= $monthDays) {
								echo "<div class='col' id ='".$year."-".$month."-".$day."' onclick = 'showDate(id)'>".$day."</div>";
								$day++;
								$startingWeekDay = 0;
							}else{
								break;
							}
						}
						echo '</div>';
					}
				}
			}
		?>
		</div>
	</div>
</center>

<div id="showDate"></div>
	<script type="text/javascript" src="js/calenderJs.js"></script>
</body>
</html>