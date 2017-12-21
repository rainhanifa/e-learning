<div class="container">
    <div class="row">
        <h1 class="reg-heading">Form Ubah Konten Materi</h1>
    </div>
</div>

<section>
    <div class="container">
        <div class="row reg-heading head2">
            <h3>Petunjuk</h3>
            <ol>
                <li>Isi form dibawah ini sesuai dengan data konten materi.</li>
                <li>Field submateri akan tampil menyesuaikan dengan pilihan pada field materi.</li>
                <li>Jika field submateri belum muncul data setelah memilih materi, harap menunggu sejenak.</li>
                <li>Untuk konten dalam bentuk teks, masukkan pada field <b>Isi Materi</b>.</li>
                <li>Untuk konten dalam bentuk e-book (*.pdf) atau video, masukkan pada field <b>Upload Materi</b>.</li>
            </ol>
        </div>
    </div>
</section>

<section class="form-reg">
    <div class="container">
        <?php foreach($konten as $konten) { ?>
        <form name="formtmkonten" id="formtmkonten" method="post" action="<?php echo base_url('materi/doTambahKonten') ?>" enctype="multipart/form-data" class="form-group" role="form">
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="submateri" class="control-label">Sub Materi</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <select name="submateri" class="form-control" id="submateri">
                            <option value="<?php echo $konten['submateri_id']?>" selected><?php echo getSubMateriNama($konten['submateri_id'])?>
                            </option>
                    </select>
                    <label class="clues">Pilih salah satu submateri</label>
                </div>
            </div>
            
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="kategori" class="control-label">Kategori</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <select name="kategori" class="form-control" id="kategori">
                        <option value="class" <?php ($konten['tipe'] == 'class') ? 'selected' : '' ?> autocomplete="off">Class Activity</option>
                        <option value="lab" <?php ($konten['tipe'] == 'lab') ? 'selected' : '' ?> autocomplete="off">Lab Activity</option>
                    </select>
                    <label class="clues">Pilih kategori sesuai dengan modul yang dibuat</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="isimateri" class="control-label">Isi Materi</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <?php
                        $tipekonten = substr($konten['isi'],0,3);
                        $filename = "http://localhost/e-learning/upload/materi/".$konten['isi'];
                        if($tipekonten == "pdf"){       
                            ?>
                            <iframe src="http://localhost/e-learning/public/js/pdfjs/web/viewer.html?file=<?php echo $filename?>#zoom=page-auto"></iframe>
                            <br/>
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
                            <br/>
                            <?php
                        }
                        ?>
                            <!-- FIELD INPUT -->
                            <textarea name="isimateri" id="isimateri" rows="20">
                            <?php echo ($tipekonten != 'pdf' && $tipekonten != 'vid') ? $konten['isi'] : '' ;?>
                            </textarea>
                            <label class="clues">Silahkan masukkan materi untuk modul anda (teks, gambar)</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="filemateri" class="control-label">Upload Materi</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <input type="file" name="filemateri" id="filemateri">
                    <label class="clues">Materi dalam bentuk e-book (*.pdf) atau video (*.webm, *.ogg)</label>
                </div>
            </div>
            
            <div class="col-lg-offset-1 col-md-offset-2">
                <input type="submit" name="finish_reg" value="Selesai" class="btn btn-default">
            </div>
        </form>
        <?php } ?>
    </div>
</section>