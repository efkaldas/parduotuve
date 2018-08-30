<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">Klientai</a></li>
	<li><?php if(!empty($id)) echo "Kliento redagavimas"; else echo "Naujas klientas"; ?></li>
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
					<label class="field" for="asmens_kodas">Asmens kodas<?php echo in_array('asmens_kodas', $required) ? '<span> *</span>' : ''; ?></label>
					<?php if(!isset($data['editing'])) { ?>
						<input type="text" id="asmens_kodas" name="asmens_kodas" class="textbox textbox-150" value="<?php echo isset($data['asmens_kodas']) ? $data['asmens_kodas'] : ''; ?>" />
						<?php if(key_exists('asmens_kodas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['asmens_kodas']} simb.)</span>"; ?>
					<?php } else { ?>
						<span class="input-value"><?php echo $data['asmens_kodas']; ?></span>
						<input type="hidden" name="editing" value="1" />
						<input type="hidden" name="asmens_kodas" value="<?php echo $data['asmens_kodas']; ?>" />
					<?php } ?>
				</p>
			<p>
				<label class="field" for="vardas">Vardas<?php echo in_array('vardas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="vardas" name="vardas" class="textbox textbox-150" value="<?php echo isset($data['vardas']) ? $data['vardas'] : ''; ?>" />
				<?php if(key_exists('vardas', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['vardas']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="pavardė">Pavardė<?php echo in_array('pavardė', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pavardė" name="pavardė" class="textbox textbox-150" value="<?php echo isset($data['pavardė']) ? $data['pavardė'] : ''; ?>" />
				<?php if(key_exists('pavardė', $maxLengths)) echo "<span class='max-len'>(iki {$maxLengths['pavardė']} simb.)</span>"; ?>
			</p>
			<p>
				<label class="field" for="gimimo_dara">Gimimo data<?php echo in_array('gimimo_dara', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="gimimo_dara" name="gimimo_dara" class="textbox textbox-70 date" value="<?php echo isset($data['gimimo_dara']) ? $data['gimimo_dara'] : ''; ?>" />
			</p>
			<p>
				<label class="field" for="telefonas">Telefonas<?php echo in_array('telefonas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="telefonas" name="telefonas" class="textbox textbox-150" value="<?php echo isset($data['telefonas']) ? $data['telefonas'] : ''; ?>" />
			</p>
			<p>
				<label class="field" for="e_paštas">Elektroninis paštas<?php echo in_array('e_paštas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="e_paštas" name="e_paštas" class="textbox textbox-150" value="<?php echo isset($data['e_paštas']) ? $data['e_paštas'] : ''; ?>" />
			</p>
			<p>
				<label class="field" for="miestas">Miestas<?php echo in_array('miestas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="miestas" name="miestas" class="textbox textbox-150" value="<?php echo isset($data['miestas']) ? $data['miestas'] : ''; ?>" />
			</p>
			<p>
				<label class="field" for="adresas">Adresas<?php echo in_array('adresas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="adresas" name="adresas" class="textbox textbox-150" value="<?php echo isset($data['adresas']) ? $data['adresas'] : ''; ?>" />
			</p>
			<p>
				<label class="field" for="pašto_kodas">Pašto kodas<?php echo in_array('pašto_kodas', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pašto_kodas" name="pašto_kodas" class="textbox textbox-150" value="<?php echo isset($data['pašto_kodas']) ? $data['pašto_kodas'] : ''; ?>" />
			</p>
		</fieldset>
		<p class="required-note">* pažymėtus laukus užpildyti privaloma</p>
		<p>
			<input type="submit" class="submit button" name="submit" value="Išsaugoti">
		</p>
	</form>
</div>
