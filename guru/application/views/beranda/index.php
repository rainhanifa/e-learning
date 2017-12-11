<div class="container">
    <div class="row reg-heading">
        <h1 class="text-center">Petunjuk</h1>
    </div>
</div>

<section class="form-cari">
    <div class="container">
        <div class="row">
            <ol>
                <li>Lakukan pengecekan setiap satu minggu sekali pada progress belajar mahasiswa.</li>
                <li>Segera tanggapi pertanyaan atau pernyataan siswa yang ada pada kolom komentar pada masing-masing modul.</li>
                <li>Download hasil pengerjaan tugas siswa pada masing-masing modul.</li>
                <li>Perhatikan pedoman penilaian dalam melakukan proses penilaian.</li>
                <li>Pedoman penilaian tersedia pada masing-masing modul.</li>
            </ol>
        </div>
        <hr>
    </div>
</section>

<section>
    <div class="container">
        <div class="row reg-heading">
            <!-- <php 
                $kelas  = backgurucode::kelas($user);
                if($kelas == 'xirpla'){
                    $guru_kelas = 'Off A';
                } else if($kelas == 'xirplb'){
                    $guru_kelas = 'Off B';
                } else if($kelas == 'xirplc'){
                    $guru_kelas = 'Off C';
                } else {
                    $guru_kelas = '';
                }
            ?> -->
            <h1 class="text-center">Data Progress Belajar <!-- Siswa Kelas <php echo $guru_kelas;?> --></h1>
        </div>
        <!--
        <div class="row form-cari">
            <form name="cari_siswa" id="cari_siswa" method="post" action="index.php?p=carisiswa" role="form" class="form-group">
                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                    <select name="type" form="cari_siswa" class="form-control">
                        <option value="">--- Kategori Pencarian ---</option>
                        <option value="nama_siswa">Nama</option>
                        <option value="materi">Materi</option>
                        <option value="no_absen">NIM</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                    <input type="text" name="searchid" value="" placeholder="Kata Kunci Pencarian" class="form-control">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <input type="submit" value="Cari" class="btn btn-default action">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                    <a href="index.php?p=beranda" class="btn btn-default action">Tampilkan Semua</a>
                </div>
            </form>
        </div>
        -->
    </div>
</section>

<section>
    <div class="container">
        <?php
            $url_siswa = base_url()."../upload/foto/siswa/";
//            $url_siswa = "http://localhost/e_pko/epsettings/siswa/";
            //$url_siswa = "http://".$_SERVER["HTTP_HOST"]."/e_pko/epsettings/siswa/";
            if($daftarsiswa<>''){
                if(is_array($daftarsiswa)){
                    foreach($daftarsiswa as $data){
        ?>        
        <div id="box-6" class="box">
            <div class="progress-box">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="img-box">
                            <img src="<?php echo $url_siswa.$data['foto_siswa']; ?>" alt="Foto Profil Siswa" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
                        <p>
                            Nama : <?php echo $data['nama_siswa']; ?> <br>
                            Mata Kuliah:
                        </p>
                        <?php
                            $makul  =   get_progress("mata_pelajaran.id, mata_pelajaran.nama", "mata_pelajaran.id", "siswa_id =".$data['id_siswa']);
                            
                            if($makul<>''){
                        ?>
                        <ol>
                        <?php
                                foreach($makul as $makul){
                                    echo "<li>".$makul['nama'];
                                    $keterangan = "";

                                    $submateri = get_progress("materi.nama as nama_materi, submateri.id as id_submateri, submateri.nama as nama_submateri", "submateri.id", "siswa_id =".$data['id_siswa']);
                                    if($submateri){
                                        echo "<ul>";
                                        foreach ($submateri as $submateri) {
                        ?>
                                            <li><?php echo $submateri['nama_materi']." (".$submateri['nama_submateri'].")"; ?></li>
                        <?php
                                        }
                                        echo "</ul>";
                                    }
                                    echo "</li>";
                            }
                        ?>
                        </ol>
                        <?php
                            } else {
                        ?>
                        <label class="label label-danger">Siswa belum mengerjakan materi apapun</label>
                        <?php
                            }
                        ?>
                    </div>
                    <!-- <span class="scale-caption icon-zoom"><php echo $data['no_absen']; ?></span>
                    <span class="caption icon-zoom"><php echo $data['no_absen']; ?></span>-->
                </div>
            </div>
        </div>
        <?php
                    }
                }
            } else {
                ?>
                    <div class="item-reg">
                        <label class="label label-danger" style="color:white;">Data tidak ditemukan</label>
                    </div>
                <?php
            }
        ?>
    </div>
</section>