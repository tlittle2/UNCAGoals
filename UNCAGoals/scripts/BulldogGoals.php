<!DOCTYPE html>
<html>
<head>


<!-- <base href= "http://localhost/UNCAGoals/scripts/"> -->
<title>Team Statistics</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type = "text/css" href="../css/GoalStyleSheet2.css">
<script src="GoalsJS.js"></script>
</head>
<body>

<?php
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
    $con = mysqli_connect($hostname, $username, $password, $database);
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die("I am doomed!!");
    
    }
    
    
    echo "<table border= '0'>";
    echo "<td>";
    echo "<a href= 'localhost/UNCAGoals/index2.php' target= 'blank'> Add a new game here</a>";
    echo "</td>";
    echo "</table>";
       
    
?>
   
<?php 
    
    $query = "SELECT id, date, opponent, runsScored, qualities, ourFreebies, ourBigInning, totalBases, runsAllowed, freebiesAllowed, bigInningAllowed, leadoffOuts, pitchesThrown, gameResult, numOfQualities, 
numOfAtBats, goalsTotal FROM uncaGoals ORDER BY date DESC";
    $result = mysqli_query($con, $query);
    
    $num = mysqli_num_rows($result);
    mysqli_close($con);
    
    ?>
    <div class= "centertitle"><h1>Bulldog Goals??????????</h1></div><br><br>
    
    
    
   	<form class= 'datecenter'>
    <table border= '0'>
        <tr>
        <td>
        <div id= 'date'>Please input dates you want to see statistics for: </div>
        </td>
        
        <td>
        <input type= 'date' name= 'date1' min= '1' max= '10'>
        </td>
        
        <td>
         -
        </td>
        
        
        <td>
        <input type= 'date' name= 'date2' min= '1' max= '10'>
        </td>
        
        <td>
        <a href= 'http://arden.cs.unca.edu/~tlittle2/UNCAGoals/queries/seeAll.php'>See these dates</a>
        </td>
        
        <td>
        <a href= 'http://arden.cs.unca.edu/~tlittle2/UNCAGoals/queries/seeAll.php'>Click here to see all time stats</a>
        </td>
        
        
    
    
    
    
    </table>
    </form>
    <br> <br> <br>
    


<!--  <a href= "#bottom">Click here to go to the bottom</a>-->
        <table border="1"  class= "dataTable">
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
		</tr>
		
		 <?php
            while ($row = mysqli_fetch_array($result)) {

                $id = $row['id'];
                
                $originalDate = $row['date'];
                $newDate = date("m-d-Y", strtotime($originalDate));
                
                
                $opponent = $row['opponent'];
                $runsScored= $row['runsScored'];
                $qualities= $row['qualities'];
                $ourFreebies= $row['ourFreebies'];
                $ourBigInning= $row['ourBigInning'];
                $totalBases= $row['totalBases'];
                $runsAllowed= $row['runsAllowed'];
                $freebiesAllowed= $row['freebiesAllowed'];
                $bigInningAllowed= $row['bigInningAllowed'];
                $leadoffOuts= $row['leadoffOuts'];
                $pitchesThrown= $row['pitchesThrown'];
                $gameResult= $row['gameResult'];
                
                //This is a derived field
                $goalsTotal= $row['goalsTotal'];
                
                
                $qualityRounded= round($qualities, 2) *100 . '%'
         
                
            ?>
             
            
             <tr>
        			<!-- <td><?php echo "$id"; ?></td> -->
        			<td><?php echo "$newDate"; ?></td>
        			<td><?php echo "$opponent"; ?></td>
        	
        			<?php 
        			
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
            		       echo "<td class= 'green'>$goalsTotal/10</td>";
            		       
            		   }else{
            		       echo "<td class= 'red'>$goalsTotal /10</td>";
            		       
            		   }
        			?>
        		
        			<td class= "noborder"><a href= "delete.php? id= <?php echo $id;?>"><input type= "image" src= "../img/delete.png" class= "delete" alt= "Delete this row" onclick="return confirm('Are you sure you want to delete this record?')"></a></td>
        			<td class= "noborder2"><a href= "update.php? id= <?php echo $id?> "><img src= ../img/update.png class= "update"></a></td>
			
			</tr>	
			 
		<?php
            }
            echo "</table>";
          
        ?>	
 
 
 
 </body>
 </html>