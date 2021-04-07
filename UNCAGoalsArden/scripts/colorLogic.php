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
        			<td class= "border"><?php echo "$newDate"; ?></td>
        			<td class= "border"><?php echo "$opponent"; ?></td>
        	
        			<?php 
        			
            			if($runsScored >= 6){
            			    echo "<td class= 'green border'>$runsScored </td>"; 
            		    }else{
            			    echo "<td class= 'red border'>$runsScored </td>";
            			     }
            			     
            			
            			     
            		   if($qualities >= 0.5){
            		        echo "<td class= 'green border'>$qualityRounded</td>";
            		   }else{
            			    echo "<td class= 'red border'>$qualityRounded</td>";
            		   }
            		   
            		   
            		   
            		   if($ourFreebies >= 9){
            		       echo "<td class= 'green border'>$ourFreebies</td>";
            		       
            		   }else{
            		       echo "<td class= 'red border'>$ourFreebies</td>";
            		       
            		       
            		   }
            		   
            		   
            		   
            		   
            		   if($ourBigInning >= 1){
            		       echo "<td class= 'green border'>$ourBigInning</td>";    
            		       
            		   }else{
            		       echo "<td class= 'red border'>$ourBigInning</td>";
            		       
            		   }
            		   
            		   
            		   
            		   
            		   if($totalBases >=13){
            		       echo "<td class= 'green border'>$totalBases</td>";
            		       
            		   }else{
            		       echo "<td class= 'red border'>$totalBases</td>";
            		       
            		   }
            		   
            		   
            		   
            		   
            		   if($runsAllowed <= 5){
            		       echo "<td class= 'green border'>$runsAllowed</td>";
            		       
            		   }else{
            		       echo "<td class= 'red border'>$runsAllowed</td>";
            		       
            		   }
            		   
            		   
            		   if($freebiesAllowed <= 8){
            		       echo "<td class= 'green border'>$freebiesAllowed</td>";
            		       
            		   }else{
            		       echo "<td class= 'red border'>$freebiesAllowed</td>";
            		       
            		   }
            		   
            		   
            		   
            		   if($bigInningAllowed == 0 ){
            		       echo "<td class= 'green border'>$bigInningAllowed</td>";
            		       
            		   }else{
            		       echo "<td class= 'red border'>$bigInningAllowed</td>";
            		       
            		   }
            		               		   
            		   
            		   if($leadoffOuts >= 4){
            		       echo "<td class= 'green border'>$leadoffOuts</td>";
            		       
            		   }else{
            		       echo "<td class= 'red border'>$leadoffOuts</td>";
            		       
            		   }
            		   
            		   
            		   if($pitchesThrown < 150){
            		       echo "<td class= 'green border'>$pitchesThrown</td>";
            		       
            		   }else{
            		       echo "<td class= 'red border'>$pitchesThrown</td>";
            		       
            		   }
            		   
            		   
            		   
            		   if($gameResult == 'W'){
            		       echo "<td class= 'green border' style= 'font-weight: bold;'>$gameResult</td>";
            		       
            		   }else{
            		       echo "<td class= 'red border' style= 'font-weight: bold;'>$gameResult</td>";
            		       
            		   }
            		       
            		   
            		   if($goalsTotal >= 7){
            		       echo "<td class= 'green border'>$goalsTotal/10 &nbsp;</td>";
            		       
            		   }else{
            		       echo "<td class= 'red border'>$goalsTotal/10 &nbsp;</td>";
            		       
            		   }
        			?>
        		
        			<td class= "noborder" id = "delete"><a href= "delete.php? id= <?php echo $id;?>"><input type= "image" src= "../img/delete.png" class= "delete" alt= "Delete this row" onclick="return confirm('Are you sure you want to delete this record?')"></a></td>
        			<td class= "noborder2" id= "update"><a href= "update.php? id= <?php echo $id?> "><img src= "../img/update.png" class= "update"></a></td>
			
			</tr>
			
				
			 
		<?php
            }
            /*
            echo "<tr></tr>";
            echo "<tr>";
            echo "<td>Averages:</td>";
            echo "<td></td>";
            
            echo "<td>";
            $query1 = "SELECT AVG(runsScored) FROM uncagoals";
            $result1 = mysqli_query($con, $query1);
            $value1 = mysqli_fetch_array($result1);
            print_r($value1[0]);
		    echo "</td>";
		    
		    echo "<td>";
		    $query2 = "SELECT AVG(qualities) FROM uncagoals";
		    $result2 = mysqli_query($con, $query2);
		    $value2 = mysqli_fetch_array($result2);
		    print_r($value2[0]);
		    echo "</td>";
		    
		    echo "<td>";
		    $query3 = "SELECT AVG(ourFreebies) FROM uncagoals";
		    $result3 = mysqli_query($con, $query3);
		    $value3 = mysqli_fetch_array($result3);
		    print_r($value3[0]);
		    echo "</td>";
		    
		    
		    echo "<td>";
		    $query4 = "SELECT AVG(ourBigInning) FROM uncagoals";
		    $result4 = mysqli_query($con, $query4);
		    $value4 = mysqli_fetch_array($result4);
		    print_r($value4[0]);
		    echo "</td>";
		    
		    echo "<td>";
		    $query5 = "SELECT AVG(totalBases) FROM uncagoals";
		    $result5 = mysqli_query($con, $query5);
		    $value5 = mysqli_fetch_array($result5);
		    print_r($value5[0]);
		    echo "</td>";
		    
		    echo "<td>";
		    $query6 = "SELECT AVG(runsAllowed) FROM uncagoals";
		    $result6 = mysqli_query($con, $query6);
		    $value6 = mysqli_fetch_array($result6);
		    print_r($value6[0]);
		    echo "</td>";
		    
		    echo "<td>";
		    $query7 = "SELECT AVG(freebiesAllowed) FROM uncagoals";
		    $result7 = mysqli_query($con, $query7);
		    $value7 = mysqli_fetch_array($result7);
		    print_r($value7[0]);
		    echo "</td>";
		    
		    
		    echo "<td>";
		    $query8 = "SELECT AVG(bigInningAllowed) FROM uncagoals";
		    $result8 = mysqli_query($con, $query8);
		    $value8 = mysqli_fetch_array($result8);
		    print_r($value8[0]);
		    echo "</td>";
		    
		    echo "<td>";
		    $query9 = "SELECT AVG(leadoffOuts) FROM uncagoals";
		    $result9 = mysqli_query($con, $query9);
		    $value9 = mysqli_fetch_array($result9);
		    print_r($value9[0]);
		    echo "</td>";
		    
		    
		    echo "<td>";
		    $query10 = "SELECT AVG(pitchesThrown) FROM uncagoals";
		    $result10 = mysqli_query($con, $query10);
		    $value10 = mysqli_fetch_array($result10);
		    print_r($value10[0]);
		    echo "</td>";
		    
		    echo "<td></td>";
		    
		    echo "<td>";
		    $query11 = "SELECT AVG(goalsTotal) FROM uncagoals";
		    $result11 = mysqli_query($con, $query11);
		    $value11 = mysqli_fetch_array($result11);
		    print_r($value11[0]);
		    echo "</td>";
		    */
		    
            echo "</table>";
            
        ?>