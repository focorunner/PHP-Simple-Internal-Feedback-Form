//Edit the counter/limiter value as your wish
var count = "255";   //Example: var count = "175";
function limiter(){
	var tex = document.form1.expl.value;
	var len = tex.length;
	if(len > count){
        tex = tex.substring(0,count);
        document.form1.expl.value =tex;
        return false;
}
document.form1.limit.value = count-len;
}

// Form validation code will come here.
function formVal() {
   if(document.form1.BillingRep.value == "") {
		alert("NOT SUBMITTED!\nIncomplete Data\nSelect your name");
		document.form1.BillingRep.focus();
		return false;
	}
	if(document.form1.fuAgent.value == "" ) {
		alert("NOT SUBMITTED!\nIncomplete Data\nSelect the 'Follow-up on' agent" );
		document.form1.fuAgent.focus();
		return false;
	}
	if(document.form1.caseNumber.value == "" ||
	document.form1.caseNumber.value.length != 8) {
		alert( "NOT SUBMITTED!\nIncomplete Data\nEnter 8-digit Case Number" );
		document.form1.caseNumber.focus();
		return false;
	}
	if(document.form1.followUp.value == "" ||
	document.form1.followUp.value == " --Billing Follow-up Reasons--" ||
	document.form1.followUp.value == " --Finance Follow-up Reasons--" ||
	document.form1.followUp.value == " --Sales Follow-up Reasons--") {
		alert("NOT SUBMITTED!\nIncomplete Data\nSelect Reason for follow-up");
		document.form1.followUp.focus();	
		return false;
	}      
}


