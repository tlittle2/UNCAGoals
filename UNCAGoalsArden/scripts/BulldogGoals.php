<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include ("dbinfo.inc.php");
    $con = mysqli_connect($hostname, $username, $password, $database);
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die("I am doomed!!");
    }
       
    /*    
    if(isset($_SESSION['userlogin'])){
        echo '"<script type= text/javascript> window.location= "https://www.cs.unca.edu/~tlittle2/UNCAGoals/scripts/BulldogGoals.php"</script>';
        
    }else{
        echo '"<script type= text/javascript> window.location= "https://www.cs.unca.edu/~tlittle2/UNCAGoals/scripts/loginForm.html"</script>';
    }
    */
    
    

?>

<!DOCTYPE html>
<html>
<head>


<base href= "https://www.cs.unca.edu/~tlittle2/UNCAGoals/scripts/BulldogGoals.php">
<title>Team Statistics</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type = "text/css" href="../css/GoalStyleSheet2.css">

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
    echo "<td>";
    echo "<a href= 'https://www.cs.unca.edu/~tlittle2/UNCAGoals/index2.php' target= 'blank'> Add a new game here</a>";
    echo "</td>";
    echo "<td>";
    echo "</table>";
    
       
    
?>
   
<?php 
    
    $query = "SELECT id, date, opponent, runsScored, qualities, ourFreebies, ourBigInning, totalBases, runsAllowed, freebiesAllowed, bigInningAllowed, leadoffOuts, pitchesThrown, gameResult, numOfQualities, 
numOfAtBats, goalsTotal FROM uncagoals ORDER BY date DESC";
    $result = mysqli_query($con, $query);
    
    $num = mysqli_num_rows($result);
    mysqli_close($con);
    
    ?>
    <div class= "centertitle"><h1>Bulldog Goals</h1></div><br><br>
    
    
    
   	<form class= 'datecenter' onsubmit= " return validDates();" action= "https://www.cs.unca.edu/~tlittle2/UNCAGoals/queries/seeDates.php" method= "post">
    <table>
        <tr>
        <td>
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
    
<center><a href= 'https://www.cs.unca.edu/~tlittle2/UNCAGoals/queries/seeAll.php' target= "blank">Click here to see all time stats</a></center>

<!--  <a href= "#bottom">Click here to go to the bottom</a>-->
        <table border="1"  class= "dataTable">
		<tr>
			<!-- <th>ID</th> -->
			<th>Date</th>
			<th>Opponent</th>
			<th>>= 6 Runs</th>
			<th>50% Quality at-Bats</th>
			<th> >= 9 Freebies </th>
			<th> 1+ Big Inning</th>
			<th>>= 13 Total Bases</th>
			<th> <= 5 Runs </th>
			<th> <= 8 Freebies </th>
			<th>No Big Innings</th>
			<th> >= 4 Leadoff Outs</th>
			<th> < 150 Pitches Thrown </th>
			<th>Game Result</th>
			<th>Goals Met</th>
			<!--  <th>Delete</th>
			<th>Update</th>-->
		</tr>
		
		 <?php
		 
		 //This builds the table and does the logic
		  include("colorLogic.php");
            
        ?>	
 
 
 
 </body>
 </html>