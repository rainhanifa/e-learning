<div id="printpdf">
<!-- begin print area -->
    <section>
        <div class="container">
            <div class="row reg-heading">
                <h1 class="text-center">Laporan Hasil Belajar Mahasiswa <?php echo getKelasNama($idkelas); ?></h1>
                <h2 class="text-center">Mata Kuliah: <?php echo getTMapelNama($idmapel); ?></h2>
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
                        foreach($materi as $data){
                            $submateri  =   getSubMateri($data['id_materi']);
                ?>
                <p><b>Materi : <?php echo $data['nama_materi']?></b></p>
                <?php
                        // FETCHING SUB MATERI
                        foreach($submateri as $submateri){
                    ?>
                <p>Submateri : <?php echo $submateri['nama']?></p>
                <div class="table-responsive">
                    <table border="1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Nilai Class</th>
                                <th>Keterangan</th>
                                <th>Nilai Lab</th>
                                <th>Keterangan</th>
                                <th class="cellact">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
                        // FETCHING SISWA
                        $no = 1;
                        foreach($kelas as $data_siswa){
                ?>
                            <tr>
                                <td><?php echo $no;?></td>
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
                                <td class="cellact"><a href="<?php echo base_url('rapor/berinilai/').$data_siswa['id_siswa'].'/'.$submateri['id']?>">Ubah</a></td>
                            </tr>
                <?php
                                    $no++;
                            } // END FETCHING SISWA
                ?>
                        </tbody>
                    </table>
                <?php 
                            } // END FETCHING SUBMATERI
                            }   // END FETCHING MATERI
                ?>
                </div>
                <br>
                <?php
                    } else {
                ?>
                <div class="row materi-msg">
                    <div class="item-reg text-center">
                            <label class="label label-danger" style="color:white;">Data tidak ditemukan</label>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profil-siswa">
                    <div class="form-reg">
                        <a href="<?php echo base_url('rapor/printnilai/').$idkelas.'/'.$idmapel; ?>" id="print" class="btn btn-default" onclick="">Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>