<html>
<head>
	<title>Stagemarkt</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/main.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap-datepicker.min.css">
</head>
<body class="hold-transition login-page"></body>
<div class="login-box">
	<div class="login-logo">
		<a href="<?= base_url('') ?>">
			<b>STAGE</b>MARKT
		</a>
	</div>
    <div class="login-box-body">
        <?php echo validation_errors(); ?>
        <?php if (!empty($error)) { echo $error; };?>
        <p class="login-box-msg">Sign in to start your session</p>
        <?php echo form_open('User/login'); ?>
            <div class="form-group has-feedback">
                <input type="email" name="email" placeholder="email" class="form-control" value="<?php echo set_value('email'); ?>" /><br />
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" placeholder="password" class="form-control"/><br />
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- reset password link-->
                <div class="col-xs-5 pull-right">
                    <a href="<?= base_url('')?>reset" class="btn btn-primary btn-block btn-flat">Forgot password</a>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
</div>
