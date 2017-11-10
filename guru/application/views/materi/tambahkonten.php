<div class="container">
    <div class="row">
        <h1 class="reg-heading">Form Tambah Konten Materi</h1>
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
        <form name="formtmkonten" id="formtmkonten" method="post" action="<?php echo base_url('materi/doTambahKonten') ?>" enctype="multipart/form-data" class="form-group" role="form">
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="mapel" class="control-label">Mata Kuliah</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <select name="mapel" class="form-control" id="mapel">
                        <option value="">-- Pilih Mata Kuliah --</option>
                        <?php foreach($mapel as $mapel){ ?>
                            <option value="<?php echo $mapel['id_mapel']?>"><?php echo $mapel['nama_mapel']?></option>
                        <?php }?>
                    </select>
                    <label class="clues">Pilih salah satu materi</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="materi" class="control-label">Materi</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <select name="materi" class="form-control" id="materi">
                        <option value="">-- Pilih Materi --</option>
                    </select>
                    <label class="clues">Pilih salah satu materi</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="submateri" class="control-label">Sub Materi</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <select name="submateri" class="form-control" id="submateri">
                        <option value="">-- Pilih Sub Materi --</option>
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
                        <option value="">-- Pilih Kategori --</option>
                        <option value="class">Class Activity</option>
                        <option value="lab">Lab Activity</option>
                    </select>
                    <label class="clues">Pilih kategori sesuai dengan modul yang dibuat</label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="isimateri" class="control-label">Isi Materi</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                
                    <textarea name="isimateri" id="isimateri" rows="20"></textarea>
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
    </div>
</section>