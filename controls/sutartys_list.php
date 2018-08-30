<?php

// sukuriame sutarčių klasės objektą
include 'libraries/sutartys.class.php';
$sutartysObj = new sutartys();

// sukuriame puslapiavimo klasės objektą
include 'utils/paging.class.php';
$paging = new paging(config::NUMBER_OF_ROWS_IN_PAGE);

// suskaičiuojame bendrą įrašų kiekį
$elementCount = $sutartysObj->getsutartysListCount();

// suformuojame sąrašo puslapius
$paging->process($elementCount, $pageId);

// išrenkame nurodyto puslapio sutartis
$data = $sutartysObj->getsutartysList($paging->size, $paging->first);

// įtraukiame šabloną
include 'templates/sutartys_list.tpl.php';

?>