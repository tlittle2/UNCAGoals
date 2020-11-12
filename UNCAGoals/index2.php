<!DOCTYPE html>
<html>
<head>



<title>Bulldog Goals</title>

<!-- <base href= "http://localhost/UNCAGoals/scripts/"> -->

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type = "text/css" href="css/GoalsStyleSheet.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="scripts/GoalsJS.js"></script>

<!-- Bootstrap Stuff -->
<link rel="stylesheet"	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



</head>
<body>


<table>
	<tr>
		<td><a href= "http://localhost/UNCAGoals/scripts/BulldogGoals.php" target= "_blank"  class= "statistics"> 
		Change of Title </a></td>
	
	</tr>




</table>
<!-- title -->
<table class= "tableTitle">
<tr>
	<td><div class= "col-xs-12"><img src= "img/main_logo.png" class= "logo"></div></td>
	<td class= "ourTitle">Bulldog Baseball</td>
	<td><div class= "col-xs-12"><img src= "img/main_logo.png" class= "logo"></div></td>

</tr>
</table>


<br><br>

<table class= "form">
	


</table>


<!-- this is where the form actually starts-->
		
	
<form class= "homeForm" onsubmit= "return validateInput();" action = "scripts/add.php" method= "post"> 
	
	
	   <table class= "form">
	
		<tr>
    		<td>
    		<label for= "date"> 
    		Date: 
    		</label> 		
    		</td>
    		
    		<td>
    		<input type= "date" id = "date" name= "date" min= "1" max= "20" required>
    			<div class= "invalid-feedback">Please input a date</div>
    		</td>
		</tr>
   
   
		<tr>
    		<td>Opponent: </td>
    		<td><input type= "text" id = "opponent"  name= "opponent" min= "1" max= "20" required>
    			<div class= "invalid-feedback">Please input an opponent</div>
    		</td>
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
    		<td><input type= "text" id= "hORuns" name= "runsScored" min= "1" max= "9" required></td>
    		<td><div id = "imgdiv" class= "imgdiv"></div></td>
    	</tr>
    	
    	<tr>
    		<td>50% Quality at-Bats:</td>
    		<td><input type= "text" id= "hQualities" name= "qualities" min= "1" max= "9" required> / <input type= "text" id= "hAtBats" name= "hAtBats" min= "1" max= "9" required></td>
    		<td><div id = "imgdiv" class= "imgdiv"></div></td>
    	</tr>
    	
    	<tr>
    		<td>>=9 Freebies:</td>
    		<td><input type= "text" id= "hOFreebies" name= "ourFreebies" min= "1" max= "9" required><br></td>
    		<td><div id = "imgdiv" class= "imgdiv"></div></td>
    	</tr>
    	
    	<tr>
    		<td>1+ Big Inning:</td>
    		<td><input type= "text" id= "hBigInning" name= "ourBigInning" min= "1" max= "9" required><br></td>
    		<td><div id = "imgdiv" class= "imgdiv"></div></td>
    	</tr>
    	
    	<tr>
    		<td>>=13 Total Bases:</td>
    		<td><input type= "text" id= "hTotalBases" name= "totalBases" min= "1" max= "9" required><br></td>
    		<td><div id = "imgdiv" class= "imgdiv"></div></td>
    	</tr>
    	
   
    	<tr>
    		<td> <=5 Runs:</td>
    		<td><input type= "text" id= "hDRuns" name= "runsAllowed" min= "1" max= "9" required><br></td>
    		<td><div id = "imgdiv" class= "imgdiv"></div></td>
    	</tr>
    	
    	<tr>
    		<td> <=8 Freebies:</td>
    		<td><input type= "text" id= "hDFreebies" name= "freebiesAllowed" min= "1" max= "9" required><br></td>
    		<td><div id = "imgdiv" class= "imgdiv"></div></td>
    	</tr>
    	
    	<tr>
    		<td> No Big Innings:</td>
    		<td><input type= "text" id= "hNoBigInning" name= "bigInningAllowed" min= "1" max= "9" required><br></td>
    		<td><div id = "imgdiv" class= "imgdiv"></div></td>
    	</tr>
    	<tr>
    		<td> 4>= Leadoff Outs:</td>
    		<td><input type= "text" id= "hLeadOuts" name= "leadoffOuts" min= "1" max= "9" required><br></td>
    		<td><div id = "imgdiv" class= "imgdiv"></div></td>
    	
    	</tr>
    	<tr>
    		<td> < 150 Pitches Thrown:</td>
    		<td><input type= "text" id= "hPitchesThrown" name= "pitchesThrown"  min= "1" max= "9" required><br></td>
    		<td><div id = "imgdiv" class= "imgdiv"></div></td>
    	</tr>
    	
    	<tr>
    		<td>----------------------------</td>
    	</tr>
    	
    	
    	</tr>
    	<tr>
    		<td> Game Result (W or L):</td>
    		<td><input type= "text" id= "hGameResult" name= "gameResult" size= "9" required><br></td>
    		<td><div id = "imgdiv" class= "imgdiv"></div></td>
    	</tr>	
    </table>
	

	<br>
	
	-->
	<div class= "centerButton"><input type= "submit" id= "hSubmit" value= "Submit"></div>
	</form>

<br>
 

<div id = "ourResult" class= "ourResult"></div>


</body>
</html>


