
<html>
	<head>
		<title>Stagemarkt</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?=base_url();?>assets/css/main.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap-datepicker.min.css">
	</head>
<body class="skin-blue">
    <!-- Main Header -->
    <header class="main-header">
        <!-- Logo -->

            <a href="<?= base_url('') ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>STAGE</b>MARKT</span>
            </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">

            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <?php if (isset($_SESSION['email']) && $_SESSION['logged_in'] === TRUE) {  ?>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs"><?php echo $_SESSION['fname'];?></span>
                            </a>
                        <?php } else{ ?> <li class="white"><a href="<?= base_url('login') ?>">login</a></li> <li><a href="<?= base_url('register') ?>">register</a></li> <?php } ?>

                    <ul class="dropdown-menu">
                            <li class="user-body">
                                <p>voornaam: <?php echo $_SESSION['fname'];?></p>
                                <p>achternaam: <?php echo $_SESSION['lname'];?></p>
                                <p>email: <?php echo $_SESSION['email'];?></p>
                                <?php if ( $_SESSION['phone'] != null){?>
                                    <p>telefoon nummer: <?php echo $_SESSION['phone'];?></p>
                                <?php } ?>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?= base_url('profile') ?>" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>
    </body>
