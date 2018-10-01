

<!DOCTYPE html>
<html>
<head>
	<title> Add Staff </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/logo.png"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/iseng.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/image.css"/>
</head>
	
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	<div class="navbar-form navbar-right">
        	</div>
      </div>
    </nav>
<div class="container" style="margin-top: 80px">

	<div class="row">
		<div class="col-md-2">
			<div class="list-group">
			  <a href="#" class="list-group-item list-admin active">
			 <?php echo $this->session->userdata("user_nama") ?>
			  </a>
			  <a href="<?php echo base_url("index.php/gambar/"); ?>" class="list-group-item"><i class="fa fa-user-circle"></i> Staff </a>
			  <a href="<?php echo base_url("index.php/gambar/logout"); ?>" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
			  <div class="panel-heading navbar-inverse">
			    <h3 class="panel-title text-white"><i class="fa fa-plus"></i> Tambah Staff </h3>
			  </div>
			  <div class="panel-body">
			  	<h3><i class="fa fa-wpforms"></i> Tambah Data Staff</h3>
					<hr>
						<div style="color: red;"><?php echo (isset($message))? $message : ""; ?></div>
						<!-- Menampilkan Error jika validasi tidak valid -->
						<div style="color: red;"><?php echo validation_errors(); ?></div>

						<div class="container">
							<?php echo form_open("gambar/tambah", array('enctype'=>'multipart/form-data')); ?>
							
							<div id="upload" onclick="$('#picture').click()">
							<div id="imgp"><img src="<?php echo base_url();?>assets/img/default.png" class="img-responsive"  /></div>
							<?php echo set_radio('gambar', 'file_name'); ?>
							</div>
							<input type="file" name="input_gambar" id="picture"/>
							<img id="loader" src="<?php echo base_url();?>assets/img/loaderIcon.gif" style="background:transparent; width:30px; margin-left: 130px; visibility:hidden;" >
							<div id = "filename" name="filename" ></div>	
						<!--glyphicon glyphicon-lock-->
						
							<div class="form-group row">
								<div class="col-md-1">
									<label> NIS </label>
								</div>
								<div class="col-md-8">
									<input type="text" name="input_card_id" value="<?php echo set_value('input_card_id'); ?>" class="form-control">
								</div>
							</div>
							
							<div class="form-group row">
								<div class="col-md-1">
									<label> Nama </label>
								</div>
								<div class="col-md-8">
									<input type="text" name="input_nama" value="<?php echo set_value('input_nama'); ?>" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-1">
									<label> Gender </label>
								</div>
								<div class="col-md-2">
									<input  type="radio" name="input_jeniskelamin" value="Laki-laki" <?php echo set_radio('jeniskelamin', 'Laki-laki'); ?>> Laki-laki
									
								</div>
								<div class="col-md-2">
									<input type="radio" name="input_jeniskelamin" value="Perempuan" <?php echo set_radio('jeniskelamin', 'Perempuan'); ?>> Perempuan
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-1">
									<label> Telpon </label>
								</div>
								<div class="col-md-8">
									<input type="text" class="form-control" name="input_telp" value="<?php echo set_value('input_telp'); ?>">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-1">
									<label> Alamat </label>
								</div>
								<div class="col-md-8">
									<textarea class="form-control textarea" name="input_alamat"><?php echo set_value('input_alamat'); ?></textarea>
								</div>
							</div>
							<hr>
							<input  type="submit" class="btn btn-success" name="submit" value="Simpan"/>
							<a href="<?php echo base_url(); ?>">
							<input class="btn btn-warning" type="button" value="Batal"></a>
						</div>

			
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/dropimg.js"></script> 
</body>
</html>