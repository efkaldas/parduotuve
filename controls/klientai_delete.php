<?php

include 'libraries/klientai.class.php';
$klientaiObj = new klientai();

if(!empty($id)) {
	// patikriname, ar klientas neturi sudarytų sutarčių
	$count = $klientaiObj->getsutartysCountOfklientai($id);

	$removeErrorParameter = '';
	if($count == 0) {
		// šaliname klientą
		$klientaiObj->deleteklientai($id);
	} else {
		// nepašalinome, nes klientas sudaręs bent vieną sutartį, rodome klaidos pranešimą
		$removeErrorParameter = '&remove_error=1';
	}

	// nukreipiame į klientų puslapį
	header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>