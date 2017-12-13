<section class="materi-siswa">
    <div class="container">
        <div class="row">
            <?php
                    foreach($konten as $konten){
                    ?>
            <div id="printpdf">
                <h2 class="text-center"><?php echo $konten['nama_materi']; ?></h2>
                <h3 class="text-center" id="submateri"><?php echo $konten['nama_submateri']; ?></h3>
                <h4><?php echo ucfirst($konten['tipe'])?> Activity</h4>
                    <h4>Mata Kuliah : <?php echo $konten['nama_mapel']; ?></h4>
                    <h4>Dosen : <?php echo $konten['nama_dosen']; ?></h4>
                </div>
                <div class="form-reg">
                    <!-- konten -->
                    <?php echo $konten['isi']; ?>
                </div>
            </div>           
            <?php
                    } // end fetching konten
            ?>
            </div>
        </div>
    </div>
</section>