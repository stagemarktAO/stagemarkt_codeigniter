<div class="col-md-offset-5a col-md-3 box-body">
<?php echo validation_errors(); ?>
<?php echo form_open('Internships/create'); ?>
<div class="form-group">
	<div class="form-group has-feedback">
	    <input type="text" class="form-control" name="education" value="<?php echo set_value('education'); ?>" placeholder="opleiding" />
	</div>
</div>

	<div class="form-group" id="sandbox-container">
		<div class="input-daterange input-group" id="datepicker">
			<input type="text" class="input-sm form-control" name="date_start" />
			<span class="input-group-addon">to</span>
			<input type="text" class="input-sm form-control" name="date_end" />
		</div>
	</div>
</div>