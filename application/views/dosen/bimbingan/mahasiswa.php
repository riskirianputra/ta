
<?php if ($mahasiswa->status_judul==='' ): ?>
	<div class="box box-danger">
	<div class="box-header with-border">
		<h1>Judul Yang di ajukan <?php echo ucfirst($mahasiswa->nama_mahasiswa) ?>:<p>
			<?php if (!$judul): ?>
			<?php else: ?>
			<?php echo ucfirst($judul->judul) ?>
			<?php endif ?>

			</p></h1>
		<a href="<?php echo base_url('dosen/bimbingan/judul_acc/'.$mahasiswa->id_mahasiswa) ?>" class="btn btn-success btn-lg"><i class="fa fa-check" onclick="return confirm('Yaking Ingin Menyetujui Judul ?')"></i> ACC</a>
		<a href="<?php echo base_url('dosen/bimbingan/judul_tolak/'.$mahasiswa->id_mahasiswa) ?>" class="btn btn-danger btn-lg"><i class="fa fa-close"></i> Tolak Judul</a>
	</div>
	<div class="box-body">
		<?php else: ?>

<div class="col-md-8">
<div class="box box-danger">
	<div class="box-header with-border">
		<table>
    <tbody>	
        <tr>
            <td width="200"><h4>Mahasiswa Bimbingan</h4></td>
            <td>:</td>
            <td><b><h4>&nbsp;<?php echo ucfirst($mahasiswa->nama_mahasiswa) ?></h4></b></td>
        </tr>
         <tr>
            <td><h4>Judul</h4></td>
            <td>:</td>
            <td><b><h4>&nbsp;<?php echo ucfirst($judul->judul) ?></h4></b></td>
        </tr>
    </tbody>
</table>
		<a href="<?php echo base_url('dosen/bimbingan/batal_judul/'.$mahasiswa->id_mahasiswa) ?>" class="btn btn-danger btn-lg"><i class="fa fa-close"></i> Batalkan Judul PKL</a>
	</div>
</div>
</div>

<div class="col-md-4">
<div class="box box-danger">
	<div class="box-header with-border">
		<?php if (empty($sidang->status_sidang)): ?>
		<h4><font color="red">Mahasiswa Bimbingan Belum ACC Sidang !</font></h4>
		<?php else: ?>
		<h4><i class="fa fa-exclamation-triangle"></i> Mahasiswa telah di ACC sidang</h4>
		<?php endif ?>
	</div>
</div>
</div>

	<div class="row">

		<div class="col-md-6">
		<div class="box box-info">
			<div class="callout callout-info">
		<h2 align="center">Balasan Dosen</h2>
			</div>
	<div class="box-body">
		<a href="#" data-target="#Modal_Tambah" id="modal" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#Modal_Tambah" align="center"><span class="fa fa-reply"></span> Balasan</a>
		<?php foreach ($total_sidang as $total_sidang) { ?>
		<?php if (empty($sidang->status_sidang)): ?>
		<?php if ($total_sidang >5): ?>
			<a href="<?php echo base_url('dosen/bimbingan/acc/'.$mahasiswa->id_mahasiswa) ?>" class="btn btn-success btn-lg"><i class="fa fa-check"></i> ACC Sidang</a>
		<?php endif ?>
		<?php endif ?>
		<?php } ?>
		<br>
		<br>
<div class="table-responsive">
 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>NO</th>
 			<th>FILE BIMBINGAN</th>
 			<th>CAPTION</th>
 			<th>TANGGAL KIRIM</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no=1; ?>
 		<tr>
 			<?php $no=1; foreach ($bimbingan_dsn as $b) { ?>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $b->file_bm_dsn ?></td>
 			<td><?php echo $b->komentar_dsn ?></td>
 			<td><?php echo $b->update_dsn ?></td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
	</div>
	</div>	
</div>
	</div>

	<div class="col-md-6">
		<div class="box box-danger">
			<div class="callout callout-danger">
		<p>
			<h2 align="center">Data bimbingan <?php echo ucfirst($mahasiswa->nama_mahasiswa) ?></h2>
		</p>
	</div>
	<div class="box-body">
<div class="table-responsive">
 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>NO</th>
 			<th>FILE BIMBINGAN</th>
 			<th>CAPTION</th>
 			<th>TANGGAL KIRIM</th>
 			<th></th>
 		</tr>
 	</thead>
 	<tbody>
 		<tr>
 			<?php $no=1; foreach ($bimbingan_mhs as $b) { ?>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $b->file_bm_mhs ?></td>
 			<td><?php echo $b->komentar_mhs ?></td>
 			<td><?php echo $b->update_mhs ?></td>
 			<td><a href="<?php echo base_url('dosen/bimbingan/download/'.$b->id_bm_mhs) ?>" class="btn btn-success btn-xs"><i class="fa fa-download"></i> Unduh</a></td> 			
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>
</div>
	</div>	
</div>
	</div>
		</div>
</div>
<?php endif ?>

<!-- MODAL ADD -->
           <div id="Modal_Tambah" class="modal fade">
            <div class="modal-dialog">
            <!--<form action="<?php //echo site_url('home/bimbingan/tambah'); ?>" method="post" enctype="multipart/form-data"> -->
            	<?php echo form_open_multipart('dosen/bimbingan/tambah/'.$mahasiswa->id_mahasiswa); ?>
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tabelnyaModalLabel"><b>Input file Bimbingan</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                  <div class="form-group row">
					  <label class="col-md-2 control-label">Uplaod File</label>
					  <div class="col-md-5">
					    <input type="file" name="file_bm_dsn" class="form-control" required="required">
					  </div>
					</div>
                  
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">komentar</label>
                            <div class="col-md-10">
                              <textarea type="text" name="komentar_dsn"  class="form-control" placeholder="Komentar"></textarea>
                            
                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal</button>
                    <button  type="submit" id="btn_save" class="btn btn-success"> Simpan</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->


