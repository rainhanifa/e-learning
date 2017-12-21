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
            if($datarapsis<>''){
                if(is_array($datarapsis)){
                    foreach($datarapsis as $data){
                        $rsmateri       = $data['materi'];
                        $arr_rsmateri   = backgurucode::showmateri($rsmateri);
                        $cek_dtnilai    = backgurucode::ceknilai($data['idhasil']);
                        $action         = '';
                        if($cek_dtnilai == 'true'){
                            $action     = 'index.php?p=updrap';
                        } else {
                            $action     = 'index.php?p=insrap';
                        }
        ?>
        <form name="fnilaisis" id="fnilaisis" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data" class="form-group" role="form">
            <input type="hidden" name="guru" id="guru" value="<?php echo $_SESSION['user']; ?>">
            <input type="hidden" name="nohas" id="nohas" value="<?php echo $data['idhasil']; ?>">
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="materi-video" class="control-label">Materi</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12 video-materi">
                    <label class="label label-default clues"><?php echo $arr_rsmateri['materi']; ?></label>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="kelas" class="control-label">Submateri</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <label class="label label-default clues"><?php echo $arr_rsmateri['submateri']; ?></label>
                </div>
            </div>
            <?php
                        // Query Data Siswa
                        $rssiswa      = $data['nama'];
                        $arr_rssiswa  = backgurucode::showsiswa($rssiswa);            
            ?>
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="nama" class="control-label">Nama</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <input type="hidden" name="namasiswa" id="namasiswa" value="<?php echo $rssiswa; ?>">
                    <label class="label label-default clues"><?php echo $arr_rssiswa['nama_siswa']; ?></label>
                </div>
            </div>
            <?php
                        $detpenilaian   = '';
                        $classvalue     = '';
                        $labvalue       = '';
                        $idrapor        = '';
                        
                        if($cek_dtnilai == 'true'){
                            $arr_getdtnilai = backgurucode::cekrapor($data['idhasil']);
                            $detpenilaian   = $arr_getdtnilai['detail_nilai'];       
            ?>
            <input type="hidden" name="idr" id="idr" value="<?php echo $arr_getdtnilai['norapor']; ?>">
            <?php                
                            if($arr_getdtnilai['nclass']<>''){
                                $classvalue = $arr_getdtnilai['nclass'];
                            } else {
                                $classvalue = '';    
                            }
                            
                            if($arr_getdtnilai['nlab']<>''){
                                $labvalue = $arr_getdtnilai['nlab'];
                            } else {
                                $labvalue = '';    
                            }
                        } else {
                            $detpenilaian   = '';
                            $classvalue     = '';
                            $labvalue       = '';
                        }
                        
                        $arr_rshasil  = backgurucode::gethasil($data['idhasil']);       
            ?>
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="nama" class="control-label">Detail Penilaian</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <textarea name="detnilai" class="form-control" id="detnilai" rows="10"><?php echo $detpenilaian; ?></textarea>
                    <label class="clues">Masukkan detail nilai berdasarkan kategori dan pedoman penilaian</label>
                </div>
            </div>
            <!--
            <php
                        if($arr_rshasil['classdir']<>''){
                         
            ?>-->
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="nama" class="control-label">Nilai Teori</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <input type="text" name="nilaiclass" class="form-control" id="nilai" value="<?php echo $classvalue; ?>">
                    <label class="clues">Masukkan total nilai class activity sesuai dengan hasil penghitungan berdasarkan pedoman penilaian</label>
                </div>
            </div>

            <!--
            <php
                        } else {
            ?>
            <input type="hidden" name="nilaiclass" id="nilaiclass" value="">
            <php
                        }
                        
                        if($arr_rshasil['labdir']<>''){
            ?>-->
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="nama" class="control-label">Nilai Praktikum</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <input type="text" name="nilailab" class="form-control" id="nilai" value="<?php echo $labvalue; ?>">
                    <label class="clues">Masukkan total nilai lab activity sesuai dengan hasil penghitungan berdasarkan pedoman penilaian</label>
                </div>
            </div>
            <!--
            <php
                        } else {
            ?>
            <input type="hidden" name="nilailab" id="nilailab" value="">
            <php
                        }
            ?>-->
            <div class="col-lg-offset-1 col-md-offset-2">
                <input type="submit" name="finish_nilai" value="Selesai" class="btn btn-default">
            </div>
        </form>
        <?php
                    }
                }
            } else {
        ?>
        <div class="row materi-msg">
            <div class="item-reg text-center">
                    <label class="label label-danger" style="color:white;">Data tidak ditemukan</label>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
</section>