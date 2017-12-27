<div class="container">
    <div class="row">
        <h1 class="reg-heading">Form Pengisian Nilai</h1>
    </div>
</div>

<section>
    <div class="container">
        <div class="row reg-heading head2">
            <h3>Petunjuk</h3>
            <ol>
                <li>Isi form dibawah ini sesuai dengan data siswa dan hasil penilaian berdasarkan pedoman penilaian.</li>
                <li>Field <strong>detail penilaian</strong> berisi tentang hasil penilaian berdasarkan pedoman penilaian dan keterangan lain yang berkenaan dengan penilaian siswa.</li>
                <li>Pada field <strong>detail penilaian</strong> terdapat dua bagian penilaian, yaitu <strong>class activity</strong> dan <strong>lab activity</strong>.</li>
                <li>Apabila salah satu dari dua bagian penilaian tersebut kosong, maka cukup mengisi salah satu saja.</li>
                <li>Masukkan <strong>nilai class activity</strong> pada field <strong>nilai teori</strong>.</li>
                <li>Masukkan <strong>nilai lab activity</strong> pada field <strong>nilai praktikum</strong>.</li>
                <li>Kriteria Ketuntasan Minimal (KKM) adalah <strong>75</strong>.</li>
            </ol>
        </div>
    </div>
</section>

<section class="form-reg">
    <div class="container">
        <?php
                $nilai_class    = 0;
                $nilai_lab      = 0;
                $id_hasil       = '';
                // FETCHING DETAIL SISWA
                foreach ($siswa as $siswa) {
                    $id_siswa       = $siswa['id_siswa'];
                    $nama_siswa     = $siswa['nama_siswa'];
                    $id_kelas       = $siswa['id_kelas'];
                    $kelas_siswa    = $siswa['nama_kelas'];
                    $nim_siswa      = $siswa['nim_siswa'];
                }

                // FETCHING DETAIL SUBMATERI
                foreach ($materi as $materi) {
                    $id_mapel           = $materi['id_mapel'];
                    $nama_mapel         = $materi['nama_mapel'];
                    $id_materi          = $materi['id_materi'];
                    $nama_materi        = $materi['nama_materi'];
                    $id_submateri       = $materi['id_submateri'];
                    $nama_submateri     = $materi['nama_submateri'];
                    $id_tmapel          = $materi['id_tmapel'];
                }

                if(is_array($nilai)){
                    foreach($nilai as $data){
                        $id_hasil       = $data['id'];
                        $nilai_class    = $data['nilai_class'];
                        $nilai_lab      = $data['nilai_lab'];
                    }
                }
        ?>
        <form name="fnilaisis" id="fnilaisis" method="post" action="<?php echo base_url('rapor/assignnilai'); ?>" enctype="multipart/form-data" class="form-group" role="form">
            <!-- HIDDEN -->
            <input type="hidden" name="id_hasil" value="<?php echo $id_hasil?>">
            <input type="hidden" name="id_siswa" value="<?php echo $id_siswa?>">
            <input type="hidden" name="id_kelas" value="<?php echo $id_kelas?>">
            <input type="hidden" name="id_tmapel" value="<?php echo $id_tmapel?>">
            <input type="hidden" name="id_submateri" value="<?php echo $id_submateri?>">

            <input type="hidden" name="kontenmateri_class" value="">
            <input type="hidden" name="kontenmateri_lab" value="">
            
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="materi-video" class="control-label">Mapel</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12 video-materi">
                    <label class="label label-default clues"><?php echo $nama_mapel; ?></label>
                </div>
            </div>

            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="materi-video" class="control-label">Materi</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12 video-materi">
                    <label class="label label-default clues"><?php echo $nama_materi; ?></label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="kelas" class="control-label">Submateri</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <label class="label label-default clues"><?php echo $nama_submateri; ?></label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="nama" class="control-label">Nama</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <label class="label label-default clues"><?php echo $nama_siswa." (".$kelas_siswa." - ".$nim_siswa.")"; ?></label>
                </div>
            </div>
            <!--
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="nama" class="control-label">Detail Penilaian</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <textarea name="detnilai" class="form-control" id="detnilai" rows="10"><php $detpenilaian; ?></textarea>
                    <label class="clues">Masukkan detail nilai berdasarkan kategori dan pedoman penilaian</label>
                </div>
            </div>
            -->
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="nama" class="control-label">Nilai Teori</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <input type="text" name="nilai_class" class="form-control" id="nilai" value="<?php echo $nilai_class; ?>">
                    <label class="clues">Masukkan total nilai class activity sesuai dengan hasil penghitungan berdasarkan pedoman penilaian</label>
                </div>
            </div>

            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="nama" class="control-label">Nilai Praktikum</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <input type="text" name="nilai_lab" class="form-control" id="nilai" value="<?php echo $nilai_lab; ?>">
                    <label class="clues">Masukkan total nilai lab activity sesuai dengan hasil penghitungan berdasarkan pedoman penilaian</label>
                </div>
            </div>
            <div class="col-lg-offset-1 col-md-offset-2">
                <input type="submit" name="finish_nilai" value="Selesai" class="btn btn-default">
            </div>
        </form>
    </div>
</section>