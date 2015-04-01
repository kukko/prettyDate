<?php
	function prettyDate($input, $mod="short", $day=false, $lang="HU"){
		$localize=array(
			"today"=>array(
				"HU"=>"Ma ",
				"EN"=>"Today "
			),
			"months"=>array(
					"long"=>array(
						"HU"=>array(
							"Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December"
							),
						"EN"=>array(
							"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
						)
					),
					"short"=>array(
						"HU"=>array(
							"Jan", "Feb", "Már", "Ápr", "Máj", "Jún", "Júl", "Aug", "Szep", "Okt", "Nov", "Dec"
						),
						"EN"=>array(
							"Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
						)
					)
				)
			);
		if (substr($input, 0, 10)==date("Y-m-d")){
			$output="";
			if ($day==true){
				$output=$localize["today"][$lang];
			}
			$output.=substr($input, 11, 5);
		}
		else{
			if (substr($input, 0, 4)==date("Y")){
				$date=substr($input, 5, 5);
				list($month, $day)=explode("-", $date);
				if ($mod=="long" || $mod=="superlong"){
					$month=$localize["months"]["long"][$lang][$month-1];
				}
				if ($mod=="short"){
					$month=$localize["months"]["short"][$lang][$month-1];
				}
				$output=$month." ".$day.".";
			}
			else{
				$date=substr($input, 0, 10);
				list($year, $month, $day)=explode("-", $date);
				if ($mod=="long" || $mod=="superlong"){
					$month=$localize["months"]["long"][$lang][$month-1];
				}
				if ($mod=="short"){
					$month=$localize["months"]["short"][$lang][$month-1];
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
