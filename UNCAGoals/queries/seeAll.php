<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("dbinfo.inc.php");
$con = mysqli_connect("avl.cs.unca.edu", $username, $password, $database) or die("Unable to select database");


//As A TEAM

    echo "As a Team:";
    echo "<br>";
    //Average Goals per Game
    $query1 = 'SELECT AVG(goalsTotal) AS averageGoalCount FROM uncaGoals';
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
    $query4 = 'SELECT AVG(qualities) as averageQualities FROM uncaGoals;';
    $result4 = mysqli_query($con, $query4);
    while($row = mysqli_fetch_assoc($result4)){
        echo "Average qualities met: ". round($row['averageQualities'], 2) * 100 ."%";
    }
    
    echo "<br>";
    
    
    //Average Freebies Taken
    $query5 = 'SELECT AVG(ourFreebies) as averageFreebies FROM uncaGoals;';
    $result5 = mysqli_query($con, $query5);
    while($row = mysqli_fetch_assoc($result5)){
        echo "Average freebies met: ". round($row['averageFreebies'], 2);
    }
    
    echo "<br>";
    
    
    
    //Average total bases to run ratio
    $query6 = 'SELECT AVG(totalBases / runsScored) as runRatio FROM uncaGoals;';
    $result6 = mysqli_query($con, $query6);
    while($row = mysqli_fetch_assoc($result6)){
        echo "Average totalBase to run ratio: ". round($row['runRatio'], 2);
    }
    
    echo "<br>";


    
    echo "<br><br><br>";
//DEFENSIVE

    echo "On Defense: ";
    echo "<br>";
    
    //Average pitchesThrown
    $query7 = 'SELECT AVG(pitchesThrown) as averagePitches FROM uncaGoals;';
    $result7 = mysqli_query($con, $query7);
    while($row = mysqli_fetch_assoc($result7)){
        echo "Average pitches thrown per game: ". round($row['averagePitches'], 2);
    }
    
    echo "<br>";
    
    
    //Average freebies given up
    $query8 = 'SELECT AVG(freebiesALlowed) as freebiesAllowed FROM uncaGoals;';
    $result8 = mysqli_query($con, $query8);
    while($row = mysqli_fetch_assoc($result8)){
        echo "Average freebies given up: ". round($row['freebiesAllowed'],2);
    }
    
    echo "<br>";
    
    
    //Average amount of time we are getting the leadoff out
    $query9 = 'SELECT AVG(leadoffOuts / 9) as averageLeadOut FROM uncaGoals;';
    $result9 = mysqli_query($con, $query9);
    while($row = mysqli_fetch_assoc($result9)){
        echo "Average time we get the lead off out : ". round($row['averageLeadOut'],2) *10 . "/9";
    }
    
    echo "<br>";



mysqli_close($con);
?>

