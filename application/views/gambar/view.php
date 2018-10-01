

<!DOCTYPE html>
<html>
<head>
	<title> View Staff </title>
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/logo.png"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/iseng.css"/>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top ">
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
				<a href="<?php echo base_url() ?>index.php/gambar/logout" type="submit" class="btn btn-warning list-admin"><i class="fa fa-sign-out"></i> Logout</a>
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
			  <a href="<?php echo base_url("index.php/gambar/tambah"); ?>" class="list-group-item"><i class="fa fa-plus"></i> Tambah Staff </a>
			  <a href="<?php echo base_url() ?>index.php/gambar/logout" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
			  <div class="panel-heading navbar-inverse">
			    <h3 class="panel-title text-white"><i class="fa fa-user-circle"></i> View Staff </h3>
			  </div>
			  <div class="panel-body">
				<h2 class="header"> <i class="fa fa-user-circle" ></i> Data Staff</h2>
				<hr>
				<div class="row">
					<div class="gp_btn">
	                      <ul>
			                    <div class="col-md-4">
			                           <li>
			                                <?php echo form_open('gambar/cari');?>
			                                  <div class="input-group">
			                                     <input type="text" name="key" class="form-control"placeholder="Search..." size="50" required>
			                                      <div class="input-group-btn">
			                                     	      <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
			                                     </div>
			                                  </div>
			                                <?php echo form_close();?>
			                           </li>
			                    </div>
			                	<div class="col-md-1" style="padding: 0px;" >
			                          	<li>
			                           		<a style="margin: 0px;" class="btn2" href="<?php echo base_url(); ?>index.php/gambar">Reset</a>
			                           </li>
			                 	</div>
	                      </ul>
	                </div>
	                <div class="col-md-5">
	                </div>
	                <div class="col-md-1">
	                	<a class="btn btn-primary" href='<?php echo base_url("index.php/gambar/tambah"); ?>'>Tambah Data <i class="fa fa-plus"></i></a>
	                </div>
              </div>	


				<div class="table-responsive">

					<table id="gp_tabel"  class="table table-bordered " border="1" cellpadding="7">
						<tr style='background-color: #337ab7; '>
							<th>No</th>
							<th width="10%">Gambar</th>
							<th>Card_ID</th>
							<th>Nama</th>
							<th>Gender</th>
							<th>Telepon</th>
							<th width="30%">Alamat</th>
							<th colspan="2" width="2%">Aksi</th>
						</tr>
						<tbody>
					<?php
					if($this->uri->segment(3)){
	                     $no=$this->uri->segment(3);
	                }
	                else{
	                     $no=0;
	                }
						 // Jika data pada database tidak sama dengan empty (alias ada datanya)
							foreach($gambar as $data){  // Lakukan looping pada variabel gambar dari controller
							  $no++;	
								echo "<tr>";
								echo "<td>$no</td>";
								echo "<td><img src='".base_url("images/".$data->nama_file)."' width='100' height='100'></td>";
								echo "<td>".$data->card_id."</td>";
								echo "<td>".$data->nama."</td>";
								echo "<td>".$data->jenis_kelamin."</td>";
								echo "<td>".$data->telp."</td>";
								echo "<td>".$data->alamat."</td>";
								echo "<td><a class='btn btn-sm btn-success' href='".base_url("index.php/gambar/ubah/".$data->id)."'> Edit <i class='fa fa-edit'></i></a></td>";
								echo "<td><a class='btn btn-sm btn-danger' href='".base_url("index.php/gambar/hapus/".$data->id)."'> Hapus <i class='fa fa-trash'></i></a></td>";
							echo "</tr>";
							
						}
					?>
					</tbody>
					</table>
						<div id="pagination">
			                 <ul class="gp_pagination">
			                      <?php foreach ($links as $link) {
			                           echo "<li>". $link."</li>";
			                      } ?>
			                 </ul>
			            </div>
			
	   			</div>
			</div>
		</div>
	</div>
</div> 

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>