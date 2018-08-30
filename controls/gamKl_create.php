<?php

include 'libraries/gamKl.class.php';
$gamKlObj = new gamKl();

include 'libraries/gaminys.class.php';
$gaminysObj = new gaminys();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('id', 'praba', 'dydis', 'storis', 'svoris', 'metalo_tipas', 'užsegimo_tipas', 'pynimo_tipas', 'fk_GRUPĖid_GRUPĖ', 'fk_GAMINYSkodas');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
	'id' => 6
);

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
	// nustatome laukų validatorių tipus
	$validations = array (
		'id' => 'positivenumber',
		'praba' => 'positivenumber',
		'dydis' => 'positivenumber',
		'storis' => 'positivenumber',
		'svoris' => 'positivenumber',
		'atributai' => 'alfanum',
		'metalo_tipas' => 'positivenumber',
		'užsegimo_tipas' => 'positivenumber',
		'pynimo_tipas' => 'positivenumber',
		'fk_GRUPĖid_GRUPĖ' => 'positivenumber',
		'fk_GAMINYSkodas' => 'positivenumber'
		);

	// sukuriame laukų validatoriaus objektą
	include 'utils/validator.class.php';
	$validator = new validator($validations, $required, $maxLengths);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();


		// įrašome naują įrašą
		$gamKlObj->insertGam($dataPrepared);

		// nukreipiame vartotoją į automobilių puslapį
		header("Location: index.php?module={$module}&action=list");
		die();
	}
	else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();

		// laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
		$data = $_POST;
	}
}

// įtraukiame šabloną
include 'templates/gamKl_form.tpl.php';

?>