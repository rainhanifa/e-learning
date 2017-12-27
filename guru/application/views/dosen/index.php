<div class="container">
    <div class="row">
        <h1 class="reg-heading">Data Dosen</h1>

    </div>
</div>

<section class="profil-guru">
    <div class="container">
        <div class="row">
            <?php
                if($this->session->flashdata("error") != ""){
                     echo "<label class='label label-danger' style='color:white;'>".$this->session->flashdata("error")."</label>";
                }
            ?>
            <?php
                if(is_array($dosen)){
            ?>

                <table class="table table-border text-center">
                    <tr>
                        <th colspan="2" class="text-center">Nama Dosen</th>
                        <th class="text-center">Nama Pengguna</th>
                        <th class="text-center">NIP</th>
                        <th class="text-center">Aksi</th>
                    </tr>
            <?php
                    foreach($dosen as $data){
            ?>
                    <tr>
                        <td width="15%"><img src="<?php echo $folder_foto_guru.$data['foto']; ?>" class="img-circle img-responsive"/></td>
                        <td><?php echo $data['nama']?></td>    
                        <td><?php echo $data['username']?></td>    
                        <td><?php echo $data['nip']?></td>
                        <td><a href="<?php echo base_url('dosen/detail/').$data['id']?>" class="btn btn-primary">Detail Dosen</a> <a href="<?php echo base_url('dosen/hapus/').$data['id']?>" class="btn btn-danger">Hapus Dosen</a></td>
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