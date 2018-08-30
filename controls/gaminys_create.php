<?php
	
include 'libraries/gaminys.class.php';
$gaminysObj = new gaminys();

$formErrors = null;
$data = array();

// nustatome privalomus formos laukus
$required = array('kodas', 'pavadinimas', 'tipas');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
	'kodas' => 20,
	'pavadinimas' => 20,
	'tipas' => 20
);

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
	include 'utils/validator.class.php';

	// nustatome laukų validatorių tipus
	$validations = array (
		'kodas' => 'alfanum',
		'pavadinimas' => 'alfanum',
		'tipas' => 'alfanum'
	);

	// sukuriame laukų validatoriaus objektą
	$validator = new validator($validations, $required, $maxLengths);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		// įrašome naują klientą
		$gaminysObj->insertgaminys($dataPrepared);

		// nukreipiame vartotoją į klientų puslapį
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
include 'templates/gaminys_form.tpl.php';

?>