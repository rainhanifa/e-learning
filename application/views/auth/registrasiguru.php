<div class="bg-reg">
    <div class="container">
        <div class="row">
            <h1 class="reg-heading"> Form Pendaftaran Dosen</h1> 
        </div>
    </div>
</div>

<section class="form-reg">
    <div class="container">
        <form name="registrasi" id="registrasi" method="post" action="<?php echo base_url('auth/doregistrasiguru')?>" enctype="multipart/form-data" class="form-group" role="form">
            <div class="row item-reg">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                        if($this->session->flashdata("error") != ""){
                             echo "<label class='label label-danger' style='color:white;'>".$this->session->flashdata("error")."</label>";
                        }
                    ?>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="pengguna" class="control-label">Nama Pengguna (digunakan untuk login)</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="text" id="pengguna" name="pengguna" class="form-control" value="">
                    <label class="clues">Contoh: Ibnu1993.</label>
                    <label class="clues">Harap diingat nama pengguna ini karena anda tidak dapat menggantinya di form ubah profil.</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="nama" class="control-label">Nama Lengkap</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="text" id="nama" name="nama" class="form-control" value="">
                    <label class="clues">Contoh: Ibnu Shodiqin</label>
                </div>
            </div>
            <!-- <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="guru" class="control-label">Dosen Offering</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <select name="gurukelas" id="guru_kelas" class="form-control">
                        <php foreach($kelas as $kelas) { ?>
                        <option value="<php echo $kelas['id']?>"><php echo $kelas['nama']." (".$kelas['tahun']."/".($kelas['tahun']+1).")"; ?></option>
                        <php } ?>
                    </select>
                    <label class="clues">Pilih sesuai dengan kelas tempat anda mengajar</label>
                </div>
            </div> -->
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="nip" class="control-label">NIP</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="text" name="nip" id="nip" class="form-control" value="">
                    <label class="clues">Contoh: 19650508 199701 1 0038</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="mail" class="control-label">Email</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="text" name="mail" class="form-control" id="mail" value="">
                    <label class="clues">Contoh: ibnuspeedster@gmail.com</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="mail" class="control-label">Foto Profil</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 foto-profil">
                    <input name="profil" id="profil" type="file" class="custom-file-input">
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
                    <label for="ulangikunci" class="control-label">Ulangi Kata Kunci</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <input type="password" name="ulangikunci" class="form-control" id="ulangi_kunci" value="">
                    <label class="clues">Ulangi pengisian password</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="ulangikunci" class="control-label">Captcha</label>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <label class="control-label" id="captchaOperation"></label>
                    <input type="text" class="form-control" name="captcha"/>
                    <label class="clues">Masukkan jawaban pada field diatas untuk membuktikan anda bukan robot.</label>
                </div>
            </div>
            <div class="col-md-offset-3">
                <input type="submit" name="finish_reg" value="Selesai" class="btn btn-default action">
            </div>
        </form>
    </div>
</section>