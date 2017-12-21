<section class="materi-siswa">
    <div class="container">
        <div class="row">
            <?php
                if($this->session->flashdata("message") != ''){
                    echo $this->session->flashdata("message");
                }

                if($konten){
                    foreach($konten as $konten){
                    ?>
            <div id="printpdf">
                <h2 class="text-center"><?php echo $konten['nama_materi']; ?></h3>
                <h3 class="text-center" id="submateri"><?php echo $konten['nama_submateri']; ?></h4>
                <div class="form-reg">
                    <span class="label <?php echo ($konten['tipe'] == 'class') ? 'label-warning' : 'label-danger' ?>"><?php echo ucfirst($konten['tipe'])?> Activity</span>
                    <span class="label label-default">Mata Kuliah : <?php echo $konten['nama_mapel']; ?></span>
                    <span class="label label-success">Dosen : <?php echo $konten['nama_dosen']; ?></span>
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
                <?php
                    // SET CURRENT PROGRESS IF THIS IS NEW ACTIVITY
                            $current    = get_current_materi();
                            if($current != $konten['id_submateri']){
                                // get id submateri
                                set_progress($konten['id_submateri'],'', '', 0);
                            }
                ?>
            </div>
            <div class="class">
                <label class="clues">Upload file tugas dalam bentuk <strong>.zip</strong> dengan nama file nama_jenismateri_submateri (contoh: ibnu_class_carakerjaaplikasiwebberbasisserver.zip)</label>
                <label class="clues">Klik tombol <strong>Upload File Tugas</strong>, lalu Klik OK</label>
                <form name="formup" id="formup" method="post" action="<?php echo base_url('materi/upload_tugas')?>" enctype="multipart/form-data">
                    <input type="hidden" name="submateri" value="<?php echo $konten['id_submateri']; ?>">
                    <input type="hidden" name="kontenmateri" value="<?php echo $konten['id_konten']; ?>">
                    <input type="hidden" name="tipekonten" value="<?php echo $konten['tipe']; ?>">
                    <input type="file" name="uptugas" id="uptugas" class="custom-file-input" value="">
                    <div class="form-reg finish">
                        <input type="submit" name="finish_reg" value="OK" class="btn btn-default act">
                    </div>
                    <hr>
                </form>
            </div>
            <div class="form-reg modul-siswa">
                <!-- NEW LINK -->
                    <?php if($prev != ''){ ?>
                    <a href="<?php echo base_url('materi/activity/'.$prev)?>" class="btn btn-default">Materi Sebelumnya</a>
                    <?php }
                          if($next != ''){ ?>
                    <a href="<?php echo base_url('materi/activity/'.$next)?>" class="btn btn-default">Materi Berikutnya</a>
                    <?php } ?>
                <?php if($tipekonten == "pdf" || $tipekonten == "vid" ) {
                            echo'<a href="'.$filename.'" class="btn btn-default">Download Materi</a>';
                        }
                        else{
                ?>
                            <a href="<?php echo base_url('materi/print_materi/').$konten['id_konten']?>"" id="print" class="btn btn-default">Download Materi</a>
                <?php
                        }
                ?>
                <a href="#" type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-default">Komentar</a>
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
                            <p class="judul-materi">Kesulitan? Saran? Ajukan melalui form komentar!</p>
                            <!-- <input type="hidden" name="kategori" id="kategori" value="cm">
                            <input type="hidden" name="user" id="user" value="<php echo $_SESSION['user']; ?>">
                            -->
                            <label for="subyek" class="control-label">Subjek</label>
                                <input type="text" name="subyek" id="subyek" value="" class="form-control">
                            <label for="komentar" class="control-label">Komentar</label>
                                <textarea id="komentar" name="komentar" class="form-control"></textarea>
                            <label class="control-label" id="captchaOperation"></label>
                                <input type="text" class="form-control" name="captcha"/>
                            <input type="hidden" name="kontenmateri" id="kontenmateri" value="<?php echo $konten['id_konten']?>"> 
                            <input type="submit" name="kirim" value="Kirim" class="btn btn-default action send">
                        </form>

                        <!-- DAFTAR KOMENTAR -->
                        <?php
                            $komentar = getKomentar($konten['id_konten']);

                            if(is_array($komentar)){
                                foreach ($komentar as $data) {
                        ?>
                        <div class="comment-list">
                            <p><b><?php echo date("d F Y H:i", strtotime($data['tanggal'])); ?></b>, <b><?php echo getNama($data['user_id'], $data['level']) ?></b> mengatakan :</p>
                            <p><?php echo $data['deskripsi']?></p>
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
                    </div>
                </div>
            </div>
            <?php
                    } // end fetching konten
                } // end if konten exist
                else{
                    // data tidak ada
            ?>
                <label class="label label-danger">Materi belum tersedia</label>
            <?php
                }
            ?>
            </div>
        </div>
    </div>
</section>