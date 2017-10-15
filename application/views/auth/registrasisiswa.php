        <div class="bg-reg">
            <div class="container">
                <div class="row">
                    <h1 class="reg-heading"> Form Pendaftaran Siswa</h1>
                </div>
            </div>
        </div>
        
        <section class="form-reg">
            <div class="container">
                <form name="registrasi" id="registrasi" method="post" action="<?php echo base_url('auth/doregistrasisiswa')?>" enctype="multipart/form-data" class="form-group" role="form">
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
                            <label for="pengguna" class="control-label">Nama Pengguna (username untuk login)</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                            <input type="text" name="pengguna" class="form-control" id="pengguna" value="">
                            <label class="clues">Contoh: Ibnu1993</label>
                        </div>
                    </div>
                    <div class="row item-reg">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label for="nama" class="control-label">Nama Lengkap</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                            <input type="text" name="namasiswa" class="form-control" id="nama" value="">
                            <label class="clues">Contoh: Ibnu Shodiqin</label>
                        </div>
                    </div>
                    <div class="row item-reg">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label for="kelas" class="control-label">Offering</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                            <select name="siswakelas" class="form-control">
                                    <?php foreach($kelas as $kelas) { ?>
                                    <option value="<?php echo $kelas['id']?>"><?php echo $kelas['nama']." (".$kelas['tahun']."/".($kelas['tahun']+1).")"; ?></option>
                                    <?php } ?>
                                </select>
                            </select>
                            <label class="clues">Pilih sesuai dengan kelas anda</label>
                        </div>
                    </div>
                    <div class="row item-reg">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label for="absen" class="control-label">NIM</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                            <input type="text" name="absen" class="form-control" id="absen" value="">
                            <label class="clues">Contoh: 1105335430633</label>
                        </div>
                    </div>
                    <div class="row item-reg">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label for="mail" class="control-label">Email</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                            <input type="text" name="mailsiswa" class="form-control" id="mail" value="">
                            <label class="clues">Contoh: ibnuspeedster@gmail.com</label>
                        </div>
                    </div>
                    <div class="row item-reg">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label for="profil" class="control-label">Foto Profil</label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12 foto-profil">
                            <input name="profilsiswa" type="file" class="custom-file-input">
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