<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("../scripts/dbinfo.inc.php");
$con = mysqli_connect($hostname, $username, $password, $database);
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("I am doomed!!");
    
}


$count1 = mysqli_query($con, "SELECT COUNT(runsScored) as runsScoredThres FROM uncagoals WHERE runsScored >=6");
while($row = mysqli_fetch_assoc($count1)) {
    #echo "RunsScored: " . $row["runsScoredThres"];
    $valuesArray['RunsScored'] = $row["runsScoredThres"];
   
}


echo "<br>";

$count2 = mysqli_query($con, "SELECT COUNT(qualities) AS qualitiesThres FROM uncagoals WHERE qualities >=0.5;");
while($row = mysqli_fetch_assoc($count2)) {
    #echo "Qualities: " . $row["qualitiesThres"];
    $valuesArray['Qualities'] = $row["qualitiesThres"];
    
}

#echo $valuesArray['Qualities'];

echo "<br>";

$count3 = mysqli_query($con, "SELECT COUNT(ourFreebies) AS ourFThres FROM uncagoals WHERE ourFreebies >=9;");
while($row = mysqli_fetch_assoc($count3)) {
    #echo "OurFreebies: " . $row["ourFThres"];
    $valuesArray['OurFreebies'] = $row["ourFThres"];
    
}

echo "<br>";

$count4 = mysqli_query($con, "SELECT COUNT(ourBigInning) AS ourBigInningThres FROM uncagoals WHERE ourBigInning>=1;");
while($row = mysqli_fetch_assoc($count4)) {
    #echo "Our Big Inning: " . $row["ourBigInningThres"];
    $valuesArray['OurBigInning'] = $row["ourBigInningThres"];
    
    
    
}

echo "<br>";

$count5 = mysqli_query($con, "SELECT COUNT(TotalBases) AS totalBasesThres FROM uncagoals WHERE TotalBases >=13;");
while($row = mysqli_fetch_assoc($count5)) {
    #echo "Total Bases: " . $row["totalBasesThres"];
    $valuesArray['TotalBases'] = $row["totalBasesThres"];
   
    
    
   
}

echo "<br><br>";

$count6 = mysqli_query($con, "SELECT COUNT(runsAllowed) AS runsAllowedThres FROM uncagoals WHERE runsAllowed <= 5;");
while($row = mysqli_fetch_assoc($count6)) {
    #echo "Runs Allowed: " . $row["runsAllowedThres"];
    $valuesArray['RunsAllowed'] = $row["runsAllowedThres"];
    
    
    
}

echo "<br>";

$count7 = mysqli_query($con, "SELECT COUNT(freebiesAllowed) AS freebiesAllowedThres FROM uncagoals WHERE freebiesAllowed <= 8;");
while($row = mysqli_fetch_assoc($count7)) {
    #echo "Freebies Allowed: " . $row["freebiesAllowedThres"];
    $valuesArray['FreebiesAllowed'] = $row["freebiesAllowedThres"];
   
    
    
}

echo "<br>";

$count8 = mysqli_query($con, "SELECT COUNT(bigInningAllowed) AS bigInningAllowedThres FROM uncagoals WHERE bigInningAllowed = 0;");
while($row = mysqli_fetch_assoc($count8)) {
    #echo "Big Inning Allowed: " . $row["bigInningAllowedThres"];
    $valuesArray['BigInningAllowed'] = $row["bigInningAllowedThres"];
  
    
    
}

echo "<br>";

$count9 = mysqli_query($con, "SELECT COUNT(leadoffOuts) AS leadoffOutThres FROM uncagoals WHERE leadoffOuts >=4;");
while($row = mysqli_fetch_assoc($count9)) {
    #echo "Leadoff Outs: " . $row["leadoffOutThres"];
    $valuesArray['LeadOffOuts'] = $row["leadoffOutThres"];
  
    
    
}

echo "<br>";

$count10 = mysqli_query($con, "SELECT COUNT(pitchesThrown) AS pitchesThrownThres FROM uncagoals WHERE pitchesThrown < 150;");
while($row = mysqli_fetch_assoc($count10)) {
    #echo "Pitches Thrown: " . $row["pitchesThrownThres"];
    $valuesArray['PitchesThrown'] = $row["pitchesThrownThres"];
    
    
}

#echo json_encode($valuesArray);



?>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      var xhr = new XMLHttpRequest();

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Goal Name', 'Count of Goal'],
          ['>= 6 Runs', <?php echo $valuesArray['RunsScored']?>],
          ['50% Qualities', <?php echo $valuesArray['Qualities']?>],
          ['>= 9 Freebies', <?php echo $valuesArray['OurFreebies']?>],
          ['1+ Big Inning', <?php echo $valuesArray['OurBigInning']?>],
          ['>= 13 Total Bases', <?php echo $valuesArray['TotalBases']?>],
          ['<= 5 Runs', <?php echo $valuesArray['RunsAllowed']?>],
          ['<= 8 Freebies', <?php echo $valuesArray['FreebiesAllowed']?>],
          ['0 Big Innings', <?php echo $valuesArray['BigInningAllowed']?>],
          ['>= 4 Leadoff Outs', <?php echo $valuesArray['LeadOffOuts']?>],
          ['< 150 Pitches Thrown', <?php echo $valuesArray['PitchesThrown']?>]
        ]);

        var options = {
          width: 800,
          chart: {
            title: 'Times Goals were Reached',
            subtitle: ''
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          series: {
            0: { axis: '' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: '' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            x: {
              distance: {label: 'times'}, // Bottom x-axis.
              brightness: {side: 'top', label: ''} // Top x-axis.
            }
          }
        };

      var chart = new google.charts.Bar(document.getElementById('time_div'));
      chart.draw(data, options);
    };
    </script>


