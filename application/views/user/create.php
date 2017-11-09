<body class="hold-transition register-page">
<div class="register-box">
	<div class="register-logo">
		<a href="#">
		<b>STAGE</b>MARKT
		</a>
	</div>

	<div class="register-box-body">
		<p class="login-box-msg">Maak een nieuw account aan</p>
		<?php echo validation_errors(); ?>
	<?php echo form_open('User/create'); ?>

		<div class="form-group has-feedback">
			<input type="text" class="form-control" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="Voornaam" /><span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<input type="text" class="form-control" name="lname" value="<?php echo set_value('lname'); ?>" placeholder="Achternaam"/><span class="glyphicon glyphicon-user form-control-feedback"></span>
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

        <div class="form-group has-feedback">
            <label for="typeaccount">Type account</label>
            <select class="form-control">
                <option id="optionsSelects2" name="typeaccount" value="0" <?php echo set_select('typeaccount', '0', FALSE); ?>>Student</option>
                <option id="optionsSelects3" name="typeaccount" value="1" <?php echo set_select('typeaccount', '1', TRUE); ?>>Contactpersoon</option>
            </select>
        </div>

		<div class="form-group has-feedback">
			<input type="email" class="form-control" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email adres"/><span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>

		<div class="form-group has-feedback">
			<input class="form-control" type="password" name="password" placeholder="Wachtwoord"/><span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>

		<div class="form-group has-feedback">
			<input class="form-control" type="password" name="confirm_password" placeholder="Herhaal wachtwoord" /><span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		</div>

		<button class="btn btn-primary btn-block btn-flat" type="submit" name="submit" value="Register">Verzend</button>

	</form>
	</div>
</div>
</body>