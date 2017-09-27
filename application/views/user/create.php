<div class="col-md-offset-5 col-md-2">
	<h1><?php echo $title; ?></h1>
<?php echo validation_errors(); ?>

	<?php echo form_open('User/create'); ?>

		<div class="form-group">
			<label for="fname">Voornaam</label>
			<input type="text" class="form-control" name="fname" value="<?php echo set_value('fname'); ?>" />
		</div>
		<div class="form-group">
			<label for="lname">Achternaam</label>
			<input type="text" class="form-control" name="lname" value="<?php echo set_value('lname'); ?>" />
		</div>


		<label for="gender">Geslacht</label>
		<div class="radio">
			<label>
				<input id="optionsRadios1" type="radio" name="gender" value="0" <?php echo set_radio('gender', '0', TRUE); ?>>Man</input>
			</label>
		</div>
		<div class="radio">
			<label>
				<input id="optionsRadios2" type="radio" name="gender" value="1" <?php echo set_radio('gender', '1', FALSE); ?>>Vrouw</input>
			</label>
		</div>

		<div class="form-group">
			<label for="email">Email adres</label>
			<input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" />
		</div>

		<div class="form-group">
			<label for="password">Wachtwoord</label>
			<input class="form-control" type="password" name="password"/>
		</div>

		<div class="form-group">
			<label for="confirm_password">herhaal wachtwoord</label>
			<input class="form-control" type="password" name="confirm_password" />
		</div>

		<button class="btn btn-default" type="submit" name="submit" value="Register">Verzend</button>

	</form>
</div>