<?php

	//$answer = array('answer' => array("option"=>array("fine","wonderful","gloomy"),"alasan"=>"","notes"=>""));
	//$answer = array('answer' => array("option"=>array(),"alasan"=>"Capres PDIP Joko Widodo menyatakan pengumuman cawapresnya masih dalam kisaran waktu satu pekan lagi. Gubernur DKI Jakarta ini pun mulai menyebut kandidat pasangannya.","notes"=>""));
	$answer = array('answer' => array("option"=>array("yes","no"),"alasan"=>"","notes"=>"It's not bad"));

	$json = json_encode($answer);

	echo "<pre>";
	print_r($json);
	echo "</pre>";

	$back = json_decode($json,true);

	echo "<pre>";
	print_r($back);
	echo "</pre>";

	echo "notes = ".$back["answer"]["notes"];
?>

