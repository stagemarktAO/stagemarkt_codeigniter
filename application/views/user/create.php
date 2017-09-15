<?php echo validation_errors(); ?>

<?php echo form_open('User/create'); ?>

<label for="fname">Voornaam</label>
<input type="input" name="fname" /><br />

<label for="lname">Achternaam</label>
<input type="input" name="lname" /><br />

<label for="gender">Geslacht</label>
<input type="radio" name="gender" value="0">Man</input>
<input type="radio" name="gender" value="1">Vrouw</input><br />

<label for="institution">Instelling</label>
<input type="radio" name="institution" value="0">Student</input>
<input type="radio" name="institution" value="1">Bedrijf</input><br />

<label for="email">Email adres</label>
<input type="input" name="email" /><br />

<label for="password">Wachtwoord</label>
<input type="password" name="password"/><br />

<input type="submit" name="submit" value="Register" />

</form>