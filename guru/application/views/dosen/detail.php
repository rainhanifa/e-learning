<div class="container">
    <div class="row">
        <h1 class="reg-heading">Profil Dosen</h1>
    </div>
</div>

<section class="profil-guru">
    <div class="container">
        <div class="row">
            <?php
                    if(is_array($dosen)){
                        foreach($dosen as $data){
            ?>
            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                <div class="img-profile">
                    <img src="<?php echo base_url('../upload/foto/guru/').$data['foto']; ?>" alt="Foto Profil Dosen" class="img-responsive">
                </div>
            </div>
            <div class="col-lg-10 col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <label class="profil-head">Nama Pengguna</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <span>:</span>
                        <label><?php echo $data['username']; ?></label>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <label class="profil-head">Nama Lengkap</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <span>:</span>
                        <label><?php echo $data['nama_guru']; ?></label>
                    </div>
                    <hr>
                </div>
                
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <label class="profil-head">NIP</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <span>:</span>
                        <label><?php echo $data['nip']; ?></label>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <label class="profil-head">Email</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <span>:</span>
                        <label><?php echo $data['email']; ?></label>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row">
            <h1>Mata Pelajaran</h1>
            <?php
        if(is_array($mapel)){
            ?>

                <table class="table table-border text-center">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Mata Pelajaran</th>
                        <th class="text-center">Kelas</th>
                    </tr>
            <?php
                    $no = 1;
                    foreach($mapel as $data){
            ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $data['nama_mapel']?></td>
                        <td>
                        <?php
                            $kelas = getKelasMapel($data['id_mapel']);
                            if(is_array($kelas)){
                                echo "<ul>";
                                foreach($kelas as $kelas){
                                    ?>
                                    <li><a href="<?php echo base_url('kelas/detail/').$kelas['id_kelas']; ?>"><?php echo $kelas['nama_kelas']; ?></a></li>
                                    <?php
                                }

                                echo "</ul>";
                            }
                        ?>
                        </td>
                    </tr>
        <?php           } ?>
                </table>          
        </div>
        <?php
                } else {
        ?>
                    <div class="container">
                        <div class="row materi-msg">
                            <div class="item-reg text-center">
                                    <label class="label label-danger" style="color:white;">Data tidak ditemukan</label>
                            </div>
                        </div>
                    </div>
        <?php        
                }
        ?>
        </div>
        <?php
                        }
                } else {
        ?>
                    <div class="container">
                        <div class="row materi-msg">
                            <div class="item-reg text-center">
                                    <label class="label label-danger" style="color:white;">Data tidak ditemukan</label>
                            </div>
                        </div>
                    </div>
        <?php        
                }
        ?>
    </div>
</section>