<!DOCTYPE html>
<html lang="en">
<head>



<title>TimeFrame Statistics</title>

<!-- <base href= "http://localhost/UNCAGoals/scripts/"> -->

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type = "text/css" href="css/GoalsStyleSheet.css">
<link rel="stylesheet" type = "text/css" href="css/GoalsStyleSheet2.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>




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


    $date1= $_POST['date1'];
    $newDate1 = date("m-d-Y", strtotime($date1));
    //echo "date1 is $newDate1";
    
    //echo "<br>";
   
    $date2= $_POST['date2'];
    $newDate2 = date("m-d-Y", strtotime($date2));
    //echo "date2 is $newDate2";
    
    echo "From TimeFrame $newDate1 to $newDate2";
    echo "<br><br>";
   
/*
    echo"<table border='1'  class= 'dataTable' id= 'dataTable'>
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
    </tr>";
   
    //records from timeframe
    $records = $con->prepare("SELECT id, date, opponent, runsScored, qualities, ourFreebies, ourBigInning, totalBases, runsAllowed, freebiesAllowed, 
bigInningAllowed, leadoffOuts, pitchesThrown, gameResult, numOfQualities, numOfAtBats, goalsTotal FROM uncagoals WHERE date BETWEEN ? AND ? ORDER BY date DESC");
    $records->bind_param("ss", $date1, $date2);
    $records-> execute();
    $records -> bind_result($id, $date, $opponent, $runsScored, $qualities, $ourFreebies, $ourBigInning, $totalBases, $runsAllowed, $freebiesAllowed, 
        $bigInningAllowed, $leadoffOuts, $pitchesThrown, $gameResult, $numOfQualities, $numOfAtBats, $goalsTotal);
    
    
    while($records->fetch()){
        $qualityRounded= round($qualities, 2) *100 . '%';
        $newDate = date("m-d-Y", strtotime($date));

        echo "<tr>";
            echo "<td> $newDate </td>";
            echo "<td> $opponent </td>";
            if($runsScored >= 6){
                echo "<td class= 'green'>$runsScored </td>";
            }else{
                echo "<td class= 'red'>$runsScored </td>";
            }
            
            
            
            if($qualities >= 0.5){
                echo "<td class= 'green'>$qualityRounded</td>";
            }else{
                echo "<td class= 'red'>$qualityRounded</td>";
            }
            
            
            
            if($ourFreebies >= 9){
                echo "<td class= 'green'>$ourFreebies</td>";
                
            }else{
                echo "<td class= 'red'>$ourFreebies</td>";
                
                
            }
            
            
            if($ourBigInning >= 1){
                echo "<td class= 'green'>$ourBigInning</td>";
                
            }else{
                echo "<td class= 'red'>$ourBigInning</td>";
                
            }
            

            
            if($totalBases >=13){
                echo "<td class= 'green'>$totalBases</td>";
                
            }else{
                echo "<td class= 'red'>$totalBases</td>";
                
            }
            

            
            if($runsAllowed <= 5){
                echo "<td class= 'green'>$runsAllowed</td>";
                
            }else{
                echo "<td class= 'red'>$runsAllowed</td>";
                
            }
            
            
            if($freebiesAllowed <= 8){
                echo "<td class= 'green'>$freebiesAllowed</td>";
                
            }else{
                echo "<td class= 'red'>$freebiesAllowed</td>";
                
            }
            
            
            
            if($bigInningAllowed == 0 ){
                echo "<td class= 'green'>$bigInningAllowed</td>";
                
            }else{
                echo "<td class= 'red'>$bigInningAllowed</td>";
                
            }
            
            
            if($leadoffOuts >= 4){
                echo "<td class= 'green'>$leadoffOuts</td>";
                
            }else{
                echo "<td class= 'red'>$leadoffOuts</td>";
                
            }
            
            
            if($pitchesThrown < 150){
                echo "<td class= 'green'>$pitchesThrown</td>";
                
            }else{
                echo "<td class= 'red'>$pitchesThrown</td>";
                
            }
            
            
            
            if($gameResult == 'W'){
                echo "<td class= 'green' style= 'font-weight: bold;'>$gameResult</td>";
                
            }else{
                echo "<td class= 'red' style= 'font-weight: bold;'>$gameResult</td>";
                
            }
            
            
            if($goalsTotal >= 7){
                echo "<td class= 'green'>$goalsTotal/10 &nbsp;</td>";
                
            }else{
                echo "<td class= 'red'>$goalsTotal/10 &nbsp;</td>";
                
            }
        echo "</tr>";
            
        
    }
    
    $records -> close();
*/
    
        echo "<br>";
    //As A TEAM
        //Average Goals per Game
    echo "As a Team:";
    echo "<br>";
    
    
    
    $query1 = $con->prepare("SELECT AVG(goalsTotal) AS averageGoalCount from uncagoals WHERE date BETWEEN ? AND ?");
    $query1->bind_param("ss", $date1, $date2);
    $query1->execute();
    $query1->bind_result($averageGoalCount);
    $query1->fetch();
    echo "Average goals met: " . round($averageGoalCount,2);
    $query1->close();
    
    /*Average Goals per Game
    $query1 = "SELECT AVG(goalsTotal) AS averageGoalCount from uncagoals WHERE date BETWEEN '$date1' AND '$date2'";
    $result1 = mysqli_query($con, $query1);
    while($row = mysqli_fetch_assoc($result1)){
        echo "Average goals met: ". round($row['averageGoalCount'],2);
    }
    */
    echo "<br>";
    
    $query = $con->prepare("SELECT SUM(runsScored) - SUM(runsAllowed) as RunDifferential FROM uncagoals WHERE date BETWEEN ? AND ?");
    $query->bind_param("ss", $date1, $date2);
    $query->execute();
    $query->bind_result($RunDifferential);
    $query->fetch();
    echo "Run Differential: " . ($RunDifferential);
    $query->close();
    
    
    echo "<br>";
   
 
    //What 5 goals are most prevalent when we win/lose?
    //What goals are we missing the most?   
    
    
    echo "<br><br><br>";
    
    //OFFENSIVE
    
    echo "On Offense: ";
    
    echo "<br>";
    
    //Average percent qualities
    $query2 = $con->prepare("SELECT AVG(qualities) as averageQualities FROM uncagoals WHERE date BETWEEN ? AND ?");
    $query2-> bind_param("ss", $date1, $date2);
    $query2->execute();
    $query2->bind_result($averageQualities);
    $query2->fetch();
    echo "Average qualities met: " . round($averageQualities, 2) * 100 ."%";
    $query2->close();
    
    echo "<br>";
    
    
    //Average Freebies Taken
    $query3 = $con->prepare("SELECT AVG(ourFreebies) as averageFreebies FROM uncagoals WHERE date BETWEEN ? AND ?");
    $query3->bind_param("ss", $date1, $date2);
    $query3->execute();
    $query3->bind_result($averageFreebies);
    $query3->fetch();
    echo "Average freebies met: ". round($averageFreebies, 2);
    $query3->close();
    
    echo "<br>";
    
    
    //Average total bases to run ratio
    $query4 = $con->prepare("SELECT AVG(totalBases / runsScored) as runRatio FROM uncagoals WHERE date BETWEEN ? AND ?");
    $query4->bind_param("ss", $date1, $date2);
    $query4->execute();
    $query4->bind_result($runRatio);
    $query4->fetch();
        echo "Average totalBase to run ratio: " . round($runRatio, 2);
    $query4->close();
    echo "<br>";
    
    
    
    echo "<br><br><br>";
    //DEFENSIVE
    
    echo "On Defense: ";
    echo "<br>";
    
    //Average pitchesThrown
    $query5 = $con->prepare("SELECT AVG(pitchesThrown) as averagePitches FROM uncagoals WHERE date BETWEEN ? AND ?");
    $query5->bind_param("ss", $date1, $date2);
    $query5-> execute();
    $query5-> bind_result($averagePitches);
    $query5-> fetch();
    echo "Average pitches thrown per game: ". round($averagePitches, 2);
    $query5->close();
    
    echo "<br>";
    
    
    //Average freebies given up
    $query9 = $con->prepare("SELECT AVG(freebiesALlowed) as freebiesAllowed FROM uncagoals WHERE date BETWEEN ? AND ?");
    $query9->bind_param("ss", $date1, $date2);
    $query9-> execute();
    $query9-> bind_result($freebiesAllowed);
    $query9-> fetch();
        echo "Average freebies given up: ". round($freebiesAllowed,2);
    $query9->close();
    
    
    echo "<br>";
    
    
    //Average amount of time we are getting the leadoff out
    $query10 = $con->prepare("SELECT AVG(leadoffOuts) as averageLeadOut FROM uncagoals WHERE date BETWEEN ? AND ?");
    $query10->bind_param("ss", $date1, $date2);
    $query10-> execute();
    $query10-> bind_result($averageLeadOut);
    $query10-> fetch();
        echo "Average time we get the lead off out: ". round($averageLeadOut,2) . "/9";
    $query10->close();
    
    echo "<br>";
    
//Include is here
    include("countsByDate.php");

    ?>
    
    <div id="dates_div" style="width: 900px; height: 400px;"></div>
    
    
    
    <?php
    mysqli_close($con);
    ?>
    
</body>
</html>