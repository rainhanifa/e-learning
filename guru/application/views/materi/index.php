<section>
    <div class="container">
        <div class="row reg-heading">
            <h1 class="text-center">Daftar Materi</h1>
        </div>
        <div class="row form-cari materi">
            <form name="carimateri" id="carimateri" method="post" action="<?php echo base_url('materi/cari') ?>" role="form" class="form-group">
                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                    <select name="category" form="carimateri" class="form-control">
                        <option value="">--- Kategori Pencarian ---</option> 
                        <option value="materi">Materi</option>
                        <option value="submateri">Submateri</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                    <input type="text" name="searchid" value="" placeholder="Kata Kunci Pencarian" class="form-control">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                    <input type="submit" value="Cari" class="btn btn-default action">
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
                    <a href="<?php echo base_url('materi') ?>" class="btn btn-default action">Lihat Semua</a>
                </div>
            </form>
        </div> 
    </div>
</section>

<section class="all-materi">
    <div class="container">
        <div class="row">
            <a href="<?php echo base_url('materi/tambah') ?>" class="btn btn-default add">Tambah Materi</a>
            <a href="<?php echo base_url('materi/tambahkonten') ?>" class="btn btn-default add">Tambah Konten Materi</a>
            <hr>
        </div>
        <?php
            if($materi){
                    foreach($materi as $data){
        ?>
                    <div class="deskripsi-materi">
                        <h5>Materi : <?php echo $data['nama_materi']; ?></h5>
                        
                        <?php
//                                backgurucode::connecttodb();
                                if(!isset($_GET['c']) and !isset($_GET['k'])){
                                    //$arrmateri      = backgurucode::listmateri($data['materi']); 
                                } else {
                                    //$arrmateri      = backgurucode::smateri($data['materi'], $category, $keyword);
                                }
                                
                                $no               = 1;
                                $submateri  =   getSubMateri($data['id_materi']);
                                foreach($submateri as $submateri){
                            ?>
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-4 col-xs-12">
                                    <p>
                                        <label class="label label-success"><?php echo $no; ?></label>
                                        <?php echo $submateri['nama']; ?>
                                    </p>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-8 col-xs-12 form-reg">
                                    <?php
                                        $kontenclass = kontenClass($submateri['id']);
                                        $kontenlab   = kontenLab($submateri['id']);
                                    ?>
                                    <a href="<?php echo ($kontenclass > 0) ? base_url('materi/activity/').$kontenclass : base_url('materi')  ?>" class="btn activity action">Class Activity <?php echo ($kontenclass > 0) ? '' : 'Kosong'  ?></a>
                                    <a href="<?php echo ($kontenlab > 0) ? base_url('materi/activity/').$kontenlab : base_url('materi')  ?>" class="btn lab action">Lab Activity <?php echo ($kontenlab > 0) ? '' : 'Kosong'  ?></a>
                                </div>
                            </div>
                            <?php
                                    $no++;
                                }
                            ?>
                        <div class="form-reg">
                            <a href="<?php echo base_url('materi/ubah/').$data['id_materi'] ?>" class="btn btn-default delete">Ubah Materi</a>
                            <a href="<?php echo base_url('materi/hapus/').$data['id_materi'] ?>" class="btn btn-default delete">Hapus Materi</a>
                        </div>
                    </div>
                <?php
                    }
            } else {
        ?>
            <div class="row materi-msg">
                <div class="item-reg">
                        <label class="label label-danger" style="color:white;">Data tidak ditemukan</label>
                </div>
            </div>
        <?php
            }
        ?>
    </div>
</section>