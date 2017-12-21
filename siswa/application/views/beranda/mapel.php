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
    <section class="form-log">
        <div class="container">
            <div class="row">
                
                <form name="login" id="login" class="form-group form-login" role="form">
                    <p  class="text-center" style='color:white;'>Halo, <span class="label label-warning"><?php echo $this->session->userdata('username')?></span></p>
                    <h3 class="text-center" style='color:white;'>Silakan Pilih Mata Kuliah </h3>
                    <hr/>
                    <?php foreach ($mapel as $mapel) { ?>
                    <div class="row">
                        <h4><a class="label label-success" href="<?php echo base_url('beranda/mapel/').$mapel['id_mapel']?>"><?php echo $mapel['nama_mapel']?></a></h4>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </section>
    </body>
    </html>