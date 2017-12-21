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
                        $direktori = base_url('../upload/materi/');
                        $filename = $direktori.$konten['isi'];
                        if($tipekonten == "pdf"){       
                            ?>
                            <div class="video-konten embed-responsive embed-responsive-16by9">
                                <iframe src="<?php echo base_url('../assets/js/pdfjs/web/')?>viewer.html?file=<?php echo $filename?>#zoom=page-auto"></iframe>
                            </div>
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
                        <h3 class="text-center">Instrumen Penilaian Praktikum</h1>
                        <h4 class="text-center">Pendidikan Kepelatihan Olahraga Web Dinamis</h1>
                        <p>Petunjuk :</p>
                        <ol>
                            <li>Buatlah format penilaian ini pada Document Editor.</li>
                            <li>Isikan sesuai dengan data yang ada.</li>
                            <li>Berikan tanda centang (√) pada kolom keterangan sesuai dengan aspek yang dinilai.</li>
                            <li>Hitunglah nilai total yang dihasilkan dari tiap item aspek penilaian sesuai dengan prosedur penilaian.</li>
                            <li>Masukkan identitas mahasiswa, tabel penilaian, dan total nilai pada saat pengisian data <strong>Rapor</strong> sebagai bahan evaluasi mahasiswa.</li>
                        </ol>
                        <p>Nama : Alfian</p>
                        <p>Offering : A</p>
                        <p>NIM : 1234234234</p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th rowspan="2">No.</th>
                                        <th rowspan="2">Aspek Yang Dinilai</th>
                                        <th rowspan="2">Catatan</th>
                                        <th colspan="2">Keterangan</th>
                                    </tr>
                                    <tr>
                                        <th>Ya</td>
                                        <th>Tidak</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1.</td>
                                        <td>Program berjalan dengan baik (tanpa terjadi error)</td>
                                        <td class="text-center">...</td>
                                        <td class="text-center">...</td>
                                        <td class="text-center">...</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2.</td>
                                        <td>Konsep program sesuai dengan perintah penugasan.</td>
                                        <td class="text-center">...</td>
                                        <td class="text-center">...</td>
                                        <td class="text-center">...</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3.</td>
                                        <td>Keluaran yang dihasilkan program sesuai dengan perintah penugasan.</td>
                                        <td class="text-center">...</td>
                                        <td class="text-center">...</td>
                                        <td class="text-center">...</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">4.</td>
                                        <td>Terdapat kreativitas dalam format tampilan program.</td>
                                        <td class="text-center">...</td>
                                        <td class="text-center">...</td>
                                        <td class="text-center">...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>Total Nilai : 0</p>
                        <p>Prosedur Penilaian :</p>
                        <ol>
                            <li>Aspek penilaian 1 memiliki total nilai 20, jika program berjalan tanpa kesalahan.</li>
                            <li>Aspek penilaian 2 memiliki total nilai 30, jika konsep program sesuai dengan perintah penugasan.</li>
                            <li>Aspek penilaian 3 memiliki total nilai 30, jika keluaran yang dihasilkan program sesuai dengan perintah penugasan.</li>
                            <li>Aspek penilaian 4 memiliki total nilai 20, jika terdapat kreativitas dalam bentuk format tampilan, validasi inputan, atau hal-hal lain yang berada diluar perintah penugasan namun menjadi fasilitas yang seharusnya ada dalam program.</li>
                            <li>Kriteria Ketuntasan Minimum adalah 75.</li>
                        </ol>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="siswa-selesai">
                            <span class="judul-materi">Daftar Nama mahasiswa yang Sudah Menyelesaikan Modul Ini</span>
                            <label class="clues">(Klik pada nama untuk download)</label>
                            <?php
                                // helper to get list siswa yang sudah upload tugas untuk mapel ini // per kelas
                                // $kelas      = backgurucode::kelas($_SESSION['user']);
                                // $finish     = backgurucode::dtraporsiswa($title['idmateri'], $kelas);
                                $tugas_siswa    =   getTugasSiswa($konten['id']);
                                $nofin      = 1;

                                // jika terdapat tugas
                                if(is_array($tugas_siswa)){
                                    foreach($tugas_siswa as $tugas){
                            ?>
                            <p>
                                <label class="label label-info"><?php echo $nofin; ?></label> 
                                <a href="<?php echo base_url('../upload/tugas/').$tugas['file_tugas']; ?>" id="<?php echo $nofin; ?>" onclick="getname(<?php echo $nofin; ?>)"><?php echo $tugas['nama_siswa']; ?></a>
                            </p>
                            <?php
                                        $nofin++;
                                    }
                                } else {
                                    ?>
                                    <p>
                                        <label class="label label-danger">Belum ada mahasiswa yang mengupload tugas</label>
                                    </p>
                                    <?php    
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-reg modul-siswa">
                <a href="#" type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-default">Komentar Disini</a>
            </div>
            <!-- Modal Dialog -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalLabel">Komentar</h4>
                        </div>
                        <!-- ISI KOMENTAR -->
                        <form name="formkomentar" id="formkomentar" method="post" action="<?php echo base_url('materi/komentar')?>" role="form" class="form-group form-comment">
                            <p class="judul-materi">Berikan tanggapan untuk komentar mahasiswa pada materi ini!</p>
                            <!-- <input type="hidden" name="kategori" id="kategori" value="cm">
                            <input type="hidden" name="user" id="user" value="<php echo $_SESSION['user']; ?>">
                            -->
                            <label for="subyek" class="control-label">Subjek</label>
                                <input type="text" name="subyek" id="subyek" value="" class="form-control">
                            <label for="komentar" class="control-label">Komentar</label>
                                <textarea id="komentar" name="komentar" class="form-control"></textarea>
                            <label class="control-label" id="captchaOperation"></label>
                                <input type="text" class="form-control" name="captcha"/>
                            <input type="hidden" name="kontenmateri" id="kontenmateri" value="<?php echo $konten['id']?>"> 
                            <input type="submit" name="kirim" value="Kirim" class="btn btn-default action send">
                        </form>

                        <!-- DAFTAR KOMENTAR -->
                        <?php
                            $komentar = getKomentar($konten['id']);

                            if(is_array($komentar)){
                                foreach ($komentar as $komentar) {
                        ?>
                        <div class="comment-list">
                            <p><b><?php echo date("d F Y H:i", strtotime($komentar['tanggal'])); ?></b>, <b><?php echo getNama($komentar['user_id'], $komentar['level']) ?></b> mengatakan :</p>
                            <p><?php echo $komentar['deskripsi']?></p>
                        </div>
                        <?php 
                                }
                            }
                            else{
                                ?>
                                <label class="label label-danger">Data tidak ditemukan</label>
                                <?php
                            }
                        ?>
                        
                        <!-- JIKA TIDAK ADA -->
                        <!--  -->
                    </div>
                </div>
            </div>
                        <?php
                            }
                            } // end if konten exist
                        ?>
            </div>
        </div>
    </div>
</section>