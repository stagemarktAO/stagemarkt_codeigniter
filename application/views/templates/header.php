

<html>
	<head>
		<title>Stagemarkt</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" https="://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.2/css/AdminLTE.min.css">
		<link rel="stylesheet" href="<?=base_url();?>assets/css/main.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap-datepicker.min.css">
	</head>
<body class="skin-blue">
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->

            <a href="welcome" class="logo">
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php if (isset($_SESSION['email']) && $_SESSION['logged_in'] === TRUE) { echo $_SESSION['fname'];}else{echo 'niet ingelogd';} ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <?php

                                    if (isset($_SESSION['email']) && $_SESSION['logged_in'] === TRUE) {

                                        ?><a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat">Logout</a><?php
                                        if (uri_string() == 'login' || uri_string() == 'register') {
                                            redirect('welcome');
                                        }
                                        else{

                                        }
                                    }
                                    else {

                                        if(uri_string() == 'login'||uri_string() == 'register'||uri_string() == 'welcome'){

                                        }
                                        else{
                                            redirect('welcome');
                                        }
                                    }
                                    ?>
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
