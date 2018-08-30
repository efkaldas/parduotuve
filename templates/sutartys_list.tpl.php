<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>sutartys</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=report'>Sutarčių ataskaita</a>
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Nauja sutartis</a>
</div>
<div class="float-clear"></div>

<table class="listTable">
	<tr>
		<th>Nr.</th>
		<th>Data</th>
		<th>Užsakovas</th>
		<th>Būsena</th>
		<th></th>
	</tr>
	<?php
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td>{$val['nr']}</td>"
					. "<td>{$val['užsakymo_data']}</td>"
					. "<td>{$val['užsakovo_vardas']} {$val['užsakovo_pavardė']}</td>"
					. "<td>{$val['būsena']}</td>"
					. "<td>"
						. "<a href='#' onclick='showConfirmDialog(\"{$module}\", \"{$val['nr']}\"); return false;' title=''>šalinti</a>&nbsp;"
						. "<a href='index.php?module={$module}&action=edit&id={$val['nr']}' title=''>redaguoti</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'templates/paging.tpl.php';
?>