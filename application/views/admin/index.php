<?php
$skills = $this->Skill_model->get_skills();

foreach ($get_skills->result() as $row) {
    echo $row->name;
    ?> <a href="user/deleteskill/?id=<?php echo $row->id; ?>">delete</a> <?php
}
?>
<body>
    <?php echo validation_errors(); ?>
<?php if (!empty($error)) { echo $error; };?>
<div class="admin">
    <?php echo form_open('user/admin'); ?>
    <input type="text" name="skill" placeholder="vaardigheid" id="admin2" /><br />
    <button type="submit" name="submit" value="create" id="admin2" >aanmaken</button>
</div>