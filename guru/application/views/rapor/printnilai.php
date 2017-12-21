<div id="printpdf">
<!-- begin print area -->
    <section>
        <div class="container">
            <div class="row reg-heading">
                <h1 class="text-center">Laporan Hasil Belajar Mahasiswa <?php echo getKelasNama($idkelas); ?></h1>
                <h3 class="text-center">Mata Kuliah: <?php echo getMapelNama($idmapel); ?></h3>
            </div>
            </div> 
        </div>
    </section>

    <section class="form-reg">
        <div class="container">
            <div class="row rapor">
                <?php    
                    if(is_array($materi)){
                        // FETCHING MATERI
                        $urutan_materi = 1;
                        foreach($materi as $data){
                            $submateri  =   getSubMateri($data['id_materi']);
                ?>
                <hr/>
                <h4><b><?php echo $urutan_materi;?>. Materi : <?php echo $data['nama_materi']?></b></h4>
                <?php
                        // FETCHING SUB MATERI
                        foreach($submateri as $submateri){
                    ?>
                <h5>Submateri : <?php echo $submateri['nama']?></h5>
                <div class="table-responsive">
                    <table border="1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="3%" class="text-center">No.</th>
                                <th width="25%" class="text-center">Nama</th>
                                <th width="15%" class="text-center">Nilai Class</th>
                                <th width="20%" class="text-center">Keterangan</th>
                                <th width="15%" class="text-center">Nilai Lab</th>
                                <th width="20%" class="text-center">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
                        // FETCHING SISWA
                        $no = 1;
                        foreach($kelas as $data_siswa){
                ?>
                            <tr>
                                <td class="text-center"><?php echo $no;?></td>
                                <td><?php echo $data_siswa['nama_siswa']?></td>
                <?php
                        // SET NILAI;
                                $nilaiclass = getNilaiClass($data_siswa['id_siswa'], $submateri['id']);
                                $nilailab   = getNilaiLab($data_siswa['id_siswa'], $submateri['id']);;
                ?>
                                <td><?php echo $nilaiclass;?>
                                </td>
                                <td>
                                    <?php
                                        // SHOW STATUS
                                        if($nilaiclass > 75){
                                            echo "<label style='color:green'>Lulus</label>";
                                        }
                                        else if($nilaiclass > 0){
                                            echo "<label style='color:darkred'>Remedial</label>";
                                        }
                                        else{
                                            echo "<label style='color:orange'>Belum Ada Nilai</label>";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $nilailab;?>
                                </td>
                                <td>
                                    <?php
                                        // SHOW STATUS
                                        if($nilailab > 70){
                                            echo "<label style='color:green'>Lulus</label>";
                                        }
                                        else if($nilailab > 0){
                                            echo "<label style='color:darkred'>Remedial</label>";
                                        }
                                        else{
                                            echo "<label style='color:orange'>Belum Ada Nilai</label>";
                                        }
                                    ?>
                                </td>
                            </tr>
                <?php
                                    $no++;
                            } // END FETCHING SISWA
                ?>
                        </tbody>
                    </table>
                <?php 
                            } // END FETCHING SUBMATERI
                            $urutan_materi++;
                            }   // END FETCHING MATERI
                ?>
                </div>
                <br>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
</div>