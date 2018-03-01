<html>
	<head>
		
		<title>Data Mahasiswa</title>

    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">    
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url('assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css" />  

    <!-- DATA TABLES -->
    <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css')?>" rel="stylesheet" type="text/css" />

    <!-- Datepicker -->
    <link href="<?php echo base_url('assets/plugins/datepicker/datepicker.min.css')?>" rel="stylesheet" type="text/css" />

    <!-- Chosen Select -->
    <link href="<?php echo base_url('assets/plugins/chosen/css/chosen.min.css')?>" rel="stylesheet" type="text/css"  />

    <!-- Theme style -->
    <link href="<?php echo base_url('assets/css/AdminLTE.min.css')?>" rel="stylesheet" type="text/css" />

    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url('assets/css/skins/skin-blue.min.css')?>" rel="stylesheet" type="text/css" />

    <!-- Date Picker -->
    <link href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css')?>" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" />

	</head>

<body>
<br>
<section class="content-header">
	<h1>
	<i class="fa fa-folder-o icon-title"> CRUD Codeigniter dengan MySQL</i>
	<a href="<?php echo base_url()."index.php/crud/add_data" ?>" class="btn btn-primary btn-social pull-right" title="Tambah Data" data-toggle="tooltip">
	<i class="fa fa-plus"></i> Tambah Data</a>
	</h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
   	 <div class="col-md-12">
		<div class="box box-primary">
        	<div class="box-body">

	<?php echo "<h4><center>".$this->session->flashdata('Pesan')."</center></h4>"?>

	<table id="dataTables1" class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>NIM</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>Aksi</th>
			</tr>
		</thead>

		<tbody>
		<?php 
		$no = 1;
		foreach($data as $d) 
		{ 
		?>

		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $d['nim']; ?></td>
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['alamat']; ?></td>
			<td><?php echo $d['jenis_kelamin']; ?></td>
			<td><a href="<?php echo base_url()."index.php/crud/edit_data/".$d['nim']; ?>" data-toggle="tooltip" data-placement="top" title="Ubah" class="btn btn-warning glyphicon glyphicon-edit"></a> 
				<a href="<?php echo base_url()."index.php/crud/do_delete/".$d['nim']; ?>" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Yakin ingin Menghapus Data ini ?')"></a></td>
		</tr>
	<?php } ?>
	</tbody>
	</table>

 				</div><!-- /.box-body -->
      		</div><!-- /.box -->
    	</div><!--/.col -->
  	</div>   <!-- /.row -->
</section><!-- /.content-->


	
</body>
</html>



<!-- jQuery 2.1.3 -->
    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js')?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>" type="text/javascript"></script>    
    <!-- datepicker -->
    <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js')?>" type="text/javascript"></script>
    <!-- chosen select -->
    <script src="<?php echo base_url('assets/plugins/chosen/js/chosen.jquery.min.js')?>"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js')?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.js')?>" type="text/javascript"></script>
    <!-- Datepicker -->
    <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.min.js')?>" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js')?>" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo base_url('assets/plugins/fastclick/fastclick.min.js')?>'></script>
    <!-- maskMoney -->
    <script src="<?php echo base_url('assets/js/jquery.maskMoney.min.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/js/app.min.js')?>" type="text/javascript"></script>

    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        // datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });

        // chosen select
        $('.chosen-select').chosen({allow_single_deselect:true}); 
        //resize the chosen on window resize
        
        // mask money
        $('#harga_beli').maskMoney({thousands:'.', decimal:',', precision:0});
        $('#harga_jual').maskMoney({thousands:'.', decimal:',', precision:0});

        $(window)
        .off('resize.chosen')
        .on('resize.chosen', function() {
          $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
          })
        }).trigger('resize.chosen');
        //resize chosen on sidebar collapse/expand
        $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
          if(event_name != 'sidebar_collapsed') return;
          $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': $this.parent().width()});
          })
        });
    
    
        $('#chosen-multiple-style .btn').on('click', function(e){
          var target = $(this).find('input[type=radio]');
          var which = parseInt(target.val());
          if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
           else $('#form-field-select-4').removeClass('tag-input-style');
        });

        // DataTables
        $("#dataTables1").dataTable();
        $('#dataTables2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>