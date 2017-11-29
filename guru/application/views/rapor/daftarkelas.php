<div class="container">
    <div class="row">
        <h1 class="reg-heading">Data Nilai Mata Kuliah</h1>

    </div>
</div>

<section class="profil-guru">
    <div class="container">
        
        <div class="row">
            <?php
                if(is_array($kelas)){
            ?>

                <table class="table table-no-border">
            <?php
                    foreach($kelas as $data){
            ?>
                    <tr>
                        <td><?php echo $data['nama_kelas']?></td>    
                        <td><?php echo $data['tahun_kelas']."/".($data['tahun_kelas']+1)?></td>
                        <td><?php echo getTotalSiswa($data['id_kelas'])?> mahasiswa</td>
                        <td><a href="<?php echo base_url('rapor/kelas/').$idmapel.'/'.$data['id_kelas']?>" class="btn btn-primary">Data Nilai</a></td>
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