<?php
	function szepDatum($input, $mod="short", $day=false){
		$months=array("Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December");
		$monthsShort=array("Jan", "Feb", "Már", "Ápr", "Máj", "Jún", "Júl", "Aug", "Szep", "Okt", "Nov", "Dec");
		if (substr($input, 0, 10)==date("Y-m-d")){
			$output="";
			if ($day=true){
				$output="Ma ";
			}
			$output.=substr($input, 11, 5);
		}
		else{
			if (substr($input, 0, 4)==date("Y")){
				$date=substr($input, 5, 5);
				list($month, $day)=explode("-", $date);
				if ($mod=="long" || $mod=="superlong"){
					$month=$months[$month-1];
				}
				if ($mod=="short"){
					$month=$monthsShort[$month-1];
				}
				$output=$month." ".$day.".";
			}
			else{
				$date=substr($input, 0, 10);
				list($year, $month, $day)=explode("-", $date);
				if ($mod=="long" || $mod=="superlong"){
					$month=$months[$month-1];
				}
				if ($mod=="short"){
					$month=$monthsShort[$month-1];
				}
				if ($mod=="superlong"){
					$output=$year." ".$month." ".$day.".";
				}
				else{
					$output="'".substr($year, -2)." ".$month." ".$day.".";
				}
			}
		}
		return $output;
	}
?>
