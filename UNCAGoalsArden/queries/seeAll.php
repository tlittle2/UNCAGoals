<!DOCTYPE html>
<html>
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


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Goal Name', 'Count of Goal'],
          ['Runs Scored', 8000],
          ['Qualities', 8000],
          ['Big Innings', 24000],
          ['Freebies Taken', 30000],
          ['Total Bases', 30000],
          ['Runs Allowed', 50000],
          ['Freebies Allowed', 60000],
          ['Big Innings Allowed', 60000],
          ['Leadoff Outs', 60000],
          ['Pitches Thrown', 60000]
        ]);

        var options = {
          width: 800,
          chart: {
            title: 'Amount of Times a Goal Reached',
            subtitle: ''
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          series: {
            0: { axis: '' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: '' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              distance: {label: 'parsecs'}, // Bottom x-axis.
              brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
            }
          }
        };

      var chart = new google.charts.Bar(document.getElementById('dual_x_div'));
      chart.draw(data, options);
    };
    </script>




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
$query10 = "SELECT AVG(leadoffOuts / 9) as averageLeadOut FROM uncagoals";
$result10 = mysqli_query($con, $query10);
while($row = mysqli_fetch_assoc($result10)){
    echo "Average time we get the lead off out: ". round($row['averageLeadOut'],2) *10 . "/9";
}

echo "<br><br><br>";


echo "Number of Times we have met each goal";
echo "<br>";
include("countsAllTime.php");


?>


<!-- PUT GOOGLE CHART HERE? -->
 <div id="dual_x_div" style="width: 900px; height: 500px;"></div>



<?php 
mysqli_close($con);
?>


</body>
</html>
