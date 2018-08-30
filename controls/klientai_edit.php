<?php
	
include 'libraries/klientai.class.php';
$klientaiObj = new klientai();

$formErrors = null;
$data = array();

// nustatome privalomus formos laukus
$required = array('asmens_kodas','vardas', 'pavardė', 'gimimo_dara', 'telefonas', 'e_paštas', 'miestas', 'adresas', 'pašto_kodas');

// maksimalūs leidžiami laukų ilgiai
$maxLengths = array (
	'vardas' => 20,
	'pavardė' => 20
	
);

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
	include 'utils/validator.class.php';
	// nustatome laukų validatorių tipus
	$validations = array (
		'asmens_kodas' => 'positivenumber',
		'vardas' => 'alfanum',
		'pavardė' => 'alfanum',
		'gimimo_dara' => 'date',
		'telefonas' => 'phone',
		'e_paštas' => 'email',
		'miestas' => 'alfanum',
		'adresas' => 'alfanum',
		'pašto_kodas' => 'alfanum'
	);

	// sukuriame laukų validatoriaus objektą
	$validator = new validator($validations, $required, $maxLengths);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		// redaguojame klientą
		$klientaiObj->updateklientai($dataPrepared);

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
} else {
	// išrenkame klientą
	$data = $klientaiObj->getklientai($id);
}

// nustatome požymį, kad įrašas redaguojamas norint išjungti ID redagavimą šablone
$data['editing'] = 1;

// įtraukiame šabloną
include 'templates/klientai_form.tpl.php';

?>