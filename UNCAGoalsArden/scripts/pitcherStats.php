<!DOCTYPE html>
<html lang="en">
<head>

<title>Pitcher Statistics</title>
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

<!--<input type= "submit" value = "Export" id= "export" onclick= "Table2ExcelPitcher()"> -->
<table border= "1" class= "dataTable" id= "hitterTable">
	<tr>
		<th>Player Name</th>
		<th>ERA</th>
		<th>WHIP</th>
		<th>W-L</th>
		<th>APP-GS</th>
		<th>CG</th>
		<th>SHO</th>
		<th>SV</th>
		<th>IP</th>
		<th>H</th>
		<th>R</th>
		<th>ER</th>
		<th>BB</th>
		<th>SO</th>
		<th>2B</th>
		<th>3B</th>
		<th>HR</th>
		<th>AB</th>
		<th>BA</th>
		<th>WP</th>
		<th>HBP</th>
		<th>Balk</th>
		<th>SFA</th>
		<th>SHA</th>
		<th>FIP</th>
		<th>K%</th>
		<th>BB%</th>
		<th>Kper9</th>
		<th>BBper9</th>
		<th>HRper9</th>
		<th>BABIP</th>
	</tr>
	
<?php 
$query= "SELECT * FROM uncacsci_tlittle2.pitchers_spring2021";

$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
    $playerName = $row['playerName'];
    $era = $row['ERA'];
    $whip = $row['WHIP'];
    $wl= $row['WL'];
    $appgs = $row['APP_GS'];
    $cg = $row['CG'];
    $sho= $row['SHO'];
    $sv = $row['SV'];
    $ip = $row['IP'];
    $h= $row['H'];
    $r = $row['R'];
    $er = $row['ER'];
    $bb=  $row['BB'];
    $so= $row['SO'];
    $b2= $row['2B'];
    $b3 = $row['3B'];
    $hr = $row['HR'];
    $ab= $row['AB'];
    $ba = $row['B_AVG'];
    $wp = $row['WP'];
    $hbp = $row['HBP'];
    $bk= $row['BK'];
    $sfa= $row['SFA'];
    $sha= $row['SHA'];
    $fip= $row['FIP'];
    $kP= $row['kPercentage'];
    $bbP= $row['bbPercentage'];
    $kPer9= $row['Kper9'];
    $bbPer9= $row['BBper9'];
    $hrPer9= $row['HRper9'];
    $babip= $row['BABIP'];
    
    #$mm= $row['MeetsMin'];
    
?>

	<tr>
		<td><?php echo "$playerName"?></td>
		<td><?php echo "$era"?></td>
		<td><?php echo "$whip"?></td>
		<td><?php echo "$wl"?> &nbsp;</td>
		<td><?php echo "$appgs"?> &nbsp;</td>
		<td><?php echo "$cg"?></td>
		<td><?php echo "$sho"?></td>
		<td><?php echo "$sv"?></td>
		<td><?php echo "$ip"?></td>
		<td><?php echo "$h"?></td>
		<td><?php echo "$r"?></td>
		<td><?php echo "$er"?></td>
		<td><?php echo "$bb"?></td>
		<td><?php echo "$so"?></td>
		<td><?php echo "$b2"?></td>
		<td><?php echo "$b3"?></td>
		<td><?php echo "$hr"?></td>
		<td><?php echo "$ab"?></td>
		<td><?php echo "$ba"?></td>
		<td><?php echo "$wp"?></td>
		<td><?php echo "$hbp"?></td>
		<td><?php echo "$bk"?></td>
		<td><?php echo "$sfa"?></td>
		<td><?php echo "$sha"?></td>
		<td><?php echo "$fip"?></td>
		<td><?php echo "$kP"?></td>
		<td><?php echo "$bbP"?></td>
		<td><?php echo "$kPer9"?></td>
		<td><?php echo "$bbPer9"?></td>
		<td><?php echo "$hrPer9"?></td>
		<td><?php echo "$babip"?></td>
	</tr>
<?php 

}

?>

</table>



</body>
</html>
