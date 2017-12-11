<html>
    <head>
        <?php $halaman = ucfirst($this->router->fetch_class()); ?>
        <title> <?php echo $halaman ?> Mahasiswa </title>
        
        <!-- Meta Tags -->
        <meta charset="UTF-8">
        <meta name="description" content="E-Learning Pendidikan Kepelatihan Olahraga">
        <meta name="keywords" content="Tenis, Sepakbola, Kepelatihan, Pendidikan">
        <meta name="author" content="Tim Fakultas Ilmu Keolahragaan">
        <meta name="viewport" content="width=device-width">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
        <!-- CSS -->

        <base href="http://<?php echo $_SERVER['HTTP_HOST'];?>/e-learning/siswa">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/')?>bootstrap.css"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/')?>style.css"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/')?>siswa.css"/>

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
                                        <li class="<?php echo $halaman == 'beranda' ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('beranda');?>">Beranda</a>
                                            <span class="<?php echo $halaman == 'beranda' ? 'home' : '' ?>"></span>
                                        </li>
                                        <li class="<?php echo $halaman == 'profil' ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('profil');?>">Profil</a>
                                            <span class="<?php echo $halaman == 'profil' ? 'profile' : '' ?>"></span>
                                        </li>
                                        <li class="<?php echo $halaman == 'materi' ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('materi');?>">Materi</a>
                                            <span class="<?php echo $halaman == 'materi' ? 'materi' : '' ?>"></span>
                                        </li>
                                        <li class="<?php echo $halaman == 'rapor' ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('rapor'); ?>">Rapor</a>
                                            <span class="<?php echo $halaman == 'rapor' ? 'clue' : '' ?>"></span>
                                        </li>
                                        <!--
                                        <li class="<?php echo $halaman == 'catatan' ? 'active' : '' ?>">
                                            <a href="<?php echo base_url('catatan');?>">Catatan</a>
                                            <span class="<?php echo $halaman == 'catatan' ? 'note' : '' ?>"></span>
                                        </li>
                                        -->
                                        <li>
                                            <a href="<?php echo base_url('beranda/unset_mapel')?>">Ganti Mata Kuliah</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('../auth/keluar')?>">Keluar</a>
                                        </li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="#">Selamat datang, <label class="label label-warning"><?php echo $this->session->userdata("username"); ?></label></a></li>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>
        </header>