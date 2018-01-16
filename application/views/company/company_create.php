<?php echo form_open('Company_controller/create', 'class="form-horizontal col-sm-10"'); ?>
<?php echo validation_errors(); ?>
<div class="box-body">
    <div class="form-group">
        <label for="company name" class="col-sm-2 control-label">Company name:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="company_name">
        </div>
    </div>
    <div class="form-group">
        <label for="adress" class="col-sm-2 control-label">Adress:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="adress">
        </div>
    </div>
    <div class="form-group">
        <label for="company_number" class="col-sm-2 control-label">Accrediteringsnummer:</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="company_number" size="9">
        </div>
    </div>
    <div class="form-group">
        <label for="phone" class="col-sm-2 control-label">Phonenumber:</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="phonenumber" data-toggle="tooltip" data-placement="bottom" title="please enter a valid phone number (without special characters)">
        </div>
    </div>
    <div class="form-group">
        <label for="site" class="col-sm-2 control-label">Website:</label>
        <div class="col-sm-10">
            <input type="url" class="form-control" name="site">
        </div>
    </div>
</div>
<div class="box-footer">
    <button type="submit" class="btn btn-info pull-right">submit</button>
</div>
</form>