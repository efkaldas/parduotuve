<?php

include 'libraries/gaminys.class.php';
$gaminysObj = new gaminys();

if(!empty($id)) {
	// patikriname, ar šalinama markė nepriskirta modeliui
	$count = $gaminysObj->getKlaseCount($id);

	$removeErrorParameter = '';
	if($count == 0) {
		// šaliname markę
		$gaminysObj->deleteGaminys($id);
	} else {
		// nepašalinome, nes markė priskirta modeliui, rodome klaidos pranešimą
		$removeErrorParameter = '&remove_error=1';
	}

	// nukreipiame į markių puslapį
	header("Location: index.php?module={$module}&action=list{$removeErrorParameter}");
	die();
}

?>