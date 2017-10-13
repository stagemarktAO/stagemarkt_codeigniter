<div class="col-md-offset-5 col-md-3 box-body">
<?php echo validation_errors(); ?>
<?php echo form_open('Internships/create'); ?>
	<div class="form-group">
		<div class="form-group has-feedback">
		    <input type="text" class="form-control" name="education" value="<?php echo set_value('education'); ?>" placeholder="opleiding" />
		</div>
	</div>

	<div class="form-group" id="sandbox-container">
		<div class="input-daterange input-group" id="datepicker">
			<input type="text" class="input-sm form-control" name="date_start" value="<?php echo set_value('date_start');?>" />
			<span class="input-group-addon">to</span>
			<input type="text" class="input-sm form-control" name="date_end" />
		</div>
	</div>

	<div class="form-group">
		<div class="form-group has-feedback">
			<input type="number" class="form-control" name="year" value="<?php echo set_value('year'); ?>" placeholder="leerjaar" />
		</div>
	</div>

	<div class="form-group">
		<div class="form-group has-feedback">
			<input type="text" class="form-control" name="location" value="<?php echo set_value('location'); ?>" placeholder="locatie" />
		</div>
	</div>

	<div class="form-group">
		<div class="form-group has-feedback">
			<input type="text" class="form-control" name="skills" value="<?php echo set_value('skills'); ?>" placeholder="vaardigheden" />
		</div>
	</div>

	<div class="form-group">
		<div class="form-group has-feedback">
			<input type="text" class="form-control" name="gradation" value="<?php echo set_value('gradation'); ?>" placeholder="gradatie vaardigheden" />
		</div>
	</div>

	<button class="btn btn-primary btn-block btn-flat" type="submit" name="submit" value="Register">Verzend</button>
</div>