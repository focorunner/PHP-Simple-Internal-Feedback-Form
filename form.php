<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing Feedback</title>
<script language="javascript" type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>

<script language="javascript" type="text/javascript" src="js/formbuild.js"></script>
<style type="text/css">
body { background-color: #174785;font-family: Arial; }
H1 { padding: 5px 0 0 0;text-align:center;font-family: Arial Black; }
fieldset { padding:4px; margin:5px 0 0 0;text-align: center;border-top:1px solid #ffffff; }
fieldset legend { font-size:10pt;font-family: Arial Black; }
input { font-size: 8pt; }
input:focus,select:focus,textarea:focus { border: 2px solid red; }
textarea { resize:none; font-family: Arial; font-size: 11pt; }
#wrap { width:320px;height:auto;font-size: 8pt;background-color: #FCD47C; margin: 5px auto 0px; border: 1px solid #b5e1ff; border-radius: 5px; }
#faqfield,#srqfield { display: none;margin-top:5px; margin-bottom: 5px; }
#form1 { margin-bottom: 0px !important; }
#srqinput { text-transform:uppercase; }
legend { line-height: 0px !important; margin-bottom: 10px !important; }
h1 { font-size: 2em !important; }
</style>
</head>

<body>
<div id="wrap" >
<h1>Billing Feedback Form</h1>
	
	<!--<form action="process.php" method="post" name="form1" id="form1" onSubmit="javascript:return(validate());">-->
	<form action="process.php" method="post" name="form1" id="form1" onSubmit="return formVal();">

<!-- Billing Rep Name Selector -->	
	<fieldset><legend align="center">Your Name</legend><sub><select name="BillingRep"><option value="">--Select Your Name--</option>
	<?php
		require 'classes.php';
		
	// PHP script for dynamic generation of Billing Rep Name Selector from CSV file BillingReps.csv
		$default = $_SESSION["BillingRep"];
		$fnBillRep = "config/BillingReps.csv";
		$Options = new selector($fnBillRep);
		$BillingReps = $Options->itemData;
		
	// For each line array (Billing Rep) echo selector option HTML code
		foreach ($BillingReps as $r) {				
			$opt = ($default==$r["Billing Rep"]) ? "selected='selected'" : "" ;
			echo "\n\t".'<option value="'.$r["Billing Rep"].'" '.$opt.'>'.$r["Billing Rep"].'</option>';
		}
	?>
	</select></sub><br /><small>remembered until browser/session close</small></fieldset>

<!-- Rep Name Selector -->
	<fieldset>
	<legend align="center">Follow-up on</legend>
	<select name="fuAgent">
	<option value=""> --Billing Reps--</option>
	<?php 
	// PHP script for dynamic generation of Billing Rep options from CSV file BillingReps.csv
		//$fnBillRep = "config/BillingReps.csv";
		//$Options = new selector($fnBillRep);
		//$BillingReps = $Options->itemData;
		
	// For each line array (Billing Rep) echo selector option HTML code
		foreach ($BillingReps as $r) {				
			echo "\n\t".'<option value="'.$r["Billing Rep"].'">'.$r["Billing Rep"].'</option>';
		}
	?>
	<option value=""> --Finance Agents--</option>	

	<?php
	// PHP script for dynamic generation of Finance Agent options from CSV file FinanceAgents.csv
		$fnFinAgents = "config/FinanceAgents.csv";
		$Options = new selector($fnFinAgents);
		$FinAgents = $Options->itemData;
		
	// For each line array (Finance Agent)echo selector option HTML code
		foreach ($FinAgents as $r) {
			echo "\n\t".'<option value="'.$r["Finance Agent"].'">'.$r["Finance Agent"].'</option>';
		}
	?>
	<option value="">--Sales Reps--</option>	
	<?php
	// PHP script for dynamic generation of Sales options from CSV file SalesAgents.csv
		$fnSalesAgents = "config/SalesAgents.csv";
		$Options = new selector($fnSalesAgents);
		$SalesAgents = $Options->itemData;
		
	// For each line array (Sales Agent)echo selector option HTML code
		foreach ($SalesAgents as $r) {
			echo "\n\t".'<option value="'.$r["Sales Agent"].'">'.$r["Sales Agent"].'</option>';
		}
	?>
	<option value="">--T1 Reps--</option>	
	<?php
	// PHP script for dynamic generation of T1 Agent options from CSV file T1Agents.csv
		$fnT1Agents = "config/T1Agents.csv";
		$Options = new selector($fnT1Agents);
		$T1Agents = $Options->itemData;
		
	// For each line array (T1 Agent)echo selector option HTML code
		foreach ($T1Agents as $r) {
			echo "\n\t".'<option value="'.$r["T1 Agent"].'">'.$r["T1 Agent"].'</option>';
		}
	?>

	<option value="">--T1 Team Leaders--</option>	
	<?php
	// PHP script for dynamic generation of T1 Team Leader options from CSV file T1TeamLeaders.csv
		$fnT1TeamLeaders = "config/T1TeamLeaders.csv";
		$Options = new selector($fnT1TeamLeaders);
		$T1TeamLeaders = $Options->itemData;
		
	// For each line array (T1 Team Leader)echo selector option HTML code
		foreach ($T1TeamLeaders as $r) {
			echo "\n\t".'<option value="'.$r["T1 Team Leader"].'">'.$r["T1 Team Leader"].'</option>';
		}
	?>

</select></fieldset>

<!-- Case Number Input Field -->
<fieldset >
		<legend align="center">Case Number</legend>
			<input type="text" name="caseNumber" />
</fieldset>

<!-- Billing Follow-Up Selector -->
	<fieldset>
	<legend align="center">Reason for Follow-Up (optional)</legend>
	<select name="followUp">
	<option value="">--Make a Selection--</option>	
	<?php 
	// PHP script for dynamic generation of Follow-up Feason selector from CSV file FollowUpReasons.csv
		$fnFuReason = "config/FollowUpReasons.csv";
		$Options = new selector($fnFuReason);
		$fuReason = $Options->itemData;
		
	// For each line array (Billing Follow-up Reason) echo selector option HTML code 
		foreach ($fuReason as $r) {
			echo "\n\t".'<option value="'.$r["Follow-up Reason"].'">'.$r["Follow-up Reason"].'</option>';
		}
	?>
</select></fieldset>
<fieldset id="explanation">
	<legend align="center">Explanation (Optional)</legend>
	<textarea rows="7" cols="40" type="text" name="expl" id="fuExpl" onkeyup="javascript:limiter()"></textarea>
	<br/>
	<script type="text/javascript">
		document.write("<input disabled type=text name=limit size=1 style='width: 35px !important; text-align: center;' readonly value="+count+">");
	</script>
	<small>Characters Left</small>
	</fieldset>


<div style="width: 100%;text-align: center; padding-bottom: 12px;"><input type="submit" name="submit" /></div>
</form>
</div>
</body>

</html>
