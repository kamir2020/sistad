<?php

	$db_host = "localhost";
	$db_name = "sistadne_sistad";
	$db_user = "sistadne_sistad";
	$db_pass = "2024Sistad999";
	
	try{
		
		$db_con = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);
		$db_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo"connected";
		
	}
	catch(PDOException $e){
		echo $e->getMessage();
		
	}
?>
