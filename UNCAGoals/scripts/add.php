<?php

//set connection
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("dbinfo.inc.php");
echo $hostname;
echo "<br>";
echo $username;
echo "<br>";
echo $password;
echo "<br>";
echo $database;
echo "<br>";
echo $port;
$con = mysqli_connect($hostname, $username, $password, $database) or die("Unable to select database");




//find the fields
$date= $_POST['date'];
$opponent= $_POST['opponent'];
$runsScored= $_POST['runsScored'];
$qualities= $_POST['qualities'];
$atBats= $_POST['hAtBats'];

$qualityPercentage= $qualities / $atBats;

$ourFreebies= $_POST['ourFreebies'];
$ourBigInning=  $_POST['ourBigInning'];
$totalBases= $_POST['totalBases'];
$runsAllowed= $_POST['runsAllowed'];
$freebiesAllowed= $_POST['freebiesAllowed'];
$bigInningAllowed= $_POST['bigInningAllowed'];
$leadoffOuts= $_POST['leadoffOuts'];
$pitchesThrown= $_POST['pitchesThrown'];
$gameResult= $_POST['gameResult'];



//count our tallys
$tally= 0;

if($runsScored >= 6){
   $tally +=1;
}

if($qualityPercentage >= 0.5){
    $tally+=1;
}

if($ourFreebies>= 9){
    $tally+=1;
}

if($ourBigInning>= 1){
    $tally+=1;
}

if($totalBases>= 13){
    $tally+=1;
}

if($runsAllowed<=5){
    $tally+=1;
}


if($freebiesAllowed<=8){
    $tally+=1;
}

if($bigInningAllowed==0){
    $tally+=1;
}

if($leadoffOuts>=4){
    $tally+=1;
}

if($pitchesThrown<150){
    $tally+=1;
}



//do the insert and check to make sure it worked
$query = "INSERT INTO `tlittle2`.`uncaGoals` (`date`, `opponent`, `runsScored`, `qualities`, `ourFreebies`, `ourBigInning`, `totalBases`, `runsAllowed`, `freebiesAllowed`, `bigInningAllowed`, `leadoffOuts`, 
`pitchesThrown`, `gameResult`, `numOfQualities`, `numOfAtBats`, `goalsTotal`)VALUES('$date', '$opponent', '$runsScored', '$qualityPercentage', '$ourFreebies', '$ourBigInning', '$totalBases', '$runsAllowed',
'$freebiesAllowed', '$bigInningAllowed', '$leadoffOuts', '$pitchesThrown', '$gameResult', '$qualities', '$atBats', '$tally')";
mysqli_query($con, $query);



//Find a a way to not redirect to a different page after sql has been executed

if(mysqli_errno($con) != 0){
    //echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
    //echo "<br><br>";
    //echo $query;
}else{
    echo "<script type= text/javascript> window.location= 'localhost/~tlittle2/UNCAGoals/scripts/BulldogGoals.php'</script>";
    //echo "SQL is...<br>";
    //echo $query;
    //echo "<br> Rows affected: ";
    //echo mysqli_affected_rows($con);
    
}

mysqli_close($con);


?>