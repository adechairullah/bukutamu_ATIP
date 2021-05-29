<section class="content">
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3>Daftar Tamu</h3>

                <div class="box-tools">
                    <form action="" method="get">
                        <div class="input-group input-group-sm" style="width: 150px;">

                            <input type="text" name="q" class="form-control pull-right" value="<?php if(!empty($q)) echo $q ?>" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <thead class="bg-blue">
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Tamu</th>
                                <th>Tanggal Kunjungan</th>
                                <th>Jenis Kelamin</th>
                                <th>Instansi</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                                <th>Keperluan</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    <tbody>

                    </tbody>

                   
                    <?php
                    $no = 0;
                    foreach ($daftar_tamu as $tamu) {
                        $no++;
                        echo "<tr>
                        <td>$no</td>
                        <td>$tamu->nik</td>
                        <td>$tamu->nama</td>
                        <td>$tamu->tanggal</td>
                        <td>$tamu->jekel</td>
                        <td>$tamu->instansi</td>
                        <td>$tamu->nomor_telp</td>
                        <td>$tamu->alamat</td>
                        <td>$tamu->keperluan</td>
                        <td><img src='./uploads/$tamu->image' width='100px' height='70px'></td>
                        <td>
                        <a href='".base_url() ."daftar_tamu/form/" .$tamu->nik. "' class='btn btn-warning btn-xs'>Edit</a>
                        <a href='" . base_url() . "crud/hapus/" . $tamu->id . "' class='btn btn-danger btn-xs'>Hapus</a>
                        </td>
                    </tr>";
                    }
                    ?>
                    


                    </tbody>
                </table>
                <?php echo $pagination; ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
</section>