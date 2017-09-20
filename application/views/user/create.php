<?php echo validation_errors(); ?>

<?php echo form_open('User/create'); ?>

<label for="fname">Voornaam</label>
<input type="input" name="fname" value="<?php echo set_value('fname'); ?>" /><br />

<label for="lname">Achternaam</label>
<input type="input" name="lname" value="<?php echo set_value('lname'); ?>" /><br />

<label for="gender">Geslacht</label>
<input type="radio" name="gender" value="0" <?php echo set_radio('gender', '0', TRUE); ?>>Man</input>
<input type="radio" name="gender" value="1" <?php echo set_radio('gender', '1', FALSE); ?>>Vrouw</input><br />

<label for="email">Email adres</label>
<input type="input" name="email" value="<?php echo set_value('email'); ?>" /><br />

<label for="password">Wachtwoord</label>
<input type="password" name="password"/><br />

<input type="submit" name="submit" value="Register" />

</form>