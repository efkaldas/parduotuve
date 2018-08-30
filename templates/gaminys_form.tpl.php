<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Gaminiai</a></li>
	<li><?php if(!empty($id)) echo "Gaminio redagavimas"; else echo "Naujas Gaminys"; ?></li>
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
			<legend>Kliento informacija</legend>
				<p>
					<label class="field" for="kodas">Kodas<?php echo in_array('kodas', $required) ? '<span> *</span>' : ''; ?></label>
					<?php if(!isset($data['editing'])) { ?>
						<input type="text" id="kodas" name="kodas" class="textbox textbox-150" value="<?php echo isset($data['kodas']) ? $data['kodas'] : ''; ?>" />
						<?php if(key_exists('kodas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['kodas']} simb.)</span>"; ?>
					<?php } else { ?>
						<span class="input-value"><?php echo $data['kodas']; ?></span>
						<input type="hidden" name="editing" value="1" />
						<input type="hidden" name="kodas" value="<?php echo $data['kodas']; ?>" />
					<?php } ?>
				</p>
			<p>
				<label class="field" for="pavadinimas">pavadinimas<?php echo in_array('pavadinimas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pavadinimas" name="pavadinimas" class="textbox textbox-150" value="<?php echo isset($data['pavadinimas']) ? $data['pavadinimas'] : ''; ?>" />
				<?php if(key_exists('pavadinimas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['pavadinimas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="tipai">Tipas<?php echo in_array('tipai', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="tipai" name="tipai">
					<option value="-1">---------------</option>
					<?php
						// išrenkame visas kategorijas sugeneruoti pasirinkimų lauką
						$bodytypes = $gaminysObj->getTipaiList();
						foreach($bodytypes as $key => $val) {
							$selected = "";
							if(isset($data['tipai']) && $data['tipai'] == $val['id_tipai']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_tipai']}'>{$val['name']}</option>";
						}
					?>
				</select>
			</p>
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit button" name="submit" value="Išsaugoti">
		</p>
	</form>
</div>