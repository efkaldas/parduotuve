<?php

// sukuriame darbuotojų klasės objektą
include 'libraries/gaminys.class.php';
$gaminysObj = new gaminys();

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $gaminysObj->getGaminysListCount();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio darbuotojus
$data = $gaminysObj->getGaminysList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/gaminys_list.tpl.php';

?>