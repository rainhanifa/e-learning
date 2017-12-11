<div class="container">
    <div class="row">
        <h1 class="reg-heading">Form Ubah Profil Siswa</h1>
    </div>
</div>

<section>
    <div class="container">
        <div class="row reg-heading head2"><?php
                if($this->session->flashdata("message") != ''){
                    echo $this->session->flashdata("message");
                }
            ?>
            <h3>Petunjuk</h3>
            <ol>
                <li>Isi sesuai dengan data anda.</li>
                <li>Abaikan data yang tersedia pada field jika tidak ingin mengganti.</li>
                <li>Abaikan tombol upload foto jika tidak ingin mengganti foto profil.</li>
                <li>Abaikan field kata kunci dan ulangi kata kunci jika tidak ingin mengganti kata kunci.</li>
                <li>Jika mengganti kata kunci, data antara field kata kunci dengan ulangi kata kunci harus sama.</li>
            </ol>  
        </div>
    </div>
</section>

<?php
        if(is_array($profil)){
            foreach($profil as $data){
?>
<section class="form-reg">
    <div class="container">
        <form class="form-group" role="form" name="formedprofil" id="formedprofil" action="<?php echo base_url('profil/doubah')?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?php echo $this->session->userdata('username'); ?>">
            <input type="hidden" name="id" value="<?php echo $data['id_siswa']; ?>">
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="nama" class="control-label">Nama Lengkap</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $data['nama_siswa']; ?>">
                    <label class="clues">Contoh: Ibnu Shodiqin</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="absen" class="control-label">NIM</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="number" name="absen" class="form-control" id="absen" value="<?php echo $data['nim']; ?>">
                    <label class="clues">Contoh: 1105335430633</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="kelas" class="control-label">Kelas</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <select name="kelas" class="form-control" id="kelas">
                        <?php foreach($kelas as $kelas){ ?>
                            <option value="<?php $kelas['id']?>" <?php ($data['id_kelas'] == $kelas['id']) ? 'selected' : ''?>><?php echo $kelas['nama']?></option>
                        <?php } ?>
                    </select>
                    <label class="clues">Pilih sesuai dengan kelas anda</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="mail" class="control-label">Email</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="email" name="mail" class="form-control" id="mail" value="<?php echo $data['email']; ?>">
                    <label class="clues">Contoh: ibnuspeedster@gmail.com</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="profil" class="control-label">Foto Profil</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 foto-profil">
                    <div class="pp-edit img-circle">
                        <img src="<?php echo base_url('../upload/foto/siswa/').$data['foto']; ?>" alt="Foto Profil Siswa" class="img-responsive">
                    </div>
                    <input name="profil" type="file" class="custom-file-input">
                    <label class="clues">Foto setengah badan dan wajib menggunakan seragam dengan rapi</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="kunci" class="control-label">Kata Kunci</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="password" name="kunci" class="form-control" id="kunci" value="">
                    <label class="clues">Silahkan masukkan password yang mudah diingat</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="ulangi_kunci" class="control-label">Ulangi Kata Kunci</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="password" name="ulangi_kunci" class="form-control" id="ulangi_kunci" value="">
                    <label class="clues">Ulangi pengisian password</label>
                </div>
            </div>
            <div class="col-md-offset-3">
                <input type="submit" name="finish_reg" value="Selesai" class="btn btn-default">
            </div>
        </form>
    </div>
</section>
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