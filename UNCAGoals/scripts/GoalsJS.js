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

/*
function verifyORuns(){
	
	console.log("Inside verifyORuns()");
	
	var hORuns= $("#hORuns").val();
	var imgdiv= $("#imgdiv");
	
	console.log("tally "+ tally);
	
	
	
	if(hORuns.length === 0){
		alert("You did not input runs");
		noErrorFound= false;
		
	}
	
	
	
	if(!jQuery.isNumeric(hORuns)){
		alert("You don't have a good value for runs");
		noErrorFound= false;
	}
				
	//conditional logic	
		if(hORuns >= 6){
			tally+=1;
			imgdiv.append($('<img src= img/checkbox.png>'));
		}else{
			imgdiv.append($('<img src= img/x.png>'));
		}
	
		
		if(noErrorFound == true){
			console.log(noErrorFound);
			verifyOFreebies();
			return true;
		}else{
			console.log(noErrorFound);
			return false;
		}
	
}




function verifyOFreebies(){
	
	console.log("Inside verifyOFreebies()");
	var freebies= $("#hOFreebies").val();
	var imgdiv= $("#imgdiv");
	console.log(freebies);
	
	console.log("noErrorFound " + noErrorFound);
	console.log("tally "+ tally);

	noErrorFound = true;
	
	console.log(noErrorFound);
	
	if(freebies.length === 0){
		alert("You did not input your team's freebies");
		noErrorFound= false;
		
	}
	
	if(!jQuery.isNumeric(freebies)){
		alert("You don't have a good value for your team's freebies");
		noErrorFound= false;
		
	}

	
	//conditional logic
	if(freebies >= 9){
		tally+=1;
		imgdiv.append($('<img src= img/checkbox.png>'));
	}else{
		imgdiv.append($('<img src= img/x.png>'));
	}
	

	if(noErrorFound == false){
		
		console.log(noErrorFound);
		return false;
		
	}else{
		console.log(noErrorFound);
		verifyOBigInning();
		return true;
	}
}

/*
function verifyOBigInning(){
	
	console.log("Inside verifyOBigInning()");
	var bigInning= $("#hBigInning").val();
	var imgdiv= $("#imgdiv");
	console.log(bigInning);
	
	console.log("tally "+ tally);
	
	
	var noErrorFound= true;
	
	
	if(bigInning.length === 0){
		alert("You did not if your team had a big inning");
		noErrorFound= false;
		
	}
	
	
	
	if(!jQuery.isNumeric(bigInning)){
		alert("You don't have a good value for your team's big inning");
		noErrorFound= false;
	}
	
	
	
	//conditional logic
	if(bigInning >= 1){
		tally+=1;
		imgdiv.append($('<img src= img/checkbox.png>'));
	}else{
		imgdiv.append($('<img src= img/x.png>'));
	}
	
	
	if(noErrorFound == true){
		console.log(noErrorFound);
		verifyTotalBases();
		return true;
	}else{
		console.log(noErrorFound);
		return false;
	}
}

//boolean5
function verifyTotalBases(){
	 
	console.log("Inside verifyTotalBases()");
	var totalBases= $("#hTotalBases").val();
	var imgdiv= $("#imgdiv");
	console.log(totalBases);
	
	console.log("tally: "+ tally);
	
	//Check stuff
	if(validateInput(totalBases) == false){
		return;
	}
	
	
	//conditional logic
	if(totalBases >= 13){
		tally+=1;
		imgdiv.append($('<img src= img/checkbox.png>'));
	}else{
		imgdiv.append($('<img src= img/x.png>'));
	}
	
	boolean5= true;
	functionsRun();
}

//boolean6
function verifyDRuns(){
	
	console.log("Inside verifyDRuns()");
	var dRuns= $("#hDRuns").val();
	var imgdiv= $("#imgdiv");
	
	
	//Check stuff
	if(validateInput(dRuns) == false){
		return;
	}
	
	//conditional logic
	if(dRuns <= 5){
		tally+=1;
		imgdiv.append($('<img src= img/checkbox.png>'));
	}else{
		imgdiv.append($('<img src= img/x.png>'));
	}
	
	boolean6= true;
	functionsRun();
	
}

//boolean7
function verifyDFreebies(){
	
	console.log("Inside verifyDFreebies()");
	var dFreebies= $("#hDFreebies").val();
	var imgdiv= $("#imgdiv");
	
	
	//Check stuff
	if(validateInput(dFreebies) == false){
		return;
	}
	
	//conditional logic
	if(dFreebies <= 8){
		tally= tally + 1;
		imgdiv.append($('<img src= img/checkbox.png>'));
	}else{
		imgdiv.append($('<img src= img/x.png>'));
	}
	
	boolean7= true;
	functionsRun();
}

//boolean8
function verifyDBigInning(){
	
	console.log("Inside verifyDBigInning()");
	var noBigInning= $("#hNoBigInning").val();
	var imgdiv= $("#imgdiv");
	console.log(noBigInning);
	
	//Check stuff
	if(validateInput(noBigInning) == false){
		return;
	}
	
	
	//conditional logic
	if(noBigInning == 0){
		tally+=1;
		imgdiv.append($('<img src= img/checkbox.png>'));
	}else{
		imgdiv.append($('<img src= img/x.png>'));
	}
	
	boolean8= true;
	functionsRun();
	
}

//boolean9
function verifyLeadouts(){
	
	console.log("Inside verifyLeadouts()");
	var leadOuts= $("#hLeadOuts").val();
	var imgdiv= $("#imgdiv");
	console.log(leadOuts);
	
	//Check stuff
	if(validateInput(leadOuts) == false){
		return;
	}
	
	
	//conditional logic
	if(leadOuts >= 4){
		tally+=1;
		imgdiv.append($('<img src= img/checkbox.png>'));
	}else{
		imgdiv.append($('<img src= img/x.png>'));
	}
	
	boolean9= true;
	functionsRun();
}

//boolean10
function verifyPitchesThrown(){
	console.log("Inside verifyPitchesThrown()");
	var pitchesThrown= $("#hPitchesThrown").val();
	var imgdiv= $("#imgdiv");
	console.log(pitchesThrown);
	
	//Check stuff
	if(validateInput(pitchesThrown) == false){
		return;
	}
	
	
	//conditional logic
	if(pitchesThrown < 150){
		tally+=1;
		imgdiv.append($('<img src= img/checkbox.png>'));
	}else{
		imgdiv.append($('<img src= img/x.png>'));
	}
	
	console.log("tally:" + tally);
	//gameResult();
	goalsMet();
}

function gameResult(){
	console.log("inside gameResult()");
	var gameResult= $("#hGameResult").val();
	console.log(gameResult);
	
	
}

function verifyQualities(){
	
	console.log("Inside verifyQualities()");
	
	var qualities= $("#hQualities").val();
	var atBats= $("#hAtBats").val();
	var imgdiv= $("#imgdiv");
	
	console.log("tally "+ tally);
	
	var noErrorFound= true;
	
	
	
	if(qualities.length === 0){
		alert("You did not input qualities");
		noErrorFound= false;
		
		
	}else if(atBats.length === 0){
		alert("You did not input atBats");
		noErrorFound= false;
		
		
	}
	
	
	
	
	if(!jQuery.isNumeric(qualities)){
		alert("You don't have a good value for qualities");
		noErrorFound= false;
		
	}else if(!jQuery.isNumeric(atBats)){
		alert("You don't have a good value for atBats");
		noErrorFound= false;
	}
	
	
	
	console.log(qualities / atBats);
	
	//conditional logic
	if(qualities / atBats >= 0.5){
		tally+=1;
		imgdiv.append($('<img src= img/checkbox.png>'));
	}else {
		imgdiv.append($('<img src= img/x.png>'));
	}

	if(noErrorFound == true){
		console.log(noErrorFound);
		verifyOFreebies();
		return true;
	}else{
		console.log(noErrorFound);
		return false;
	}

	
	
}

*/
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




