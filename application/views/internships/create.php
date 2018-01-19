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
		<div class="form-group col-md-6 has-feedback">
			<label for="skills">Vaardigheid</label>
			<select name="skills[]" class="form-control select2-single">
				<?php foreach($skills  as $r): ?>
				<option value="<?php echo $r->id; ?>"> <?php echo $r->name ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group col-md-5 has-feedback">
			<label for="gradation">gradatie</label>
			<select name="gradation[]" class="form-control select2-single">
			<?php foreach($gradation as $g):?>
			<option value="<?php echo $g->id; ?>"> <?php echo $g->name ?></option>
			<?php endforeach; ?>
			</select>
		</div>
		<a id="addSkills">nieuwe vaardigheid</a>
	</div>

	<div class="form-group" id="skills_div" style="display: none;">
		<div class="form-group col-md-6 has-feedback">
			<label for="skills">Vaardigheid</label>
			<select name="skills[]" class="form-control select2-single" id="skills" disabled>
				<?php foreach($skills  as $r): ?>
					<option value="<?php echo $r->id; ?>"> <?php echo $r->name ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="form-group col-md-5 has-feedback">
			<label for="gradation">gradatie</label>
			<select name="gradation[]" class="form-control select2-single" id="gradation" disabled>
				<?php foreach($gradation as $g):?>
					<option value="<?php echo $g->id; ?>"> <?php echo $g->name ?></option>
				<?php endforeach; ?>
			</select>
		</div>
			</div>

	<button class="btn btn-primary btn-block btn-flat" type="submit" name="submit" value="Register">Verzend</button>
</div>