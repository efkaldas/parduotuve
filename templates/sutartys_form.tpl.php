<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li><a href="index.php?module=<?php echo $module; ?>&action=list">sutartys</a></li>
	<li><?php if(!empty($id)) echo "Sutarties redagavimas"; else echo "Nauja sutartis"; ?></li>
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
			<legend>Sutarties informacija</legend>
			<p>
				<?php if(!isset($data['editing'])) { ?>
					<label class="field" for="nr">Numeris<?php echo in_array('nr', $required) ? '<span> *</span>' : ''; ?></label>
					<input type="text" id="nr" name="nr" class="textbox textbox-70" value="<?php echo isset($data['nr']) ? $data['nr'] : ''; ?>">
				<?php } else { ?>
						<label class="field" for="nr">Numeris</label>
						<span class="input-value"><?php echo $data['nr']; ?></span>
						<input type="hidden" name="editing" value="1" />
						<input type="hidden" name="nr" value="<?php echo $data['nr']; ?>" />
				<?php } ?>
			</p>
			<p>
				<label class="field" for="užsakymo_data">užsakymo data<?php echo in_array('užsakymo_data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="užsakymo_data" name="užsakymo_data" class="textbox date textbox-150" value="<?php echo isset($data['užsakymo_data']) ? $data['užsakymo_data'] : ''; ?>">
			</p>
			<p>
				<label class="field" for="pristatymo_data">pristatymo data<?php echo in_array('pristatymo_data', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="pristatymo_data" name="pristatymo_data" class="textbox date textbox-150" value="<?php echo isset($data['pristatymo_data']) ? $data['pristatymo_data'] : ''; ?>">
			</p>
			<p>
				<label class="field" for="kaina">kaina<?php echo in_array('kaina', $required) ? '<span> *</span>' : ''; ?></label>
				<input type="text" id="kaina" name="kaina" class="textbox textbox-150" value="<?php echo isset($data['kaina']) ? $data['kaina'] : ''; ?>">
			</p>
			<p>
				<label class="field" for="užsakovas">Klientas<?php echo in_array('užsakovas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="užsakovas" name="užsakovas">
					<option value="">---------------</option>
					<?php
						// išrenkame klientus
						$klientai = $klientaiObj->getklientaiList();
						foreach($klientai as $key => $val) {
							$selected = "";
							if(isset($data['užsakovas']) && $data['užsakovas'] == $val['asmens_kodas']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['asmens_kodas']}'>{$val['vardas']} {$val['pavardė']}</option>";
						}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="sutarties_būsenos">būsena<?php echo in_array('sutarties_būsenos', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="sutarties_būsenos" name="sutarties_būsenos">
					<option value="">---------------</option>
					<?php
						// išrenkame sutarties_būsenoss
						$states = $sutartysObj->getBusenos();
						foreach($states as $key => $val) {
							$selected = "";
							if(isset($data['sutarties_būsenos']) && $data['sutarties_būsenos'] == $val['id_sutarties_būsenos']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_sutarties_būsenos']}'>{$val['name']}</option>";
						}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="adresas">adresas<?php echo in_array('adresas', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="adresas" name="adresas">
					<option value="">---------------</option>
					<?php
						// išrenkame adresass
						$states = $sutartysObj->getGatveList();
						foreach($states as $key => $val) {
							$selected = "";
							if(isset($data['adresas']) && $data['adresas'] == $val['id_ADRESAS']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id_ADRESAS']}'>{$val['gatvė']}</option>";
						}
					?>
				</select>
			</p>
			<p>
				<label class="field" for="klasė">klasė<?php echo in_array('klasė', $required) ? '<span> *</span>' : ''; ?></label>
				<select id="klasė" name="klasė">
					<option value="">---------------</option>
					<?php
						// išrenkame klasės
						$states = $sutartysObj->getKlaseList();
						foreach($states as $key => $val) {
							$selected = "";
							if(isset($data['klasė']) && $data['klasė'] == $val['id']) {
								$selected = " selected='selected'";
							}
							echo "<option{$selected} value='{$val['id']}'>{$val['id']}</option>";
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