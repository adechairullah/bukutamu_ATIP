<section class="content">
<div class="row">
     	<div class="col-xs-12">
         	<div class="box">
             	<div class="box-header">
                 	<h3 class="box-title">Form Tambah</h3>

                 	<div class="box-tools">

                 	</div>
             	</div>
             	<div class="box-body table-responsive no-padding">
                 	<div class="col-md-12">
                     	<form class="form-horizontal" method="POST" action="<?php if (empty($mahasiswa)) echo base_url() . "crud_standar/simpan";
                                                                        else echo base_url() . "crud_standar/update"; ?>">
                         	<div class="box-body">
                             	<div class="form-group">
                                 	<label for="inputEmail3" class="col-sm-2 control-label">Nobp</label>
                                 	<div class="col-sm-10">
                                     	<input type="text" name="mhsnobp" class="form-control" id="inputEmail3" value="<?php if (!empty($mahasiswa)) echo $mahasiswa->mhsnobp; ?>" <?php if (!empty($mahasiswa)) echo 'readonly'; ?> required placeholder="NOBP">
                                 	</div>
                             	</div>
                             	<div class="form-group">
                                 	<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>

                                 	<div class="col-sm-10">
                                     	<input type="text" name="mhsnama" class="form-control" id="inputEmail3" value="<?php if (!empty($mahasiswa)) echo $mahasiswa->mhsnama; ?>" placeholder="Nama">
                                 	</div>
                             	</div>
                             	<div class="form-group">
                                 	<label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>

                                 	<div class="col-sm-10">
                                     	<input type="text" name="mhsalamat" class="form-control" id="inputEmail3" value="<?php if (!empty($mahasiswa)) echo $mahasiswa->mhsalamat; ?>" placeholder="Alamat">
                                 	</div>
                             	</div>
                             	<div class="form-group">
                                 	<label for="inputEmail3" class="col-sm-2 control-label">Jekel</label>

                                 	<div class="col-sm-10">
                                     	<?php if (!empty($mahasiswa)) $jk = $mahasiswa->mhsjekel;
                                    else $jk = ""; ?>
                                     	<select name="mhsjekel" id="mhsjekel" class="form-control">
                                         	<option value="L" <?php if ($jk == "L") echo "selected"; ?>>Laki-Laki</option>
                                         	<option value="P" <?php if ($jk == "P") echo "selected"; ?>>Perempuan </option>
                                     	</select>
                                 	</div>
                             	</div>
                             	<div class="form-group">
                                 	<label for="inputEmail3" class="col-sm-2 control-label">Tempat Lahir</label>

                                 	<div class="col-sm-10">
                                     	<input type="text" name="mhstmplahir" class="form-control" id="inputEmail3" value="<?php if (!empty($mahasiswa)) echo $mahasiswa->mhstmplahir; ?>" placeholder="Tempat Lahir">
                                 	</div>
                             	</div>

                             	<div class="form-group">
                                 	<label for="inputEmail3" class="col-sm-2 control-label">Tgl Lahir</label>

                                 	<div class="col-sm-10">
                                     	<input type="date" name="mhstgllahir" class="form-control" id="inputEmail3" value=" <?php if (!empty($mahasiswa)) echo $mahasiswa->mhstgllahir; ?>" placeholder="Tanggal Lahir">
                                 	</div>
                             	</div>
                             	<div class="form-group">
                                 	<label for="inputEmail3" class="col-sm-2 control-label">Prodi</label>

                                 	<div class="col-sm-10">
                                     	<?php if (!empty($mahasiswa)) $prodiid = $mahasiswa->mhsprodiid;
                                    else $prodiid = ""; ?>
                                     	<select name="mhsprodiid" id="mhsprodiid" class="form-control">
                                         	<?php
                                        foreach ($prodi as $p) {
                                        ?>
                                             	<option value=" <?= $p->prodiid; ?>" <?php if ($prodiid == $p->prodiid) echo "selected" ?>> <?= $p->prodinama; ?> 	</option>
                                         	<?php
                                        }
                                        ?>
                                     	</select>
                                 	</div>
                             	</div>
                         	</div>
                         	<!-- /.box-body -->
                         	<div class="box-footer">
                             	<a href='<?= base_url() . "crud_standar"; ?>' class="btn btn-default">Cancel 	</a>
                             	<button type="submit" class="btn btn-info pull-right">Simpan</button>
                         	</div>
                         	<!-- /.box-footer -->
                     	</form>
                 	</div>

             	</div>
             	<!-- /.box-body -->
         	</div>
         	<!-- /.box -->
     	</div>
 	</div>
     </section>     