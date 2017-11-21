<!-- Modal -->
<div class="modal fade modal-white" id="tambah-dosen" tabindex="0" role="dialog" aria-labelledby="myModalLabel">
<form action="<?php echo base_url("mapel/tambah_dosen");?>" method="post">
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
                                <span class="m_25"><label>Nama Dosen</label></span>
                                <select name="dosen" id="select_dosen">
                                    <option value="0">Pilih Dosen</option>
                                </select>
                                <input type="hidden" name="mapel" value="" id="mapel_id">
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


<script type="text/javascript">
    $('.tambah_mapel').click(function(){
        var mapel = $(this).data('id');
        var $select = $('#select_dosen');

        document.getElementById("mapel_id").value = mapel;
        $select.find('option').remove();   

        $.getJSON("<?php echo base_url('mapel/getDosenJSON/')?>"+mapel, function(data){
            $.each(data, function(i, val) {
                $($select).append($('<option>').text(val.name).attr('value', val.id));
            });
    })

</script>  