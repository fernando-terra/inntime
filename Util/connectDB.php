<?php
class connectDB{
	function connect(){
		//$conn = pg_connect("host=10.0.2.15 dbname=inntime user=postgres password=abhg");
		//$conn = pg_connect("host=192.168.1.13 dbname=inntime user=postgres password=abhg");
		$conn = pg_connect("host=inntime.cfco8tfxueqm.sa-east-1.rds.amazonaws.com dbname=inntime user=inntime_adm password=inntimeabhg");
		return $conn;
	}
}
?>
