<!DOCTYPE html>
<html lang="en">
<head>



<title>All-Time Statistics</title>

<!-- <base href= "http://localhost/UNCAGoals/scripts/"> -->

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type = "text/css" href="css/GoalsStyleSheet.css">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>
<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("../scripts/dbinfo.inc.php");
$con = mysqli_connect($hostname, $username, $password, $database);
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("I am doomed!!");
    
}


echo "All-Time Statistics";

echo "<br><br>";

//As A TEAM
//Average Goals per Game
echo "As a Team:";
echo "<br>";


//Average Goals per Game
$query1 = "SELECT AVG(goalsTotal) AS averageGoalCount from uncagoals";
$result1 = mysqli_query($con, $query1);
while($row = mysqli_fetch_assoc($result1)){
    echo "Average goals met: ". round($row['averageGoalCount'],2);
}

echo "<br>";

$query = "SELECT SUM(runsScored) - SUM(runsAllowed) as RunDifferential FROM uncagoals;";
$result = mysqli_query($con, $query);
while($row = mysqli_fetch_assoc($result)){
    if($row['RunDifferential'] > 0){
        echo "Run Differential: +". ($row['RunDifferential']);
        
    }else{
        echo "Run Differential: ". ($row['RunDifferential']);
        
    }
    
}   



echo "<br>";

//What 5 goals are most prevalent when we win/lose?

//What goals are we missing the most?


echo "<br><br><br>";

//OFFENSIVE

echo "On Offense: ";

echo "<br>";

//Average percent qualities
$query2 = "SELECT AVG(qualities) as averageQualities FROM uncagoals";
$result2 = mysqli_query($con, $query2);
while($row = mysqli_fetch_assoc($result2)){
    echo "Average qualities met: ". round($row['averageQualities'], 2) * 100 ."%";
}

echo "<br>";


//Average Freebies Taken
$query3 = "SELECT AVG(ourFreebies) as averageFreebies FROM uncagoals";
$result3 = mysqli_query($con, $query3);
while($row = mysqli_fetch_assoc($result3)){
    echo "Average freebies met: ". round($row['averageFreebies'], 2);
}

echo "<br>";


//Average total bases to run ratio
$query4 = "SELECT AVG(totalBases / runsScored) as runRatio FROM uncagoals";
$result4 = mysqli_query($con, $query4);
while($row = mysqli_fetch_assoc($result4)){
    echo "Average totalBase to run ratio: ". round($row['runRatio'], 2);
}

echo "<br>";



echo "<br><br><br>";
//DEFENSIVE

echo "On Defense: ";
echo "<br>";

//Average pitchesThrown
$query5 = "SELECT AVG(pitchesThrown) as averagePitches FROM uncagoals";
$result5 = mysqli_query($con, $query5);
while($row = mysqli_fetch_assoc($result5)){
    echo "Average pitches thrown per game: ". round($row['averagePitches'], 2);
}

echo "<br>";


//Average freebies given up
$query9 = "SELECT AVG(freebiesALlowed) as freebiesAllowed FROM uncagoals";
$result9 = mysqli_query($con, $query9);
while($row = mysqli_fetch_assoc($result9)){
    echo "Average freebies given up: ". round($row['freebiesAllowed'],2);
}

echo "<br>";


//Average amount of time we are getting the leadoff out
$query10 = "SELECT AVG(leadoffOuts) as averageLeadOut FROM uncagoals";
$result10 = mysqli_query($con, $query10);
while($row = mysqli_fetch_assoc($result10)){
    echo "Average time we get the lead off out: ". round($row['averageLeadOut'],2) . "/9";
}

include("countsAllTime.php");


?>


<!-- PUT GOOGLE CHART HERE? -->
 <div id="time_div" style="width: 800px; height: 400px;"></div>



<?php 
mysqli_close($con);
?>


</body>
</html>
