<?php
	function szepDatum($bemenet, $mod="rovid", $nap=false){
		$honapok=array("Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December");
		$honapokRovid=array("Jan", "Feb", "Már", "Ápr", "Máj", "Jún", "Júl", "Aug", "Szep", "Okt", "Nov", "Dec");
		if (substr($bemenet, 0, 10)==date("Y-m-d")){
			$kimenet="";
			if ($nap=true){
				$kimenet="Ma ";
			}
			$kimenet.=substr($bemenet, 11, 5);
		}
		else{
			if (substr($bemenet, 0, 4)==date("Y")){
				$datum=substr($bemenet, 5, 5);
				list($honap, $nap)=explode("-", $datum);
				if ($mod=="hosszu" || $mod=="superhosszu"){
					$honap=$honapok[$honap-1];
				}
				if ($mod=="rovid"){
					$honap=$honapokRovid[$honap-1];
				}
				$kimenet=$honap." ".$nap.".";
			}
			else{
				$datum=substr($bemenet, 0, 10);
				list($ev, $honap, $nap)=explode("-", $datum);
				if ($mod=="hosszu" || $mod=="superhosszu"){
					$honap=$honapok[$honap-1];
				}
				if ($mod=="rovid"){
					$honap=$honapokRovid[$honap-1];
				}
				if ($mod=="superhosszu"){
					$kimenet=$ev." ".$honap." ".$nap.".";
				}
				else{
					$kimenet="'".substr($ev, -2)." ".$honap." ".$nap.".";
				}
			}
		}
		return $kimenet;
	}
?>
