<!-- Modal -->
<div class="modal fade modal-white" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<form action="<?php echo base_url("kelas/tambah");?>" method="post">
    <div class="modal-dialog" role="document">
        <div class="modal-content infotrophy-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Kelas</h4>
            </div>
            <div class="modal-body">
                <div id="container_update">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12 controls">
                                <span class="m_25"><label>Nama Kelas</label></span>
                                <input type="text" name="nama" id="nama" class="form-control" value="" placeholder="OFF A Pendidikan Jasmani dan Kesehatan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-12 col-lg-12 controls">
                                <span class="m_25"><label>Tahun Akademik</label></span>
                                <input type="number" name="tahun" id="tahun" class="form-control" value="" placeholder="2017">
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


