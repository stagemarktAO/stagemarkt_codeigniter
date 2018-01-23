<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stagemarkt</title>
</head>
<body class="hold-transition login-page"></body>
<div>
    <!-- form send to Mail_controller to send an email-->
    <?php form_open('Mail_controller/reset_password'); ?>
        <div class="form-group has-feedback">
            <input type="email" name="email" placeholder="email" class="form-control" value="<?php echo set_value('email'); ?>" /><br />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="col-xs-4">
            <button type="submit" value="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
        </div>
    </form>
</div>
</body>
</html>
<!--submit username/emailadress for recover email-->