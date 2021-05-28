<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Politeknik ATI Padang">
  <meta name="author" content="adech">
   <meta property="og:image" content="assets/images/icon.png">
   <link itemprop="thumbnailUrl" href="url_gambar"> <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> <link itemprop="url" href="assets/images/icon.png"> </span>
  <link rel="icon" href="assets/images/icon.png">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
    rel="stylesheet">

  <title>Politeknik ATI Padang | Buku Tamu</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="assets/css/fontawesome.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/owl.css">

</head>
	
</head>
<body>
	<!-- Header -->
	<header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <h2><img src="assets/images/atip.png" height="80px" width="200px">
            <em></em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
          aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>">BERANDA
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="nav-item active"><a class="nav-link" href="<?= base_url() . "bukutamu" ?>">BUKU TAMU</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="page-heading contact-heading header-text" style="background-image: url(assets/images/slider1.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <b><h2>BUKU TAMU</h2></b>
          </div>
        </div>
      </div>
    </div>
  </div>

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3"> 
			<br>
		        <center><h4> INPUT BUKU TAMU</h4></center>
				<hr>
				<form id="simpan">
					<div class="form-group">
						<label for="">Nama Lengkap</label>
						<input type="text" placeholder="Nama Lengkap" class="form-control" name="nama" id="nama" required autocomplete="off">
					</div>
				
					<div class="form-group">
						<label for="">NIK</label>
						<input type="number" placeholder="Masukkan NIK" class="form-control" name="nik" id="nik" required autocomplete="off">
					</div>
				
					<div class="form-group">
						<label for="">Instansi</label>
						<input type="text" placeholder="Instansi/Negeri/Swasta/Pribadi" class="form-control" name="instansi" id="instansi" required autocomplete="off">
					</div>
					
					<div class="form-group">
						<label for="">No. Telepon</label>
						<input type="number" placeholder="081xxxxxx" class="form-control" name="nomor_telp" id="nomor_telp" required autocomplete="off">
					</div>
					<div class="form-group">
						<label for="">Alamat</label>
						<textarea name="alamat" rows="6" class="form-control" id="alamat" placeholder="Alamat" required autocomplete="off"></textarea>
					</div>
					<div class="form-group">
						<label for="">Keperluan</label>
						<textarea name="keperluan" rows="6" class="form-control" id="keperluan" placeholder="Keperluan" required autocomplete="off"></textarea>
					</div>
					<div id="my_camera">
					</div>
					
					<hr>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<button type="reset" class="btn btn-primary">Reset</button>
				</form>
			</div>
		</div>
	</div>
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
	</script>
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script type="text/javascript">
		$('#simpan').on('submit', function (event) {
			event.preventDefault();
			var image = '';
			var nama = $('#nama').val();
			var nik = $('#nik').val();
			var instansi = $('#instansi').val();
			var nomor_telp = $('#nomor_telp').val();
			var alamat = $('#alamat').val();
			var keperluan = $('#keperluan').val();
			
			Webcam.snap( function(data_uri) {
				image = data_uri;
			});
			$.ajax({
				url: '<?php echo site_url("bukutamu/simpan");?>',
				type: 'POST',
				dataType: 'json',
				data: {nama: nama, nik: nik, instansi: instansi,nomor_telp:nomor_telp,alamat:alamat,keperluan:keperluan,image:image},
			})
			.done(function(data) {
				if (data > 0) {
					alert('Data Berhasil Disimpan');
					$('#simpan')[0].reset();
				    setInterval( () => { window.location.href = "https://bukutamu.poltekatipdg.ac.id/";
				        
				    }, 500);
				}
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});
			
			
		});
	</script>

<footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              Politeknik ATI Padang 2021
              | <a href="https://poltekatipdg.ac.id/">POLITEKNIK ATI PADANG</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

	  <!-- Bootstrap core JavaScript -->
	  <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
</body>
</html>