<!-- Modal -->
<div class="modal fade modal-white" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<form action="<?php echo base_url("mapel/tambah");?>" method="post">
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
                                <input type="text" name="nama" id="nama" class="form-control" value="">
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


