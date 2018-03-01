<html>
	<head>
		<title>Data Mahasiswa</title>
		<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/bootstrap-theme.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">

	</head>
<body>
<h3 align="center">Form Tambah Data</h3>

<div class="collapse navbar-collapse">
	<div class="panel panel-default">

	<form method="POST" action="<?php echo base_url()."index.php/crud/do_insert"; ?>">
	<table class="table" align="center">
		<tr>
			<td>N I M</td>
			<td><input type="text" name="nim" placeholder="Nim" class="form-control"></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama" placeholder="Nama" class="form-control"></td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td>
				<input type="radio" name="jenis_kelamin" id="exampleRadios1" value="Laki-laki" checked> Laki-laki
				<input type="radio" name="jenis_kelamin" id="exampleRadios1" value="Perempuan"> 
				Perempuan
			</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><textarea name="alamat" class="form-control" placeholder="Alamat"></textarea> </td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="btnSubmit" value="Simpan" class="btn btn-primary">
			 	<input type="button" name="btnBatal" value="Batal" onClick="history.back(-1)" class="btn btn-primary"></td>
		</tr>
	</table>
</form>

</div>
</div>
</body>
</html>