<?php

include 'libraries/sutartys.class.php';
$sutartysObj = new sutartys();


include 'libraries/gamKl.class.php';
$gamKlObj = new gamKl();

include 'libraries/gaminys.class.php';
$gaminysObj = new gaminys();

include 'libraries/klientai.class.php';
$klientaiObj = new klientai();

$formErrors = null;
$data = array();

// nustatome privalomus laukus
$required = array('nr', 'užsakymo_data', 'pristatymo_data', 'fk_UŽSAKOVASasmens_kodas', 'būsena', 'fk_ADRESASid_ADRESAS', 'fk_KLASĖ');

// vartotojas paspaudė išsaugojimo mygtuką
if(!empty($_POST['submit'])) {
	include 'utils/validator.class.php';

	// nustatome laukų validatorių tipus
	$validations = array (
		'nr' => 'positivenumber',
		'užsakymo_data' => 'date',
		'pristatymo_data' => 'date',
		'kaina' => 'positivenumber',
		'būsena' => 'positivenumber',
		'fk_UŽSAKOVASasmens_kodas' => 'positivenumber',
		'fk_ADRESASid_ADRESAS' => 'positivenumber',
		'fk_KLASĖ' => 'positivenumber'
	);

	// sukuriame laukų validatoriaus objektą
	$validator = new validator($validations, $required);

	// laukai įvesti be klaidų
	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$dataPrepared = $validator->preparePostFieldsForSQL();

		// atnaujiname sutartį
		$sutartysObj->updatesutartys($dataPrepared);


		// nukreipiame vartotoją į sutarčių puslapį
		if($formErrors == null) {
			header("Location: index.php?module={$module}&action=list");
			die();
		}
	} else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();

		// laukų reikšmių kintamajam priskiriame įvestų laukų reikšmes
		$data = $_POST;
		if(isset($_POST['kiekiai']) && sizeof($_POST['kiekiai']) > 0) {
			$i = 0;
			foreach($_POST['kiekiai'] as $key => $val) {
				$data['uzsakytos_paslaugos'][$i]['kiekis'] = $val;
				$i++;
			}
		}
	}
} else {
	//  išrenkame elemento duomenis ir jais užpildome formos laukus.
	$data = $sutartysObj->getsutartys($id);
}

// nustatome požymį, kad įrašas redaguojamas norint išjungti ID redagavimą šablone
$data['editing'] = 1;

// įtraukiame šabloną
include 'templates/sutartys_form.tpl.php';

?>