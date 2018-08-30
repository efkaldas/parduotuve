<?php

// sukuriame klientų klasės objektą
include 'libraries/klientai.class.php';
$klientaiObj = new klientai();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $klientaiObj->getklientaiListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio klientus
$data = $klientaiObj->getklientaiList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/klientai_list.tpl.php';

?>