<div class="container">
    <div class="row">
        <h1 class="reg-heading">Data Mata Kuliah</h1>
    </div>
</div>

<section class="profil-guru">
    <div class="container">
        <div class="row">
            <span><a data-toggle="modal" href="#tambah" data-dismiss="#tambah-dosen" class="btn btn-primary">Tambah Mata Kuliah</a></span>
            <br/><br/>
            <?php
                if(is_array($mapel)){
            ?>

                <table class="table table-border text-center">
                    <tr>
                        <th class="text-center">Nama Mata Kuliah</th>
                        <th class="text-center" colspan="2">Dosen</th>
                    </tr>
            <?php
                    foreach($mapel as $data){
            ?>
                    <tr>
                        <td><?php echo $data['nama']?></td>    
                        <td>
                            <?php $dosen_mapel = getDosenMapel($data['id']);
                                    if(is_array($dosen_mapel)){ ?>
                                        <ul>
                            <?php foreach($dosen_mapel as $dosen_mapel){ ?>
                                            <li><?php echo $dosen_mapel['nama_dosen']?></li>
                            <?php       } ?>
                                        </ul>
                            <?php
                                    }
                                    else{
                                        echo "<i>Belum ada dosen</i>";
                                    }
                            ?>

                        </td>
                        <td>
                            <a href="<?php echo base_url('mapel/tambahdosen/').$data['id']?>" class="btn btn-primary tambah_dosen">Tambah Dosen Makul</a>
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
