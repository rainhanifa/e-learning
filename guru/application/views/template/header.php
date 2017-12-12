<html>
    <head>
        <?php $halaman = ucfirst($this->router->fetch_class()); ?>
        <title> Area <?php echo $this->session->userdata('level') == 9 ? 'Admin | Manajemen ' : 'Dosen | '; ?><?php echo $halaman ?></title>
        
        <!-- Meta Tags -->
        <meta charset="UTF-8">
        <meta name="description" content="E-Learning Pendidikan Kepelatihan Olahraga">
        <meta name="keywords" content="Tenis, Sepakbola, Kepelatihan, Pendidikan">
        <meta name="author" content="Tim Fakultas Ilmu Keolahragaan">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
        <!-- CSS -->

        <base href="http://<?php echo $_SERVER['HTTP_HOST'];?>/e-learning/guru">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/')?>bootstrap.css"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/')?>style.css"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/')?>guru.css"/>

        <!-- Icons -->
        <link rel="icon" href="<?php echo base_url('assets/images/')?>logo1.png">
        
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        
    </head>
    <body>
        <header>
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
                              
                                    <?php
                                        $halaman        =   strtolower($halaman);
                                        if($halaman == '')  $halaman    =   'beranda';

                                        $classbn        = "";
                                        $spanclassbn    = "";
                                        $classprof      = "";
                                        $spanclasspr    = "";
                                        $classrapor     = "";
                                        $spanclassrp    = "";
                                        $classmateri    = "";
                                        $spanclassmt    = "";
                                        $classnote      = "";
                                        $spannote       = "";
                                    
                                        // if($halaman == 'home'){
                                        //     $classbn     = "active";
                                        //     $spanclassbn = "home";
                                        // } else if($halaman == 'profil' || $halaman == 'formp'){
                                        //     $classprof   = "active";
                                        //     $spanclasspr = "profile";
                                        // } else if($halaman == 'nilai'){
                                        //     $classrapor  = "active";
                                        //     $spanclassrp = "clue";
                                        // } else if($halaman == 'materi'){
                                        //     $classmateri = "active";
                                        //     $spanclassmt = "materi";
                                        // } else if($halaman == 'catatan'){
                                        //     $classnote = "active";
                                        //     $spannote = "note";
                                        // }
        
                                    ?>
                                    <ul class="nav navbar-nav">
                                    <?php
                                        if($this->session->level == 1){ ?>
                                        <li class="<?php echo $halaman == 'beranda' ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('beranda');?>">Beranda</a>
                                            <span class="<?php echo $halaman == 'beranda' ? 'home' : '' ?>"></span>
                                        </li>
                                        <li class="<?php echo $halaman == 'profil' ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('profil');?>">Profil</a>
                                            <span class="<?php echo $halaman == 'profil' ? 'profile' : '' ?>"></span>
                                        </li>
                                        <li class="<?php echo $halaman == 'mapel' ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('mapel');?>">Mata Kuliah</a>
                                            <span class="<?php echo $halaman == 'mapel' ? 'mapel' : '' ?>"></span>
                                        </li>
                                        <li class="<?php echo $halaman == 'materi' ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('materi');?>">Materi</a>
                                            <span class="<?php echo $halaman == 'materi' ? 'materi' : '' ?>"></span>
                                        </li>
                                        <li class="<?php echo $halaman == 'rapor' ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('rapor'); ?>">Daftar Nilai</a>
                                            <span class="<?php echo $halaman == 'rapor' ? 'clue' : '' ?>"></span>
                                        </li>
                                    <?php } ?>
                                    <?php if($this->session->level == 9){ ?>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Data Master <span class="caret"></span></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="<?php echo base_url('dosen') ?>">Dosen</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="<?php echo base_url('kelas') ?>">Kelas</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="<?php echo base_url('mapel') ?>">Mata Kuliah</a>
                                                </li>
                                                <li class="divider"></li>
                                                <!--
                                                <li>
                                                    <a href="<php echo base_url('jadwal') ?>">Jadwal</a>
                                                </li>
                                                -->
                                            </ul>
                                        </li>
                                        <li class="<?php echo $halaman == 'catatan' ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('catatan');?>">Catatan</a>
                                            <span class="<?php echo $halaman == 'catatan' ? 'note' : '' ?>"></span>
                                        </li>
                                    <?php } ?>
                                        <li>
                                            <a href="<?php echo base_url('../auth/keluar')?>">Keluar</a>
                                        </li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="<?php echo base_url()?>">Selamat datang, <label class="label label-warning"><?php echo $this->session->userdata("username"); ?></label></a></li>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>