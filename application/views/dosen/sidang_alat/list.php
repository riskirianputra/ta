<h2 style="color:white;"><?=$title?></h2>
<hr>
<section class="content">
<?php 
// notifikasi
if ($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>';
	echo $this->session->flashdata('sukses');
	echo '</div>' ;
}
// notifikasi
if ($this->session->flashdata('danger')) {
	echo '<div class="alert alert-danger" style="background-color:red; color:white;"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>';
	echo $this->session->flashdata('danger');
	echo '</div>' ;
}
 ?>
<!-- <a href="<?=base_url('admin/sidang/cetak_jadwal_sidang_sa');?>" class="btn btn-success" target="_blink" style="margin-bottom: 29px;"><i class="fa fa-print"></i> Cetak Jadwal Sidang</a> -->
<br>
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>NO</th>
      <th>NIM</th>
      <th>NAMA</th>
      <th>JUDUL</th>
      <th>JADWAL SIDANG ALAT</th>
      <th>ROLE ANDA</th>
      <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach ($mhs as $i ) { ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $i->no_induk ?></td>
      <td><?php echo $i->nama_mahasiswa ?></td>
      <td><?php echo $i->judul_ta ?></td>
      <td><?php echo date('d F Y H:i:s',strtotime($i->jadwal_sidang_alat)) ?></td>
      <?php if($dosen->id_dosen == $i->ketua_sa):?>
        <td>Ketua Penguji</td>
      <?php elseif($dosen->id_dosen == $i->sekre_sa): ?>
        <td>Sekretaris Penguji</td>
      <?php elseif($dosen->id_dosen == $i->anggota_sa): ?>
        <td>Anggota Penguji</td>
      <?php endif;?>
      <?php 
        $sekarang = date('Y-m-d H:i:s');
        $str = strtotime($sekarang);
        $str_jadwal = strtotime($i->jadwal_sidang_alat);
      ?>
      <?php if($str < $str_jadwal): ?>
        <td><button class="btn btn-danger btn-sm">Persidangnan Belum Mulai</button></td>
      <?php else: ?>
        <td><a href="<?php echo base_url('dosen/sidang/ruang_sidang_alat/'.$i->id_mahasiswa) ?>" class="btn btn-info btn-sm"><i class="fa fa-gavel"></i> Sidang</a></td>
      <?php endif; ?>
    </tr>

    <!-- <h1>Tanggal sekarang = <?=date('Y-m-d H:i:s')?> </h1>
    <h1>Tanggal database = <?=$i->jadwal_sidang_alat?></h1> -->
<?php } ?>
  </tbody>
</table>
</section>
 