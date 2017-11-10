<section class="materi-siswa">
    <div class="container">
        <div class="row">
            <?php
                if(is_array($konten)){
                    foreach($konten as $konten){
                    ?>
            <div id="printpdf">
                <?php foreach($materi as $materi){ ?>
                <h2 class="text-center"><?php echo $materi['nama_materi']; ?></h3>
                <h3 class="text-center" id="submateri"><?php echo $materi['nama_submateri']; ?></h4>
                <?php } ?>
                <div class="form-reg">
                    <span class="label <?php echo ($konten['tipe'] == 'class') ? 'label-warning' : 'label-danger' ?>"><?php echo ucfirst($konten['tipe'])?> Activity</span>
                    <span class="label label-default">Mata Kuliah : <?php echo $materi['nama_mapel']; ?></span>
                </div>
                <div class="form-reg">
                    <!-- konten -->
                    <?php

                        $tipekonten = substr($konten['isi'],0,3);
                        $filename = "http://localhost/e-learning/upload/materi/".$konten['isi'];
                        if($tipekonten == "pdf"){       
                            ?>
                            <iframe src="http://localhost/e-learning/public/js/pdfjs/web/viewer.html?file=<?php echo $filename?>#zoom=page-auto"></iframe>
                            <?php
                        }
                        else if($tipekonten == "vid"){
                            //$filename =  realpath(dirname(__DIR__)."/../../materi".$data['konten']);
                            ?>
                            <div class="video-konten embed-responsive embed-responsive-16by9">
                                <video controls src="<?php echo $filename?>" class="embed-responsive-item">
                                    Browser Anda tidak mendukung Video Player HTML5.
                                </video> 
                            </div>
                            <?php
                        }
                        else {
                            echo $konten['isi'];
                        }?>
                </div>
            </div>
            <div class="form-reg modul-siswa">
                <a href="<?php echo base_url('materi/ubahkonten/').$konten['id']?>" class="btn btn-default action">Ubah Materi</a>
                <a href="<?php echo base_url('materi/hapuskonten/').$konten['id']?>" class="btn btn-default action">Hapus Materi</a>
            </div>
            <div role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Pedoman Penilaian</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Download Jawaban Latihan</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <h3 class="text-center">Instrumen Penilaian</h1>
                        <h4 class="text-center">Pendidikan Kepelatihan Olahraga</h1>
                        <p>Petunjuk :</p>
                        <ol>
                            <li>Buatlah format penilaian ini pada Document Editor.</li>
                            <li>Isikan sesuai dengan data yang ada.</li>
                            <li>Hitunglah nilai total yang dihasilkan dari tiap item aspek penilaian sesuai dengan prosedur penilaian.</li>
                            <li>Masukkan identitas mahasiswa, tabel penilaian, dan total nilai pada saat pengisian data <strong>Rapor</strong> sebagai bahan evaluasi mahasiswa.</li>
                        </ol>
                        <p>Nama : Alfian</p>
                        <p>Offering : A</p>
                        <p>NIM : 111212312</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Soal</th>
                                        <th>Nilai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1.</td>
                                        <td>Deskripsi soal</td>
                                        <td class="text-center">...</td>
                                        <td class="text-center">...</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2.</td>
                                        <td>Deskripsi soal</td>
                                        <td class="text-center">...</td>
                                        <td class="text-center">...</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Total Nilai</td>
                                        <td colspan="2">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>Prosedur Penilaian :</p>
                        <ol>
                            <li>Kolom soal berisi deskripsi soal yang ada pada masing-masing materi.</li>
                            <li>Kolom nilai berisi bobot nilai pada masing-masing item soal.</li>
                            <li>Rentang Bobot nilai yang dimasukkan adalah 0 - 100 (kelipatan 5).</li>
                            <li>Bobot nilai bisa berbeda-beda bergantung pada item soal.</li>
                            <li>Kolom keterangan berisi hal-hal yang perlu diperhatikan oleh mahasiswa pada item soal tersebut.</li>
                            <li>Total nilai didapatkan dari jumlah keseluruhan nilai pada item soal.</li>
                            <li>Kriteria Ketuntasan Minimum (KKM) adalah 75.</li>
                        </ol>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane active" id="profile">
                    <h3>Mahasiswa</h3>
                </div>
            </div>
            <div class="form-reg modul-siswa">
                <a href="#" type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-default">Komentar Disini</a>
            </div>
                        <?php
                            }
                            } else {
                                ?>
                                <label class="label label-danger">Data tidak ditemukan</label>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>