<ul id="reportInfo">
	<li class="title">Sudarytų sutarčių ataskaita</li>
	<li>Sudarymo data: <span><?php echo date("Y-m-d"); ?></span></li>
	<li>Sutarčių sudarymo laikotarpis:
		<span>
		<?php
			if(!empty($data['dataNuo'])) {
				if(!empty($data['dataIki'])) {
					echo "nuo {$data['dataNuo']} iki {$data['dataIki']}";
				} else {
					echo "nuo {$data['dataNuo']}";
				}
			} else {
				if(!empty($data['dataIki'])) {
					echo "iki {$data['dataIki']}";
				} else {
					echo "nenurodyta";
				}
			}
		?>
		</span>
	</li>
</ul>



<?php
	if(sizeof($sutartysData) > 0) { ?>
		<table class="reportTable">
			<tr class="gray">
				<th>ID</th>
				<th>Pavadinimas</th>
				<th class="width100">Praba</th>
			</tr>
			
			<?php
				// suformuojame lentelę
				foreach($sutartysData as $key => $val) {
					echo
						"<tr>"
							. "<td>{$val['id']}</td>"
							. "<td>{$val['pavadinimas']}</td>"
							. "<td>{$val['uzsakyta']}</td>"
						. "</tr>";
				}
			?>
						
		</table>
		<a href="index.php?module=sutartys&action=report" title="Nauja ataskaita" style="margin-bottom: 15px" class="button large float-right">nauja ataskaita</a>
<?php   
	} else {
?>
		<div class="warningBox">
			Nurodytu laikotartpiu sutarčių sudaryta nebuvo.
		</div>
<?php
	}
?>