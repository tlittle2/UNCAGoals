<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("../scripts/dbinfo.inc.php");
$con = mysqli_connect($hostname, $username, $password, $database);
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("I am doomed!!");
    
}


$valuesArray= array('RunsScored' => ' ', 'Qualities' => ' ', 'OurFreebies' => ' ',
    'OurBigInning' => ' ', 'TotalBases' => ' ', 'RunsAllowed' => ' ',
    'FreebiesAllowed' => ' ', 'BigInningAllowed' => ' ', 'LeadOffOuts' => ' ',
    'PitchesThrown' => ' ');



$count1 = mysqli_query($con, "SELECT COUNT(runsScored) as runsScoredThres FROM uncagoals WHERE runsScored >=6");
while($row = mysqli_fetch_assoc($count1)) {
    echo "RunsScored: " . $row["runsScoredThres"];
    $valuesArray['RunsScored'] = $row["runsScoredThres"];
   
}


echo "<br>";

$count2 = mysqli_query($con, "SELECT COUNT(qualities) AS qualitiesThres FROM uncagoals WHERE runsScored >=0.5;");
while($row = mysqli_fetch_assoc($count2)) {
    echo "Qualities: " . $row["qualitiesThres"];
    $valuesArray['Qualities'] = $row["qualitiesThres"];
    
}

echo "<br>";

$count3 = mysqli_query($con, "SELECT COUNT(ourFreebies) AS ourFThres FROM uncagoals WHERE ourFreebies >=9;");
while($row = mysqli_fetch_assoc($count3)) {
    echo "OurFreebies: " . $row["ourFThres"];
    $valuesArray['OurFreebies'] = $row["ourFThres"];
    
}

echo "<br>";

$count4 = mysqli_query($con, "SELECT COUNT(ourBigInning) AS ourBigInningThres FROM uncagoals WHERE ourBigInning>=1;");
while($row = mysqli_fetch_assoc($count4)) {
    echo "Our Big Inning: " . $row["ourBigInningThres"];
    $valuesArray['OurBigInning'] = $row["ourBigInningThres"];
    
    
    
}

echo "<br>";

$count5 = mysqli_query($con, "SELECT COUNT(TotalBases) AS totalBasesThres FROM uncagoals WHERE TotalBases >=13;");
while($row = mysqli_fetch_assoc($count5)) {
    echo "Total Bases: " . $row["totalBasesThres"];
    $valuesArray['TotalBases'] = $row["totalBasesThres"];
   
    
    
   
}

echo "<br><br>";

$count6 = mysqli_query($con, "SELECT COUNT(runsAllowed) AS runsAllowedThres FROM uncagoals WHERE runsAllowed <= 5;");
while($row = mysqli_fetch_assoc($count6)) {
    echo "Runs Allowed: " . $row["runsAllowedThres"];
    $valuesArray['RunsAllowed'] = $row["runsAllowedThres"];
    
    
    
}

echo "<br>";

$count7 = mysqli_query($con, "SELECT COUNT(freebiesAllowed) AS freebiesAllowedThres FROM uncagoals WHERE freebiesAllowed <= 8;");
while($row = mysqli_fetch_assoc($count7)) {
    echo "Freebies Allowed: " . $row["freebiesAllowedThres"];
    $valuesArray['FreebiesAllowed'] = $row["freebiesAllowedThres"];
   
    
    
}

echo "<br>";

$count8 = mysqli_query($con, "SELECT COUNT(bigInningAllowed) AS bigInningAllowedThres FROM uncagoals WHERE bigInningAllowed = 0;");
while($row = mysqli_fetch_assoc($count8)) {
    echo "Big Inning Allowed: " . $row["bigInningAllowedThres"];
    $valuesArray['BigInningAllowed'] = $row["bigInningAllowedThres"];
  
    
    
}

echo "<br>";

$count9 = mysqli_query($con, "SELECT COUNT(leadoffOuts) AS leadoffOutThres FROM uncagoals WHERE leadoffOuts >=4;");
while($row = mysqli_fetch_assoc($count9)) {
    echo "Leadoff Outs: " . $row["leadoffOutThres"];
    $valuesArray['LeadOffOuts'] = $row["leadoffOutThres"];
  
    
    
}

echo "<br>";

$count10 = mysqli_query($con, "SELECT COUNT(pitchesThrown) AS pitchesThrownThres FROM uncagoals WHERE pitchesThrown < 150;");
while($row = mysqli_fetch_assoc($count10)) {
    echo "Pitches Thrown: " . $row["pitchesThrownThres"];
    $valuesArray['PitchesThrown'] = $row["pitchesThrownThres"];
    
    
}

echo "<br>";



echo json_encode($valuesArray);
echo "<br>";
echo "The type of values array is " . gettype($valuesArray)

?>


