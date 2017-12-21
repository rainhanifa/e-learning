<section class="form-reg">
    <div class="container">
        <div class="row reg-heading">
            <h1 class="text-center">Catatan Aktifitas Sistem</h1>
            <br>
        </div>
    </div>
    <div class="container">
        <div class="row rapor">
            <div class="table-responsive">
                <table border="1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Aktifitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($showlogs<>''){
                                $no = 1;
                                foreach($showlogs as $data){
                                    $waktu      =   explode(' ', $data['time']);
                                    $tanggal    =   date("d F Y", strtotime($waktu[0]));
                                    $jam        =   $waktu[1];
                        ?>
                        <tr>
                            <td width="10%"><?php echo $no; ?></td>
                            <td><?php echo $tanggal; ?></td>
                            <td width="20%"><?php echo $jam; ?></td>
                            <td><?php echo $data['username']." ".$data['description']; ?></td>
                        </tr>
                        <?php
                                    $no++;
                                }
                            }else{
                        ?>
                        <tr>
                            <td colspan="4">Data Kosong</td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>