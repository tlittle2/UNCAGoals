<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("../scripts/dbinfo.inc.php");
$con = mysqli_connect($hostname, $username, $password, $database);
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("I am doomed!!");
    
}

$date1= $_POST['date1'];
$newDate1 = date("m-d-Y", strtotime($date1));
//echo "date1 is $newDate1";

//echo "<br>";

$date2= $_POST['date2'];
$newDate2 = date("m-d-Y", strtotime($date2));
//echo "date2 is $newDate2";


$count1 = $con->prepare("SELECT COUNT(runsScored) as runsScoredThres FROM uncagoals WHERE runsScored >=6 AND uncagoals.date BETWEEN ? AND ?");
$count1->bind_param("ss", $date1, $date2);
$count1-> execute();
$count1-> bind_result($runsScoredThres);
$count1-> fetch();
echo "RunsScored: " . $runsScoredThres;
$count1->close();

echo "<br>";

$count2 = $con->prepare("SELECT COUNT(qualities) AS qualitiesThres FROM uncagoals WHERE runsScored >=0.5 AND uncagoals.date BETWEEN ? AND ?");
$count2->bind_param("ss", $date1, $date2);
$count2-> execute();
$count2-> bind_result($qualitiesThres);
$count2-> fetch();
echo "Qualities: " . $qualitiesThres;
$count2->close();


echo "<br>";

$count3 = $con->prepare("SELECT COUNT(ourFreebies) AS ourFThres FROM uncagoals WHERE ourFreebies >=9 AND uncagoals.date BETWEEN ? AND ?");
$count3->bind_param("ss", $date1, $date2);
$count3-> execute();
$count3-> bind_result($ourFThres);
$count3-> fetch();
echo "OurFreebies: " . $ourFThres;
$count3->close();

echo "<br>";

$count4 = $con->prepare("SELECT COUNT(ourBigInning) AS ourBigInningThres FROM uncagoals WHERE ourBigInning>=1 AND uncagoals.date BETWEEN ? AND ?");
$count4->bind_param("ss", $date1, $date2);
$count4-> execute();
$count4-> bind_result($ourBigInningThres);
$count4-> fetch();
echo "Our Big Inning: " . $ourBigInningThres;
$count4->close();
    

echo "<br>";

$count5 = $con->prepare("SELECT COUNT(TotalBases) AS totalBasesThres FROM uncagoals WHERE TotalBases >=13 AND uncagoals.date BETWEEN ? AND ?");
$count5->bind_param("ss", $date1, $date2);
$count5-> execute();
$count5-> bind_result($totalBasesThres);
$count5-> fetch();
echo "Total Bases: " . $totalBasesThres;
$count5->close();

echo "<br>";

$count6 = $con->prepare("SELECT COUNT(runsAllowed) AS runsAllowedThres FROM uncagoals WHERE runsAllowed <= 5 AND uncagoals.date BETWEEN ? AND ?");
$count6->bind_param("ss", $date1, $date2);
$count6-> execute();
$count6-> bind_result($runsAllowedThres);
$count6-> fetch();
echo "Runs Allowed: " . $runsAllowedThres;
$count6->close();

echo "<br>";

$count7 = $con->prepare("SELECT COUNT(freebiesAllowed) AS freebiesAllowedThres FROM uncagoals WHERE freebiesAllowed <= 8 AND uncagoals.date BETWEEN ? AND ?");
$count7->bind_param("ss", $date1, $date2);
$count7-> execute();
$count7-> bind_result($freebiesAllowedThres);
$count7-> fetch();
echo "Freebies Allowed: " . $freebiesAllowedThres;
$count7->close();


echo "<br>";

$count8 = $con->prepare("SELECT COUNT(bigInningAllowed) AS bigInningAllowedThres FROM uncagoals WHERE bigInningAllowed = 0 AND uncagoals.date BETWEEN ? AND ?");
$count8->bind_param("ss", $date1, $date2);
$count8-> execute();
$count8-> bind_result($bigInningAllowedThres);
$count8-> fetch();
echo "Big Inning Allowed: " . $bigInningAllowedThres;
$count8->close();


echo "<br>";

$count9 = $con->prepare("SELECT COUNT(leadoffOuts) AS leadoffOutThres FROM uncagoals WHERE leadoffOuts >=4 AND uncagoals.date BETWEEN ? AND ?");
$count9->bind_param("ss", $date1, $date2);
$count9-> execute();
$count9-> bind_result($leadoffOutThres);
$count9-> fetch();
echo "Leadoff Outs: " . $leadoffOutThres;
$count9->close();
   

echo "<br>";

$count10 = $con->prepare("SELECT COUNT(pitchesThrown) AS pitchesThrownThres FROM uncagoals WHERE pitchesThrown < 150 AND uncagoals.date BETWEEN ? AND ?");
$count10->bind_param("ss", $date1, $date2);
$count10-> execute();
$count10-> bind_result($pitchesThrownThres);
$count10-> fetch();
echo "Pitches Thrown: " . $pitchesThrownThres;
$count10->close();
    
    

?>