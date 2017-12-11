<div class="container">
    <div class="row">
        <h1 class="reg-heading">Mata Kuliah Dosen</h1>
    </div>
</div>

<section class="profil-guru">
    <div class="container">
        <div class="row">
            <?php
                if(is_array($mapel)){
            ?>

                <table class="table">
            <?php
                    foreach($mapel as $mapel){
            ?>
                    <tr>
                        <td><?php echo $mapel['nama_mapel']?></td>    
                        <td width="40%">
                                <a href="<?php echo base_url('materi/bymapel/').$mapel['id_mapel']?>" class="btn btn-primary">Lihat Materi</a>
                                <a href="<?php echo base_url('rapor/bymapel/').$mapel['id_mapel']?>" class="btn btn-primary">Lihat Kelas</a>
                                <a href="<?php echo base_url('rapor/bymapel/').$mapel['id_mapel']?>" class="btn btn-warning">Lihat Nilai</a>
                        </td>
                    </tr>
        <?php           } ?>
                </table>          
        </div>
        <?php
                } else {
        ?>
                    <div class="container">
                        <div class="row materi-msg">
                            <div class="item-reg text-center">
                                    <label class="label label-danger" style="color:white;">Data tidak ditemukan</label>
                            </div>
                        </div>
                    </div>
        <?php        
                }
        ?>
    </div>
</section>
