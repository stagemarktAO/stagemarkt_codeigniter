<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 20/09/2017
 * Time: 10:57
 */
    echo validation_errors();
    echo form_open('user/profile', 'class="form-horizontal col-sm-10" onSubmit="alert(\'Als u iets in uw profiel veranderd heeft is dit gelukt.\');"');
?>
    <div class="box-body">
        <div class="form-group">
            <label for="fname" class="col-sm-2 control-label">naam:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="fname" value="<?php echo $_SESSION['fname'];?>">
            </div>
        </div>
        <div class="form-group">
            <label for="lname" class="col-sm-2 control-label">achter naam:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="lname" value="<?php echo $_SESSION['lname'];?>">
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">telefoon nummer:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" value="<?php echo $_SESSION['phone'];?>" name="phone" data-toggle="tooltip" data-placement="bottom" title="please enter a valid phone number (without special characters)">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email'];?>">
            </div>
        </div>
    </div>
    <?php if($_SESSION['type'] == 1) {?>
    <div class="form-group">
        <label for="company" class="col-sm-2 control-label">Company</label>
        <div class="col-sm-8">
            <select class="form-control" name="company_id">
                <option id="null" value="null">geen</option>
                <?php foreach($companies AS $company) { ?>
                    <option id="<?=$company['id'];?>" value="<?=$company['id'];?>" <?=($contact_company->company_id == $company['id'])?"selected=\"selected\"":''?>><?= $company['company_name'] . ', ' . $company['adress'];?></option>
                <?php }?>
            </select>
        </div>
        <a class="col-sm-2 btn btn-info pull-right" href="<?=base_url() . 'company/create'?>">Nieuw bedrijf</a>
    </div>
    <?php };?>
</div>

<div class="box-footer">
    <button class="btn btn-info pull-right" type="submit" name="submit" value="Update">Verzend</button>
    <a class="btn btn-default" href="<?= base_url('') ?>">Annuleren</a>
</div>

</form>