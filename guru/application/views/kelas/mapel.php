<div class="container">
    <div class="row">
        <?php if($kelas) {
                foreach($kelas as $kelas) {
                    $id_kelas = $kelas['id'];
            ?>
        <h1 class="reg-heading">Mata Kuliah Kelas <?php echo $kelas['nama']." (".$kelas['tahun']."/".($kelas['tahun']+1).")" ?></h1>
        <?php }} ?>
    </div>
</div>

<section class="profil-guru">
    <div class="container">
        <div class="row">
        <span><a data-toggle="modal" href="#tambah-mapel" data-dismiss="#tambah-mapel" class="btn btn-default add">Tambah Mata Kuliah</a></span>
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

<!-- Modal -->
<div class="modal fade modal-white" id="tambah-mapel" tabindex="0" role="dialog" aria-labelledby="myModalLabel">
<form action="<?php echo base_url("kelas/tambah_mapel");?>" method="post">
    <div class="modal-dialog" role="document">
        <div class="modal-content infotrophy-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Mata Kuliah</h4>
            </div>
            <div class="modal-body">
                <div id="container_update">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12 controls">
                                <span class="m_25"><label>Nama Mata Kuliah</label></span>
                                <select name="mapel" id="select_mapel">
                                    <?php foreach($available_mapel as $mapel) { ?>
                                    <option value="<?php echo $mapel['id_mapel']?>"><?php echo $mapel['nama_mapel']?>
                                     (<?php echo $mapel['nama_dosen']?>)</option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="kelas" value="<?php echo $id_kelas?>" id="kelas_id">
                            </div>
                        </div>
                    </div>
                </div>                            
                               
            </div>
          <!-- end modal-body -->
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal">CANCEL</button>
                <input type="submit" class="btn btn-info " value="SIMPAN" name="submit" >
            </div>
        </div>
        <!-- end modal-content -->
    </div>
</form>    
</div>
<!-- END Modal-->
