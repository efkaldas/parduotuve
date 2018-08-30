<?php

include 'libraries/gamKl.class.php';
$gamKlObj = new gamKl();

if(!empty($id)) {
	// patikriname, ar automobilis neįtrauktas į sutartis
	$count = $gamKlObj->getsutartysCountOfGam($id);

	$removeErrorParameter = '';
	if($count == 0) {
		// šaliname automobilį
		$gamKlObj->deleteGam($id);
	} else {
		// nepašalinome, nes automobilis įtrauktas bent į vieną sutartį, rodome klaidos pranešimą
		$removeErrorParameter = '&remove_error=1';
	}

	// nukreipiame į automobilių puslapį
	header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>