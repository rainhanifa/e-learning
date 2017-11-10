        <div class="bg-reg">
            <div class="container">
                <div class="row">
                    <h1 class="reg-heading"> Tambah Dosen Mata Kuliah</h1>
                </div>
            </div>
        </div>
        
        <section class="form-reg">
            <div class="container">
                <?php foreach($mapel as $mapel) { ?>
                <form method="post" action="<?php echo base_url('mapel/do_tambah_dosen')?>" role="form">
                    <div class="row item-reg">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php
                                if($this->session->flashdata("error") != ""){
                                     echo "<label class='label label-danger' style='color:white;'>".$this->session->flashdata("error")."</label>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="row item-reg">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <label for="dosen" class="control-label">Pilih Dosen <?php echo $mapel['nama']?></label>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                            <select name="dosen">
                                <?php if($available) {
                                    foreach($available as $dosen) { ?>
                                    <option value="<?php echo $dosen['id']?>"><?php echo $dosen['nama']?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="mapel" value="<?php echo $mapel['id']?>">
                        <div class="col-md-offset-3">
                            <input type="submit" name="finish_reg" value="Simpan" class="btn btn-primary">
                        </div>
                                <?php    } else { ?>
                                    <option>Tidak ada dosen yang tersedia untuk mata kuliah ini</option>
                                    </select>
                                <?php }?>
                </form>
                <?php } ?>
            </div>
        </section>