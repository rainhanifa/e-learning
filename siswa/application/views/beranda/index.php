<section class="student-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12 left-content">
                <h3>Petunjuk</h3>
                <ol>
                    <li>Berdo’alah sebelum mengerjakan perintah kerja pada materi.</li>
                    <li>Bacalah perintah kerja yang ada pada materi dengan seksama.</li>
                    <li>Kerjakan latihan pada materi secara individu.</li>
                    <li>Tanyakan kepada Dosen jika ada hal yang tidak dimengerti melalui kolom komentar yang tersedia pada masing-masing materi.</li>
                    <li>Sebelum menyelesaikan suatu materi/submateri, siswa <strong>tidak dapat belajar</strong> materi/submateri selanjutnya.</li>
                    <li>Setiap selesai mengerjakan tugas pada materi lab activity, <strong>upload</strong>  tugas &amp; laporan dalam bentuk file .rar </li>
                    <li>Suatu submateri dianggap selesai jika siswa <strong>telah mendapatkan nilai</strong> class dan lab activity memenuhi Kriteria Ketuntasan Minimal (75).</li>
                    <li>Progress akan bertambah apabila submateri yang telah dikerjakan (class dan lab) memenuhi KKM. </li>
                </ol>
                <hr>
                <h6>Progress</h6>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $hasilprogress; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $hasilprogress; ?>%;">
                        <?php echo $hasilprogress; ?>&#37;
                    </div>
                </div>

                <div class="form-reg">
                    <a href="<?php echo base_url('materi')?>" class="btn btn-default"><?php echo ($hasilprogress > 0) ? 'Lanjutkan' : 'Mulai'; ?></a>
                </div>
            </div>

            <!-- RIGHT CONTENT -->
            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 right-content">
                <div class="header-listmateri text-center">
                    <h6>Daftar Materi</h6>
                </div>
                <div class="body-listmateri">
                       <ul class="detail-listmateri">
                           <!-- Mengecek materi apakah materi tersebut sedang dalam pengerjaan atau tidak -->
                           <?php foreach($materi as $materi){?>
                           <li>
                               <p><?php echo $materi['nama_materi']?></p>
                               <ul>
                                    <?php
                                        $submateri = getSubMateri($materi['id_materi']);
                                        foreach($submateri as $submateri){
                                            $status = get_progress_submateri($submateri['id']);
                                    ?>
                                    <li <?php
                                            if ($status == 'OK'){
                                                echo 'class="finish"';
                                            }
                                            else{
                                                if ($status == 'Proses'){
                                                    echo 'class="active"';
                                                }
                                            } ?>
                                    >
                                        <?php echo $submateri['nama']; ?>
                                        <?php
                                        if ($status == 'OK'){
                                            echo '<span class="check"></span>';
                                        }
                                        else{
                                            if ($status == 'Proses'){
                                                echo '<span class="time"></span>';
                                            }
                                        }
                                     } ?>
                                    </li>
                               </ul>
                           </li>
                           <?php } ?>
                       </ul>

                    <!-- 
                        <ul class="detail-listmateri">
                            <!-- Materi selanjutnya 
                            <li>
                                <p><a href="index.php">NEXT MATERI</a></p>
                            </li>
                            <!-- Materi yang sudah selesai 
                                <ul>
                                    <li class="finish">
                                        <p>
                                            <a href="index.php?p=me&sm=&cm=class">
                                                MATERI SUDAH SELESAI (LULUS)
                                            </a>
                                        </p>
                                        <span class="check"></span> 
                                    </li>
                                </ul>
                            <!-- Materi yang sedang dalam proses pengerjaan dimana salah satu sudah selesai dikerjakan    
                                    <li class="active">
                                        <p>
                                            <a href="index.php?p=me&sm=&cm=">
                                                SUBMATERI YANG SEBAGIAN SUDAH SELESAI
                                            </a>
                                        </p>
                                        <span class="time"></span>
                                    </li>
                                         
                            <!-- Materi yang belum sama sekali dikerjakan 
                                <ul>
                                    <li class="notfinish"><p>SUBMATERI BELUM SELESAI</p></li>
                                </ul>
                       
                       <!-- SUDAH SEMUA
                        <ul class="detail-listmateri">
                            
                            <li>
                                <p>JUDUL MATERI SUDAH SEMUA</p>
                                <ul>
                           
                            <!-- Semua submateri selesai 
                            <li>
                                <p>
                                    <a href="index.php">
                                        SUB MATERI SUDAH SEMUA
                                </p>
                                <span class="check"></span>
                            </li>
                            <!-- Semua submateri selesai
                            <li>SUBMATERI SUDAH SEMUA</li>
                        
                                </ul>
                            </li>
                        </ul>
                        <ul class="detail-listmateri">
                            <!-- Materi belum dibuat 
                            <li>
                                <p><label class="label label-danger">Data materi belum ada/tidak ditemukan</label></p>
                            </li>
                        </ul>
                        -->
                </div>
            </div>
        </div>
    </div>
</section>