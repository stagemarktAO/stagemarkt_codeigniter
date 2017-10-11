
<?php echo validation_errors(); ?>
<?php echo form_open('Internships/create'); ?>
<div class="form-group">
    <input type="text" class="form-control" name="education" value="<?php echo set_value('education'); ?>" placeholder="opleiding" />
</div>

<div class="form-group">
    <input type="date" class="form-control" name="date_start" value="<?php echo set_value('date_start'); ?>" />
</div>
