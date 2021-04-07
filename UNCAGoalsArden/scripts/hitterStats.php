<!DOCTYPE html>
<html lang="en">
<head>

<title>Hitter Statistics</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type = "text/css" href="../css/GoalStyleSheet.css">
<link rel="stylesheet" type = "text/css" href="../css/GoalStyleSheet2.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

<script src="GoalsJS.js"></script>
<link rel="stylesheet"	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("dbinfo.inc.php");
$con = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("I am doomed!!");
}
?>

<!-- <input type= "submit" value = "Export" id= "export" onclick= "Table2ExcelHitter()">  -->
<table border= "1" class= "dataTable" id= "hitterTable">
	<tr>
		<th>Player Name</th>
		<th>Average</th>
		<th>OPS</th>
		<th>GP</th>
		<th>AB</th>
		<th>R</th>
		<th>H</th>
		<th>2B</th>
		<th>3B</th>
		<th>HR</th>
		<th>RBI</th>
		<th>TB</th>
		<th>SLG</th>
		<th>BB</th>
		<th>HBP</th>
		<th>SO</th>
		<th>GDP</th>
		<th>OBP</th>
		<th>SF</th>
		<th>SH</th>
		<th>SB</th>
		<th>ISO</th>
		<th>BABIP</th>
		<th>wOBA</th>
		<th>K%</th>
		<th>BB%</th>
		<th>wRAA</th>
		<th>Runs Created</th>
		<th>Base Runs</th>
	</tr>
	
<?php 
$query= "SELECT * FROM uncacsci_tlittle2.positionplayers_spring2021 ORDER BY playerName";

$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
    $playerName = $row['playerName'];
    $average = $row['Average'];
    $ops = $row['OPS'];
    $gp= $row['GP'];
    $ab = $row['AB'];
    $r = $row['R'];
    $h= $row['H'];
    $b2 = $row['2B'];
    $b3 = $row['3B'];
    $hr= $row['HR'];
    $rbi = $row['RBI'];
    $tb = $row['TB'];
    $slg=  $row['SLG'];
    $bb= $row['BB'];
    $hbp= $row['HBP'];
    $so = $row['SO'];
    $gdp = $row['GDP'];
    $obp= $row['OBP'];
    $sf = $row['SF'];
    $sh = $row['SH'];
    $sb= $row['SB'];
    $iso = $row['ISO'];
    $babip= $row['BABIP'];
    $wOBA= $row['wOBA'];
    $kP= $row['Kpercentage'];
    $bP= $row['BBpercentage'];
    $wRAA= $row['wRAA'];
    $rC= $row['RunsCreated'];
    $bR= $row['BaseRuns'];
    #$mm= $row['MeetsMin'];
    
?>

	<tr>
		<td><?php echo "$playerName"?></td>
		<td><?php echo "$average"?></td>
		<td><?php echo "$ops"?></td>
		<td><?php echo "$gp"?> &nbsp;</td>
		<td><?php echo "$ab"?></td>
		<td><?php echo "$r"?></td>
		<td><?php echo "$h"?></td>
		<td><?php echo "$b2"?></td>
		<td><?php echo "$b3"?></td>
		<td><?php echo "$hr"?></td>
		<td><?php echo "$rbi"?></td>
		<td><?php echo "$tb"?></td>
		<td><?php echo "$slg"?></td>
		<td><?php echo "$bb"?></td>
		<td><?php echo "$hbp"?></td>
		<td><?php echo "$so"?></td>
		<td><?php echo "$gdp"?></td>
		<td><?php echo "$obp"?></td>
		<td><?php echo "$sf"?></td>
		<td><?php echo "$sh"?></td>
		<td>&nbsp;<?php echo "$sb"?></td>
		<td><?php echo "$iso"?></td>
		<td><?php echo "$babip"?></td>
		<td><?php echo "$wOBA"?></td>
		<td><?php echo "$kP"?></td>
		<td><?php echo "$bP"?></td>
		<td><?php echo "$wRAA"?></td>
		<td><?php echo "$rC"?></td>
		<td><?php echo "$bR"?></td>
		
	</tr>
<?php 

}

?>

</table>



</body>
</html>