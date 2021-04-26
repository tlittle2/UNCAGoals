<?php
session_set_cookie_params(0); //session_set_cookie_params('600'); // 10 minutes.
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("dbinfo.inc.php");
$con = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("I am doomed!!");
}
       
        
#echo $_SESSION['userlogin'];
if(!isset($_SESSION['userlogin'])){
    echo '"<script type= text/javascript> window.location= "https://www.cs.unca.edu/~tlittle2/UNCAGoals/scripts/loginForm.html"</script>"';
    session_unset();
    session_destroy();
}
   
   
?>

<!DOCTYPE html>
<html lang="en">
<head>

<!-- <base href= "https://www.cs.unca.edu/~tlittle2/UNCAGoals/scripts/BulldogGoals.php"> -->
<title>Team Statistics</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type = "text/css" href="../css/GoalStyleSheet2.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>

<script src="GoalsJS.js"></script>
</head>
<body>

<?php       
    echo "<table border= '0' class= 'logoff'>";
    echo "<td>";
    echo "<a href= 'logoff.php'> Log Off </a> ";
    echo "</td>";
    echo "</table>";
    
    echo "<table border= '0'>";
    echo "<tr>";
    echo "<td>";
    echo "<a href= 'https://www.cs.unca.edu/~tlittle2/UNCAGoals/index2.php' target= 'blank'> Add a new game here</a>";
    echo "</td>";
    echo "</tr>";
    
    echo "<tr>";
    echo "<td>";
    echo "<a href = 'hitterStats.php' target = '_blank'>2021 Hitter Stats </a>";
    echo "</td>";
        
    echo "<td>";
    echo "<a href = 'pitcherStats.php' target = '_blank'>2021 Pitcher Stats </a>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
    
       
    
?>
   
<?php 
    
    $query = "SELECT id, date, opponent, runsScored, qualities, ourFreebies, ourBigInning, totalBases, runsAllowed, freebiesAllowed, bigInningAllowed, leadoffOuts, pitchesThrown, gameResult, numOfQualities, 
numOfAtBats, goalsTotal FROM uncagoals ORDER BY id DESC";
    $result = mysqli_query($con, $query);
    
    $num = mysqli_num_rows($result);
    mysqli_close($con);
    
    ?>
    <div class= "centertitle"><h1>Bulldog Goals</h1></div><br><br>
    
    
    
   	<form class= 'datecenter' onsubmit= " return validDates();" action= "https://www.cs.unca.edu/~tlittle2/UNCAGoals/queries/seeDates.php" method= "post">
    <table class = "dateTable">
        <tr>
        <td style= "width: 400px">
        <div id= 'date'>Please input dates you want to see statistics for: </div>
        </td>
        
        <td>
        <input type= 'date' id= 'date1' name= 'date1'  min= '1' max= '10' value="<?php echo date("m-d-Y");?>">
        </td>
        
        <td>
         -
        </td>
        
        
        <td>
        <input type= 'date' id= 'date2' name= 'date2' min= '1' max= '10'>
        </td>
        
       
        <td>
         <input type= "submit" id= "dateSubmit" value= "Submit Dates">
        </td>
        </tr>
   
    </table>
    </form>
    <br><br>
    
<div class = "center">
<a href= 'https://www.cs.unca.edu/~tlittle2/UNCAGoals/queries/seeAll.php' target= "blank">Click here to see all time stats</a> 

&nbsp; &nbsp; &nbsp;
<input type= "submit" value = "Export" id= "export" onclick= "Table2ExcelGoals()"> 
</div>

<!--  <a href= "#bottom">Click here to go to the bottom</a>-->
        <table class= "dataTable" width = "100%" id= "dataTable">
		<tr>
			<!-- <th>ID</th> -->
			<th class= "border">Date</th>
			<th class= "border">Opponent</th>
			<th class= "border">>= 6 Runs</th>
			<th class= "border">>50% Quality at-Bats</th>
			<th class= "border"> >= 9 Freebies </th>
			<th class= "border"> 1+ Big Inning</th>
			<th class= "border">>= 13 Total Bases</th>
			<th class= "border"> &lt;= 5 Runs </th>
			<th class= "border"> &lt;= 8 Freebies </th>
			<th class= "border">No Big Innings</th>
			<th class= "border"> >= 4 Leadoff Outs</th>
			<th class= "border"> &lt; 150 Pitches Thrown </th>
			<th class= "border">Game Result</th>
			<th class= "border">Goals Met</th>
			<!--  <th>Delete</th>
			<th>Update</th>-->
		</tr>
		
		 <?php
		 
		 //This builds the table and does the logic
		  include("colorLogic.php");
            
        ?>	
 
 
 
 </body>
 </html>