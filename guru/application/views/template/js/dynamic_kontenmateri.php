                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#mapel').change(function(){
                             var mapel_id = $(this).val();
                             $.getJSON("<?php echo base_url('materi/getMateriJSON/')?>"+mapel_id, function(data){
                                $('#materi').empty();
                                $.each(data, function(id, nama) {   
                                     $('#materi').append($("<option></option>").attr("value",id).text(nama)); 
                                });
                                // call submateri
                                $('#materi').change();
                            });
                        });

                        $('#materi').change(function(){
                             var materi_id = $(this).val();
                             $.getJSON("<?php echo base_url('materi/getSubMateriJSON/')?>"+materi_id, function(data){
                                $('#submateri').empty();
                                $.each(data, function(id, nama) {   
                                     $('#submateri').append($("<option></option>").attr("value",id).text(nama)); 
                                });
                            });
                        });
                    });
                </script> 

                <script>
                    tinymce.init({
                        selector: "textarea", theme: "modern",
                        plugins: [
                             "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                             "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                             "table contextmenu directionality emoticons paste textcolor responsivefilemanager"
                       ],
                       toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                       toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
                       image_advtab: true 
                    });
                </script>