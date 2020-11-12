<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include ("dbinfo.inc.php");
    $con = mysqli_connect("avl.cs.unca.edu", $username, $password, $database) or die("Unable to select database");
    
    //Get variables
    $id= $_GET['id'];
    
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
    
    $goalsTotal= $_POST['goalsTotal'];
    
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
    
    
    //I got the following code from Professor Johnson's demo
    
    //prepare update
    $query = "UPDATE uncaGoals SET date= '$date', opponent= '$opponent', runsScored= '$runsScored', qualities= $qualityPercentage, ourFreebies= $ourFreebies,
                    ourBigInning= $ourBigInning, totalBases= $totalBases, runsAllowed= '$runsAllowed', freebiesAllowed= '$freebiesAllowed', 
                    bigInningAllowed= '$bigInningAllowed', leadoffOuts= '$leadoffOuts', pitchesThrown= '$pitchesThrown', gameResult= '$gameResult', 
                    numOfQualities= '$qualities', numOfAtBats= '$atBats', goalsTotal= '$tally'
                    
                    WHERE id= '$id'";
    
    echo $query;
    echo "<br>";
    mysqli_query($con, $query);
    
    if(mysqli_errno($con) != 0){
        echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
    }else{
        echo "<script type= text/javascript> window.location= 'http://arden.cs.unca.edu/~tlittle2/UNCAGoals/scripts/BulldogGoals.php'</script>";
        //echo "SQL is...<br>";
        //echo $query;
        //echo "<br> Rows affected: ";
        //echo mysqli_affected_rows($con);
        
        
    }
    
    
    mysqli_close($con);
    
?>