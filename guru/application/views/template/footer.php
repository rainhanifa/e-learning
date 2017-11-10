   
        <footer>
            <div class="container">
                <div class="row">
                    <p class="copyright"> Copyright 2017 &copy; Fakultas Ilmu Keolahragaan
                        <a href="http://e-learning.um.ac.id/">
                            <img src="<?php echo base_url('../assets/')?>images/Logo-UM.png" width="1560" height="240" alt="Logo Universitas Negeri Malang" class="img-responsive">
                        </a>
                    <br>
                </div>
            </div>
        </footer>

         <!-- General -->
        <script type="text/javascript" src="<?php echo base_url('../assets/js/')?>jquery-1.11.2.js"></script>
        <script type="text/javascript" src="<?php echo base_url('../assets/js/')?>bootstrap.js"></script>

        <?php
            if (is_array($modal)) {
                foreach ($modal as $modal){
                    echo $modal;
                }
            }
            if (is_array($js)) {
                    foreach ($js as $js){
                        ?>
                        <script type='text/javascript' src='<?php echo base_url("../assets/js/").$js; ?>'></script>
                        <?php
                    }
                }?>
                <?php if (is_array($validasi)) {
                    foreach ($validasi as $validasi){
                        echo $validasi;
                    }
                }?>

</html>
