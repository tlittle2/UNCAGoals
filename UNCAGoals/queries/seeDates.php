<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include ("dbinfo.inc.php");
    $con = mysqli_connect("avl.cs.unca.edu", $username, $password, $database) or die("Unable to select database");

    
    $date1= $_GET['date1'];
    $date2= $_GET['date2'];
    
    
    //As A TEAM
        //Average Goals per Game
    echo "As a Team:";
    echo "<br>";
    //Average Goals per Game
    $query1 = 'SELECT AVG(goalsTotal) AS averageGoalCount FROM uncaGoals WHERE Date BETWEEN "$date1" AND "$date2"';
    $result1 = mysqli_query($con, $query1);
    while($row = mysqli_fetch_assoc($result1)){
        echo "Average goals met: ". round($row['averageGoalCount'],2);
    }
    
    echo "<br>";
   
 
        
        
        
        
        
        
        
       
    
    
    
    
   //OFFENSIVE
        //Average percent qualities
        
        
        
        
        //Average Freebies Taken
        
        
        
        
        //Average total bases to run ratio
   
        
        
        
        
        
  //DEFENSIVE
        //Average pitchesThrown
        
        
        
        //Average freebies given up
        
        
        
        //Average amount of time we are getting the leadoff out`
        
        
        
        
        
        
        
        
        
        
?>