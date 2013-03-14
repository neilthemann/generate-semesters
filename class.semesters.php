<?php

date_default_timezone_set('America/Chicago');

class Semesters {

	function getSemesters($numberOfSemesters = 3){
		
		$currentSemester = "";
		$nextSemester = "";
		$thirdSemester = "";
		$fourthSemester = "";
		
		$currentSeason = "";
		$currentYear = date("Y");
		
		$currentDay = date("z") + 1; // this is the day number; January 1 = day 1, Dec 31 = day 365 (or 366)
		
		
		// Spring semester = Dec 31 - May 15
		// Summer semester = May 16 - Aug 14
		// Fall semester = Aug 15 - Dec 31
		
		// set current semester
		
		switch (true){
			case ($currentDay < 136): // May 15 or 16 depending on leapyear
				$currentSeason = "Spring";
				break;
			case ($currentDay >= 136 && $currentDay < 228): // Aug 14 or 15 depending on leapyear
				$currentSeason = "Summer";
				break;
			case ($currentDay >= 228):
				$currentSeason = "Fall";
				break;				
		}
		
		$currentSemester = $currentSeason . " " . $currentYear;
		
		// set next semester
		
		if ($currentSeason == "Spring"){
			$nextSemester = "Summer " . $currentYear;
		} else if ($currentSeason == "Summer") {
			$nextSemester = "Fall " . $currentYear;
		} else if ($currentSeason == "Fall") {
			$nextSemester = "Spring " . ($currentYear + 1);
		}
		
		// set third semester
		
		if ($currentSeason == "Spring"){
			$thirdSemester = "Fall " . $currentYear;
		} else if ($currentSeason == "Summer") {
			$thirdSemester = "Spring " . ($currentYear + 1);
		} else if ($currentSeason == "Fall") {
			$thirdSemester = "Summer " . ($currentYear + 1);
		}
		
		// set fourth semester
		
		if ($currentSeason == "Spring"){
			$fourthSemester = "Spring " . ($currentYear + 1);
		} else if ($currentSeason == "Summer") {
			$fourthSemester = "Summer " . ($currentYear + 1);
		} else if ($currentSeason == "Fall") {
			$fourthSemester = "Fall " . ($currentYear + 1);
		}
		
		
		$semseterArray = array ();
		
		// add semesters into array according to how many is called for	
		switch ($numberOfSemesters) {
			case 3: // three semesters
				$semseterArray["thirdSemester"] = $thirdSemester;				
			case 2: // only two semesters
				$semseterArray["nextSemester"] = $nextSemester;
			case 1: // only this semester
				$semseterArray["currentSemester"] = $currentSemester;
				break;
			case -1: // offset one semester ahead, three semesters
				$semseterArray["fourthSemester"] = $fourthSemester;
				$semseterArray["thirdSemester"] = $thirdSemester;
				$semseterArray["nextSemester"] = $nextSemester;				
				break;
		}
		
		// put semesters in order
		$semseterData = array_reverse($semseterArray);
		
		return $semseterData;
		
		
	} // end getSemesters function
	
	function outputSelectHTML($numberOfSemesters = 3){
	
		$semesterArray = $this->getSemesters($numberOfSemesters);
		
		$selectHTML = "";
		
		foreach ($semesterArray as $key=>$value){
		
			$selectHTML .= '<option value="' . $value . '">' . $value . '</option>';
		
		}
		
		return $selectHTML;
			
	} // end outputSelectHTML function

} // end semesters class

?>
