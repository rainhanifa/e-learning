<div class="container">
    <div class="row">
        <h1 class="reg-heading">Form Ubah Materi</h1>
    </div>
</div>

<section class="form-reg">
    <div class="container">
        <form name="fdatamateri" id="fdatamateri" method="post" action="<?php echo base_url('materi/doUbah') ?>" class="form-group" role="form">

        <?php foreach($materi as $materi) { ?>
            <input type="hidden" name="userid" value="<?php echo $this->session->userdata('username'); ?>">
            <input type="hidden" name="idmateri" class="form-control" id="materi" value="<?php echo $materi['id']?>">
            <div class="row item-reg">
                <div class="col-lg-1 col-md-2 col-sm-3 col-xs-12">
                    <label for="materi" class="control-label">Materi</label>
                </div>
                <div class="col-lg-11 col-md-10 col-sm-9 col-xs-12">
                    <input type="text" name="materi" class="form-control" id="materi" value="<?php echo $materi['nama']?>">
                </div>
            </div>
            <div class="col-lg-offset-1 col-md-offset-2">
                <input type="submit" name="finish_reg" value="Ubah" class="btn btn-default">
            </div>
        <?php } ?>
        </form>
    </div>
</section>