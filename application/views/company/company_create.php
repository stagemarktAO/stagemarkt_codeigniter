<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 20/09/2017
 * Time: 10:57
 */

echo form_open('Company_controller/create'); ?>
<div class="col-sm-6">
    <div class="form-group">
        <label for="company name">Company name:</label>
        <input type="text" class="form-control" name="company_name">
    </div>
    <div class="form-group">
        <label for="adress">Adress:</label>
        <input type="text" class="form-control" name="adress">
    </div>
    <div class="form-group">
        <label for="phone">Phonenumber:</label>
        <input type="number" class="form-control" name="phonenumber">
    </div>
    <div class="form-group">
        <label for="site">Website:</label>
        <input type="url" class="form-control" name="site">
    </div>
    <input type="submit" name="submit" value="submit" />
</div>

</form>


