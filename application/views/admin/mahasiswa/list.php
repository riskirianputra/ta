<p>
	<a href="<?php echo base_url('admin/user/tambah_data') ?>" class="btn btn-success btn btn-lg">
		<i class="fa fa-plus"></i>Tambah Baru 
	</a>
</p>

<?php 
// notifikasi
if ($this->session->flashdata('sukses')) {
	echo '<p class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>';
	echo $this->session->flashdata('sukses');
	echo '</div>' ;
}
 ?>

 <table class="table table-bordered" id="example1">
 	<thead>
 		<tr>
 			<th>NO</th>
 			<th>NAMA</th>
 			<th>EMAIL</th>
 			<th>USERNAME / NIM</th>
 			<th>TEMPAT/TANGGAL LAHIR</th>
 			<th>TAHUN MASUK</th>
 			<th>PRODI</th>
 			<th>ALAMAT</th>
 			<th>AGAMA</th>
 			<th>NO TLP/HP</th>
 			<th><u>LEVEL</u> ACTION</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $no=1; foreach ($user as $user ) { ?>
 		<tr>
 			<td><?php echo $no++ ?></td>
 			<td><?php echo $user->nama ?></td>
 			<td><?php echo $user->email ?></td>
 			<td><?php echo $user->no_induk  ?></td>
 			<td><?php echo $user->tempat_lahir ?> / <?php echo $user->tanggal_lahir ?></td>
 			<td><?php echo $user->tahun_masuk  ?></td>
 			<td><?php echo $user->prodi  ?></td>
 			<td><?php echo $user->alamat  ?></td>
 			<td><?php echo $user->agama  ?></td>
 			<td><?php echo $user->no_tlp  ?></td>
 			<td><?php echo $user->akses_level ?></td>
 			<td>
 				<a href="<?php echo base_url('admin/user/edit_mahasiswa/'. $user->id_mahasiswa) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

 				<?php if ($user->akses_level === 'mahasiswa') : ?>
 				
 				<a href="<?php echo base_url('admin/user/delete_mahasiswa/'. $user->id_mahasiswa) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yaking Ingin Menghapus Data ?')"><i class="fa fa-trash-o"></i>Hapus</a>
 				<?php endif ?>

 			</td>
 		</tr>
 		<?php } ?>
 	</tbody>
 </table>