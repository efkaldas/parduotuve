<?php

include 'libraries/sutartys.class.php';
$sutartysObj = new sutartys();

if(!empty($id)) {
	// pašaliname užsakytas paslaugas
//	$sutartysObj->deleteOrderedServices($id);

	// šaliname sutartį
	$sutartysObj->deleteSutartys($id);

	// nukreipiame į sutarčių puslapį
	header("Location: index.php?module={$module}&action=list");
	die();
}

?>