<div class="container">
    <div class="row">
        <?php if($kelas) { foreach($kelas as $kelas) {?>
        <h1 class="reg-heading">Mahasiswa Kelas <?php echo $kelas['nama']." (".$kelas['tahun']."/".($kelas['tahun']+1).")" ?></h1>
        <?php }} ?>
    </div>
</div>

<section class="profil-guru">
    <div class="container">
        <div class="row">
            <?php
                if(is_array($siswa)){
            ?>
                <table class="table table-border text-center">
                    <tr>
                        <th colspan="2" class="text-center">Nama</th>
                        <th class="text-center">NIM</th>
                    </tr>
            <?php
                    foreach($siswa as $data){
            ?>
                    <tr>
                        <td width="10%"><img src="<?php echo $folder_foto_siswa.$data['foto']; ?>" class="img-circle" width="25px"/></td> 
                        <td><?php echo $data['nama_siswa']?></td>
                        <td><?php echo $data['nim']?></td>
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