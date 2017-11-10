<!DOCTYPE html>
    <html>
        <head>
            <title>E-PKO | E-Learning Pendidikan Kepelatihan Olahraga</title>

            <!-- Meta Tags -->
            <meta charset="UTF-8">
            <meta name="description" content="E-Learning Pendidikan Kepelatihan Olahraga">
            <meta name="keywords" content="Tenis, Sepakbola, Kepelatihan, Pendidikan">
            <meta name="author" content="Fakultas Ilmu Keolahragaan">
            <meta name="viewport" content="width=device-width">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- CSS -->
            <base href="http://<?php echo $_SERVER['HTTP_HOST'];?>/e-learning/">
            <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/bootstrap.css"/>
            <link rel="stylesheet" href="<?php echo base_url('assets/')?>css/style.css"/>

            <!-- Icons -->
            <link rel="icon" href="<?php echo base_url('assets/')?>images/logo1.png">

            <!-- Fonts -->
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

            <!-- JS -->
            <script type="text/javascript" src="<?php echo base_url('assets/')?>js/jquery-1.11.2.js"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/')?>js/bootstrap.js"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/')?>js/npm.js"></script>

        </head>

        <body>
            <header>
                <div class="bg-header">
                    <div class="navigation">
                        <div class="container">
                            <div class="row">
                                <nav class="navbar navbar-default">
                                    <div class="container-fluid">
                                        <!-- Brand and toggle get grouped for better mobile display -->
                                        <div class="navbar-header">
                                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                            <a class="navbar-brand visible-xs" href="#">E-PKO</a>
                                        </div>

                                        <!-- Collect the nav links, forms, and other content for toggling -->
                                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                            <ul class="nav navbar-nav">
                                                <?php
                                                    $halaman    = strtolower($this->router->fetch_method());
                                                ?>
                                                <li class="<?php echo ($halaman == 'index') ? 'active' : '' ?>">
                                                    <a href="<?php echo base_url('home') ?>">Halaman Utama</a>
                                                    <span class="<?php echo ($halaman == 'index') ? 'home' : '' ?>"></span>
                                                </li>

                                                <?php
                                                    if($this->session->userdata('username')){
                                                ?>
                                                    <li>
                                                        <a href="<?php echo base_url('auth/keluar') ?>">Keluar</a>
                                                    </li>
                                                <?php
                                                    }
                                                    else{
                                                ?>
                                                    <li class="<?php echo ($halaman == 'masuk') ? 'active' : '' ?>">
                                                        <a href="<?php echo base_url('auth/masuk') ?>">Masuk</a>
                                                        <span class="<?php echo ($halaman == 'masuk') ? 'masuk' : '' ?>"></span>
                                                    </li>
                                                    <li class="dropdown <?php echo ($halaman == 'registrasiguru') ? 'active' : '' ?>">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Daftar <span class="caret"></span></a>
                                                        <span class="<?php echo ($halaman == 'registrasiguru') || ($halaman == 'registrasiguru') ? 'daftar' : '' ?>"></span>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="<?php echo base_url('auth/registrasiguru') ?>">Guru</a></li>
                                                            <li class="divider"></li>
                                                            <li><a href="<?php echo base_url('auth/registrasisiswa') ?>">Siswa</a></li>
                                                        </ul>
                                                    </li>
                                                <?php
                                                    }
                                                ?>
                                               
                                            </ul>
                                            <?php
                                                if($this->session->userdata('username')){
                                            ?>
                                            <ul class="nav navbar-nav navbar-right">
                                                <li><a href="<?php echo base_url().($this->session->userdata('level') == 1 ? 'guru' : 'siswa')?>"><label class="label label-warning"><?php echo$this->session->userdata('username') ?></label></a></li>
                                            </ul>
                                            <?php
                                                }
                                            ?>
                                        </div><!-- /.navbar-collapse -->
                                    </div><!-- /.container-fluid -->
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
