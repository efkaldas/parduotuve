<?php

include 'libraries/gamKl.class.php';
$gamKlObj = new gamKl();

$formErrors = null;
$fields = array();

$data = array();
if(empty($_POST['submit'])) {
	// rodome ataskaitos parametrų įvedimo formą
	include 'templates/sutartys_report_form.tpl.php';
} else {
	// nustatome laukų validatorių tipus
	$validations = array (
		'dataNuo' => 'date',
		'dataIki' => 'date'
	);

	// sukuriame validatoriaus objektą
	include 'utils/validator.class.php';
	$validator = new validator($validations);

	if($validator->validate($_POST)) {
		// suformuojame laukų reikšmių masyvą SQL užklausai
		$data = $validator->preparePostFieldsForSQL();
		
		// išrenkame ataskaitos duomenis
		$sutartysData = $gamKlObj->asd($data['dataNuo'], $data['dataIki']);
	//	$totalPrice = $sutartysObj->getSumPriceOfsutartys($data['dataNuo'], $data['dataIki']);
	//	$totalServicePrice = $sutartysObj->getSumPriceOfOrderedServices($data['dataNuo'], $data['dataIki']);
		
		// rodome ataskaitą
		include 'templates/sutartys_report_show.tpl.php';
	} else {
		// gauname klaidų pranešimą
		$formErrors = $validator->getErrorHTML();
		// gauname įvestus laukus
		$fields = $_POST;

		// rodome ataskaitos parametrų įvedimo formą su klaidomis
		include 'templates/sutartys_report_form.tpl.php';
	}
}