<head>
<link rel="stylesheet" type = "text/css" href="../css/GoalsStyleSheet.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="GoalsJS.js"></script>

<!-- Bootstrap Stuff -->
<link rel="stylesheet"	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include ("dbinfo.inc.php");
    $con = mysqli_connect($hostname, $username, $password, $database);
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die("I am doomed!!");
        
    }
    
     
    
    $id= $_GET['id'];
    /*
    $query= $con->prepare("SELECT * FROM `uncagoals` WHERE id= ?");
    $query->bind_param("s", $id);
    $query->execute();
    
    while($row = $query->fetch($result)){
        $query->get_result($date, $opponent, $runsScored, $qualities, $atBats, $ourFreebies, $ourBigInning, $totalBases, $runsAllowed,
            $freebiesAllowed, $bigInningAllowed, $leadoffOuts, $pitchesThrown, $gameResult);
        
    }
   */
   
    
    $query= "SELECT * FROM `uncagoals`
        WHERE id= $id";
    
    //perform query
    $result= mysqli_query($con, $query);
    
    if(mysqli_errno($con)!= 0){
        echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
    }else{
        
        //echo "SQL is...<br>";
        //echo $query;
        //echo "<br> Rows affected: ";
        //echo mysqli_affected_rows($con);
        
    }
    
    
    //Need to find a way to display the qualities again
    while ($row = mysqli_fetch_array($result)) {
       
        $date = $row['date'];
        $opponent = $row['opponent'];
        $runsScored= $row['runsScored'];
        $qualities= $row['numOfQualities'];
        $atBats= $row['numOfAtBats'];
        $ourFreebies= $row['ourFreebies'];
        $ourBigInning= $row['ourBigInning'];
        $totalBases= $row['totalBases'];
        $runsAllowed= $row['runsAllowed'];
        $freebiesAllowed= $row['freebiesAllowed'];
        $bigInningAllowed= $row['bigInningAllowed'];
        $leadoffOuts= $row['leadoffOuts'];
        $pitchesThrown= $row['pitchesThrown'];
        $gameResult= $row['gameResult'];
    }  
?>

    <table class= "updateTableTitle">
    <tr>
    	<td><img src= "../img/main_logo.png" class= "updateLogo"></td>
    	<td class= "ourTitle">Bulldog Baseball</td>
    	<td><img src= "../img/main_logo.png" class= "updateLogo"></td>
    
    </tr>
    </table>
    
    
	<form class= "homeForm" onsubmit= "return validateInput();" action = "update2.php?id= <?php echo $id;?>" method= "post">
    	<table class= "form">
    		<tr>
        		<td>Date: </td>
        		<td><input type= "date" id = "date" name= "date" min= "1" max= "20" placeholder = "YYYY-MM-DD" value= <?php echo $date?> required></td>
    		</tr>
    	
    		<tr>
        		<td>Opponent: </td>
        		<td><input type= "text" id = "opponent"  name= "opponent" min= "1" max= "20"  value= <?php echo $opponent?> required></td>
    		</tr>
    		
    		
    		<tr>
				<td></td>
			</tr>
		
    		<tr>
    			<td></td>
    		</tr>
    		
    		<tr>
    			<td></td>
    		</tr>
    		
    		<tr>
    			<td></td>
    		</tr>
    		
    		<tr>
    			<td></td>
    		</tr>
    		
    		<tr>
    			<td></td>
    		</tr>
    		
    		<tr>
    			<td></td>
    		</tr>
    		
        	<tr>
    		<td>>= 6 Runs:</td>
    		<td><input type= "text" id= "hORuns" name= "runsScored" min= "1" max= "9" value= <?php echo $runsScored?> required></td>
    		
    	</tr>
    	
    	<tr>
    		<td>50% Quality at-Bats:</td>
    		<td><input type= "text" id= "hQualities" name= "qualities" min= "1" max= "9" value= <?php echo $qualities?> required> / 
    		<input type= "text" id= "hAtBats" name= "hAtBats" min= "1" max= "9" value= <?php echo $atBats?> required></td>
    		
    	</tr>
    	
    	<tr>
    		<td>>=9 Freebies:</td>
    		<td><input type= "text" id= "hOFreebies" name= "ourFreebies" min= "1" max= "9" value= <?php echo $ourFreebies?> required><br></td>
    	
    	</tr>
    	
    	<tr>
    		<td>1+ Big Inning:</td>
    		<td><input type= "text" id= "hBigInning" name= "ourBigInning" min= "1" max= "9" value= <?php echo $ourBigInning?> required><br></td>
    		
    	</tr>
    	
    	<tr>
    		<td>>=13 Total Bases:</td>
    		<td><input type= "text" id= "hTotalBases" name= "totalBases" min= "1" max= "9" value= <?php echo $totalBases?> required><br></td>
    		
    	</tr>
    	
   
    	<tr>
    		<td> <=5 Runs:</td>
    		<td><input type= "text" id= "hDRuns" name= "runsAllowed" min= "1" max= "9" value= <?php echo $runsAllowed?> required><br></td>
    		
    	</tr>
    	
    	<tr>
    		<td> <=8 Freebies:</td>
    		<td><input type= "text" id= "hDFreebies" name= "freebiesAllowed" min= "1" max= "9" value= <?php echo $freebiesAllowed?> required><br></td>
    		
    	</tr>
    	
    	<tr>
    		<td> No Big Innings:</td>
    		<td><input type= "text" id= "hNoBigInning" name= "bigInningAllowed" min= "1" max= "9" value= <?php echo $bigInningAllowed?> required><br></td>
    		
    	</tr>
    	<tr>
    		<td> 4>= Leadoff Outs:</td>
    		<td><input type= "text" id= "hLeadOuts" name= "leadoffOuts" min= "1" max= "9" value= <?php echo $leadoffOuts?> required><br></td>
    		
    	
    	</tr>
    	<tr>
    		<td> < 150 Pitches Thrown:</td>
    		<td><input type= "text" id= "hPitchesThrown" name= "pitchesThrown"  min= "1" max= "9" value= <?php echo $pitchesThrown?> required><br></td>
    		
    	</tr>
    	
    	<tr>
    		<td>----------------------------</td>
    	</tr>
    	
    	
    	</tr>
    	<tr>
    		<td> Game Result (W or L):</td>
    		<td><input type= "text" id= "hGameResult" name= "gameResult" size= "9" value= <?php echo $gameResult?> required><br></td>
    		
    	</tr>	
    </table>
	

	<br>
	<div class= "centerButton"><input type= "submit" id= "hSubmit" value= "Update" ></div>
	</form>
    		
    		
        
        
        

    