<section class="form-reg">
    <div class="container">
        <div class="row reg-heading">
            <h1 class="text-center">Laporan Hasil Belajar Mahasiswa</h1>
            <br>
        </div>
    </div>
    <div class="container">
        <div class="row rapor">
            <div class="table-responsive">
                <table border="1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Materi</th>
                            <th>Submateri</th>
                            <th>Nilai Teori</th>
                            <th>Keterangan</th>
                            <th>Nilai Praktek</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>

<?php
    if(is_array($materi)){
?>
                    <tbody>
<?php
	// FETCH MATERI
	$no_materi 	=	1;
	foreach($materi as $data_materi){
		$no_sub 	=	1;
		// GET TOTAL SUBMATERI IN THIS MATERI
		$total_sub	=	getSubMateriTotal($data_materi['id_materi']);
		// GET SUBMATERI OF THIS MATERI
		$submateri 	=	getSubMateri($data_materi['id_materi']);
		// FETCH

		foreach($submateri as $submateri){
			$nilaiclass	=	getNilaiClass($submateri['id']);
			$nilailab		=	getNilaiLab($submateri['id']);
?>
                        <tr>
<?php 	echo ($no_sub == 1) ? '<td rowspan="'.$total_sub.'"><b>'.$data_materi['nama_materi'].'</b></td>' : '' ?>
                            <td><?php echo $submateri['nama']?></td>
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
			$no_sub++;
		}// END FETCH SUBMATERI
		$no_materi++;
	}// END FETCH MATERI
?>
                    </tbody>
<?php
} // ENDIF
?>
                </table>
            </div>
        </div>
    </div>
</div>
</section>