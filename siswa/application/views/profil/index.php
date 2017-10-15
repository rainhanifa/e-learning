<div class="container">
    <div class="row">
        <h1 class="reg-heading">Profil Siswa</h1>
    </div>
</div>

<section class="profil-siswa">
    <div class="container">
        <div class="row">
            <?php
                    if(is_array($profil)){
                        foreach($profil as $data){
            ?>
            <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
                <div class="img-profile">
                    <img src="<?php echo base_url('../upload/foto/siswa/').$data['foto']; ?>" alt="Foto Profil Siswa" class="img-responsive">
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
                        <label><?php echo $data['nama_siswa']; ?></label>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <label class="profil-head">Angkatan</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <span>:</span>
                        <label><?php echo $data['tahun_kelas']."/".($data['tahun_kelas']+1);?></label>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <label class="profil-head">Kelas</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <span>:</span>
                        <label><?php echo $data['nama_kelas'];?></label>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <label class="profil-head">NIM</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <span>:</span>
                        <label><?php echo $data['nim']; ?></label>
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
                <div class="row">
                    <div class="form-reg">
                        <a href="<?php echo base_url('profil/ubah')?>" class="btn btn-default">Ubah</a>
                    </div>
                </div>
            </div>
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