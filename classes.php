<?php
Class selector {
	
	public function __construct($opts) {
		
		// Open Rep Name CSV and read contents into $file variable
		$file = fopen($opts, "r") or die("Error opening <strong>".$opts."</strong> file");
		
		$i = 0;

		// Get the lines of the Select box option List in the $file array one at a time and decode into array variable
		while(($line = fgetcsv($file)) !== FALSE) {
			if($i == 0) {
			$c = 0;
			foreach($line as $key => $col) {
				$cols[$c] = $col;
				$c++;
			}
		} 
		else if($i > 0) {
			$c = 0;
			foreach($line as $col) {
		           $data[$i][$cols[$c]] = $col;
		           $c++;
			}
		}
		$i++;
		}
		$this->itemData = $data;
	}
}
		
Class fileUtil { 
	
	public function __construct($year) {
		$file = $year."-"."BillingFeedback.csv";
		if (!is_dir('feedback')) {
			mkdir('feedback');
		} else if(!file_exists('feedback/'.$file)) {
			self::createFile("feedback/".$file);
		} 
		$this->fn = 'feedback/'.$file;
	}		

	public function createFile($filename) {
		$fn = $filename;
		$fhandle = fopen($fn, 'w') or die("Can't Create Data File ".$fhandle);
		fclose($fhandle);
		
		$result = file_put_contents($filename, "Time Eastern,Year,Month,Month Name,Day of Month,Weekday,Hours,Agent,Billing Rep,Case Number,Follow Up Reason,Explanation\n");
		return;
	}
	public function fileWrite($fn,$fu) {
		$result = file_put_contents($fn,implode(",",$fu),FILE_APPEND | LOCK_EX);
		return $result;
	}
}

Class record {

	public function __construct($d) {
		$dateTime = date('m-d-Y h:i:s A', $d[dtstamp]);
		$hireDate = date('m-d-Y',$d['Hire Date']);
		$expl = trim(preg_replace(array('/\s\s+/','/\t/'),array(' ',' '),$d["expl"]));
		$fuData = array('"'.$dateTime.'"','"'.$d[year].'"','"'.$d[monthNum].'"','"'.$d[month].'"','"'.$d[mday].'"','"'.$d[weekday].'"','"'.$d[hours].'"','"'.$d[fuAgent].'"','"'.$d[billingRep].'"','"'.$d[caseNum].'"','"'.$d[followUp].'"','"'.$d[expl].'"'."\r\n");
		$this->record = $fuData;
	}
}
?>