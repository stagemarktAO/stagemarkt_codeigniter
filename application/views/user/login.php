
<div style="padding-top: 50px">
    <div class="col-md-offset-4 col-md-3">
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
                <!-- /.col -->
            </div>
        </form>
    </div>
</div>
