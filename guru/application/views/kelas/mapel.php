<div class="container">
    <div class="row">
        <?php if($kelas) { foreach($kelas as $kelas) {?>
        <h1 class="reg-heading">Mata Kuliah Kelas <?php echo $kelas['nama']." (".$kelas['tahun']."/".($kelas['tahun']+1).")" ?></h1>
        <?php }} ?>
    </div>
</div>

<section class="profil-guru">
    <div class="container">
        <div class="row">
        <span><a data-toggle="modal" href="#tambah" data-dismiss="#tambah-dosen" class="btn btn-default add">Tambah Mata Kuliah</a></span>
            <?php
                if(is_array($mapel)){
            ?>

                <table class="table table-border text-center">
                    <tr>
                        <th colspan="2" class="text-center">Mata Kuliah</th>
                        <th class="text-center">Dosen</th>
                        <th class="text-center"></th>
                    </tr>
            <?php
                    foreach($mapel as $data){
            ?>
                    <tr>
                        <td><?php echo $data['nama_mapel']?></td>
                        <td><?php echo $data['nama_dosen']?></td>
                        <td><a href="<?php echo base_url('kelas/hapus_mapel/').$data['id_jadwal']?>" class="btn btn-primary">Hapus Mata Kuliah</a> </td>
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