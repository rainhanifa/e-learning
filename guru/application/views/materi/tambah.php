<div class="container">
    <div class="row">
        <h1 class="reg-heading">Form Tambah Materi</h1>
    </div>
</div>

<section class="form-reg">
    <div class="container">
        <form name="fdatamateri" id="fdatamateri" method="post" action="<?php echo base_url('materi/doTambah') ?>" class="form-group" role="form">
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="submateri" class="control-label">Mata Kuliah</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <select name="mapel" class="form-control">
                        <?php foreach ($mapel as $mapel) { ?>
                            <option value="<?php echo $mapel['id_mapel']?>"><?php echo $mapel['nama_mapel']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="materi" class="control-label">Materi</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <input type="text" name="materi" class="form-control" id="materi" value="">
                </div>
            </div>
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="submateri" class="control-label">Sub Materi</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <input type="text" name="submateri" class="form-control" id="submateri" value="">
                    <label class="clues">Contoh: Cara Kerja Aplikasi Web Berbasis Server</label>
                </div>
            </div>
            <div class="col-lg-offset-1 col-md-offset-2">
                <input type="submit" name="finish_reg" value="Tambah" class="btn btn-default">
            </div>
        </form>
    </div>
</section>