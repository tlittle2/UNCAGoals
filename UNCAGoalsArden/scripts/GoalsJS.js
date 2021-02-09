console.log("I'm in");
var tally= 0;

//CHECK TO MAKE SURE THAT BAD FORMS ARE NOT SUBMITTED IN SQL 



function validateInput(){
	var noErrorFound= true;
	
	var hORuns= $("#hORuns").val();
	var freebies= $("#hOFreebies").val();
	var bigInning= $("#hBigInning").val();
	var totalBases= $("#hTotalBases").val();
	var dRuns= $("#hDRuns").val();
	var dFreebies= $("#hDFreebies").val();
	var noBigInning= $("#hNoBigInning").val();
	var leadOuts= $("#hLeadOuts").val();
	var pitchesThrown= $("#hPitchesThrown").val();
	var qualities= $("#hQualities").val();
	var atBats= $("#hAtBats").val();
	

	
	console.log("noError Found is originally: " + noErrorFound);
	
	
	if(hORuns.length === 0){
		alert("You did not input runs");
		noErrorFound= false;
		
	}
	if(!jQuery.isNumeric(hORuns)){
		alert("You don't have a good value for runs");
		noErrorFound= false;
	}
	
	
	
	if(freebies.length === 0){
		alert("You did not input your team's freebies");
		noErrorFound= false;
		
	}
	if(!jQuery.isNumeric(freebies)){
		alert("You don't have a good value for your team's freebies");
		noErrorFound= false;
		
	}
	
	
	if(bigInning.length === 0){
		alert("You did not state a value for your team had a big inning");
		noErrorFound= false;
		
	}
	if(!jQuery.isNumeric(bigInning)){
		alert("You don't have a good value for your team's big inning");
		noErrorFound= false;
	}
	
	
	
	if(totalBases.length === 0){
		alert("You did not state a value for your total bases");
		noErrorFound= false;
		
	}
	if(!jQuery.isNumeric(totalBases)){
		alert("You don't have a good value for your total bases");
		noErrorFound= false;
	}
	
	
	if(dRuns.length === 0){
		alert("You did not state a value for runs given up");
		noErrorFound= false;
		
	}
	if(!jQuery.isNumeric(dRuns)){
		alert("You don't have a good value for runs given up");
		noErrorFound= false;
	}
	
	
	if(dFreebies.length === 0){
		alert("You did not state a value for freebies given up");
		noErrorFound= false;
		
	}
	if(!jQuery.isNumeric(dFreebies)){
		alert("You don't have a good value for freebies given up");
		noErrorFound= false;
	}
	
	
	if(noBigInning.length === 0){
		alert("You did not state a value for big inning given up");
		noErrorFound= false;
		
	}
	if(!jQuery.isNumeric(noBigInning)){
		alert("You don't have a good value for big innings given up");
		noErrorFound= false;
	}
	
	
	if(leadOuts.length === 0){
		alert("You did not state a value for leadoff outs");
		noErrorFound= false;
		
	}
	if(!jQuery.isNumeric(leadOuts)){
		alert("You don't have a good value for leadoff outs");
		noErrorFound= false;
	}
	
	
	if(pitchesThrown.length === 0){
		alert("You did not state a value for pitches thrown");
		noErrorFound= false;
		
	}
	if(!jQuery.isNumeric(pitchesThrown)){
		alert("You don't have a good value for pitches thrown");
		noErrorFound= false;
	}
	
	
	if(qualities.length === 0){
		alert("You did not input qualities");
		noErrorFound= false;
		
		
	}

	if(!jQuery.isNumeric(qualities)){
		alert("You don't have a good value for qualities");
		noErrorFound= false;
		
	}
	
	
	if(atBats.length === 0){
		alert("You did not input atBats");
		noErrorFound= false;
		
		
	}	
	if(!jQuery.isNumeric(atBats)){
		alert("You don't have a good value for atBats");
		noErrorFound= false;
	}
	
	
	if(noErrorFound == true){
		console.log(noErrorFound);
		return true;
	}else{
		console.log(noErrorFound);
		return false;
	}
	
}

function goalsMet(){
	var ourResult= $("#ourResult");
	console.log(ourResult);
	
	if(tally >= 7){
		ourResult.append("<p> Congratulations you have reached " + tally + " out of 10 goals");
		
	}else{
		ourResult.append("<p> You have only reached " + tally + " out of 10 goals");
		
	}
	disableButton();
	
	
}

function disableButton(){
	$("#hSubmit").attr("disabled", "disabled");
}


function validDates(){
	console.log("Inside validDates()");
	var date1= document.getElementById("date1").value;
	var date2= document.getElementById("date2").value;
	
	console.log(date1, date2)
	
	if (!date1  || !date2 ) {
		alert("Please input a valid date range");
		return false;
		
	}
	
	return true;
}




