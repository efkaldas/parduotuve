<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Automobiliai</a></li>
	<li><?php if(!empty($id)) echo "Automobilio redagavimas"; else echo "Naujas automobilis"; ?></li>
</ul>
<div class="float-clear"></div>
<div id="formContainer">
	<?php if($formErrors != null) { ?>
		<div class="errorBox">
			Neįvesti arba neteisingai įvesti šie laukai:
			<?php 
				echo $formErrors;
			?>
		</div>
	<?php } ?>
	<form action="" method="post">
		<fieldset>
			<legend>Gaminio klases informacija</legend>
			<p>
					<label class="field" for="id">id<?php echo in_array('id', $required) ? '<span> *</span>' : ''; ?></label>
					<?php if(!isset($data['editing'])) { ?>
						<input type="text" id="id" name="id" class="textbox textbox-150" value="<?php echo isset($data['id']) ? $data['id'] : ''; ?>" />
						<?php if(key_exists('id', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['id']} simb.)</span>"; ?>
					<?php } else { ?>
						<span class="input-value"><?php echo $data['id']; ?></span>
						<input type="hidden" name="editing" value="1" />
						<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
					<?php } ?>
			</p>
			<p>
				<label class="field" for="praba">praba<?php echo in_array('praba', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="praba" name="praba" class="textbox textbox-150" value="<?php echo isset($data['praba']) ? $data['praba'] : ''; ?>" />
				<?php if(key_exists('praba', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['praba']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="dydis">dydis<?php echo in_array('dydis', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="dydis" name="dydis" class="textbox textbox-150" value="<?php echo isset($data['dydis']) ? $data['dydis'] : ''; ?>" />
				<?php if(key_exists('dydis', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['dydis']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="storis">storis<?php echo in_array('storis', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="storis" name="storis" class="textbox textbox-150" value="<?php echo isset($data['storis']) ? $data['storis'] : ''; ?>" />
				<?php if(key_exists('storis', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['storis']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="svoris">svoris<?php echo in_array('svoris', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="svoris" name="svoris" class="textbox textbox-150" value="<?php echo isset($data['svoris']) ? $data['svoris'] : ''; ?>" />
				<?php if(key_exists('svoris', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['svoris']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="atributai">atributai<?php echo in_array('atributai', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="atributai" name="atributai" class="textbox textbox-150" value="<?php echo isset($data['atributai']) ? $data['atributai'] : ''; ?>" />
				<?php if(key_exists('atributai', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['atributai']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="metalas">Metalas<?php echo in_array('metalas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="metalas" name="metalas">
					<option value="-1">---------------</option>
					<?php
						// išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
						$fueltypes = $gamKlObj->getMetalasList();
						foreach($fueltypes as $key => $val) {
							$selected = "";
							if(isset($data['metalas']) && $data['metalas'] == $val['id_metalas']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_metalas']}'>{$val['name']}</option>";
						}
					?>
				</select>
			</p>
			<p>				
				<label class="field" for="užsegimas">Užsegimas<?php echo in_array('užsegimas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="užsegimas" name="užsegimas">
					<option value="-1">---------------</option>
					<?php
						// išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
						$gearboxes = $gamKlObj->getUzsegimasList();
						foreach($gearboxes as $key => $val) {
							$selected = "";
							if(isset($data['užsegimas']) && $data['užsegimas'] == $val['id_užsegimas']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_užsegimas']}'>{$val['name']}</option>";
						}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="pynimas">Pynimas<?php echo in_array('pynimas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="pynimas" name="pynimas">
					<option value="-1">---------------</option>
					<?php
						// išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
						$bodytypes = $gamKlObj->getPynimasList();
						foreach($bodytypes as $key => $val) {
							$selected = "";
							if(isset($data['pynimas']) && $data['pynimas'] == $val['id_pynimas']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_pynimas']}'>{$val['name']}</option>";
						}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="grupė">grupė<?php echo in_array('grupė', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="grupė" name="grupė">
					<option value="-1">---------------</option>
					<?php
						// išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
						$bodytypes = $gamKlObj->getGrupeList();
						foreach($bodytypes as $key => $val) {
							$selected = "";
							if(isset($data['grupė']) && $data['grupė'] == $val['id_GRUPĖ']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_GRUPĖ']}'>{$val['pavadinimas']}</option>";
						}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="gaminys">gaminys<?php echo in_array('gaminys', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="gaminys" name="gaminys">
					<option value="-1">---------------</option>
					<?php
						// išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
						$brands = $gaminysObj->getTipaiList();
						foreach($brands as $key => $val) {
							echo "<optgroup label='{$val['name']}'>";

							$models = $gaminysObj->getGaminysbyTipas($val['id_tipai']);
							foreach($models as $key2 => $val2) {
								$selected = "";
								if(isset($data['gaminys']) && $data['gaminys'] == $val2['kodas']) {
									$selected = " selected='selected'";
								}
								echo "<option{$selected} value='{$val2['kodas']}'>{$val2['pavadinimas']}</option>";
							}
						}
					?>
				</select>
			</p>
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit button" name="submit" value="Išsaugoti">
		</p>
		<?php if(isset($data['id'])) { ?>
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
		<?php } ?>
	</form>
</div>