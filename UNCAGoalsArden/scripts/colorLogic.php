<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include ("../scripts/dbinfo.inc.php");
$con = mysqli_connect($hostname, $username, $password, $database);
if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die("I am doomed!!");
    
}


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
        			<td class= "noborder2"><a href= "update.php? id= <?php echo $id?> "><img src= "../img/update.png" class= "update"></a></td>
			
			</tr>	
			 
		<?php
            }
            echo "</table>";
?>