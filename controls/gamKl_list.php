<?php

// sukuriame automobilių klasės objektą
include 'libraries/gamKl.class.php';
$gamKlObj = new gamKl();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $gamKlObj->getGamListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio automobilius
$data = $gamKlObj->getGamList($paging->size, $paging->first);	

// įtraukiame šabloną
include 'templates/gamKl_list.tpl.php';

?>