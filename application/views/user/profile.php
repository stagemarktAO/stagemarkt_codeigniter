<?php
/**
 * Created by PhpStorm.
 * User: Gebruiker
 * Date: 20/09/2017
 * Time: 10:57
 */
    echo validation_errors();
    echo form_open('user/profile', 'class="form-horizontal col-sm-10"');
?>
<div class="box-body">
    <div class="form-group">
        <label for="fname" class="col-sm-2 control-label">name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="fname" value="<?php echo $_SESSION['fname'];?>">
        </div>
    </div>
    <div class="form-group">
        <label for="lname" class="col-sm-2 control-label">Last name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="lname" value="<?php echo $_SESSION['lname'];?>">
        </div>
    </div>
    <div class="form-group">
        <label for="phone" class="col-sm-2 control-label">Phonenumber:</label>
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
<div class="box-footer">
    <button class="btn btn-info pull-right" type="submit" name="submit" value="Update">Verzend</button>
</div>
</form>