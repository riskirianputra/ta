<h2 style="color:white;"><?=$title?></h2>
<hr>
<section class="content">
<a href="<?=base_url('admin/sidang/cetak_jadwal_sidang_kompre');?>" class="btn btn-success" target="_blink" style="margin-bottom: 29px;"><i class="fa fa-print"></i> Cetak Jadwal Sidang</a>
<br>
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>NO</th>
      <th>NIM</th>
      <th>NAMA</th>
      <th>JUDUL</th>
      <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach ($mhs as $i ) { ?>
    <?php if(!$i->no_induk || $i->no_induk == ''): ?>
    <?php else: ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $i->no_induk ?></td>
      <td><?php echo $i->nama_mahasiswa ?></td>
      <td><?php echo $i->judul_ta ?></td>
      <?php if($i->jadwal_sidang_kompre): ?>
      <td><a href="<?php echo base_url('admin/sidang/jadwal_kompre/'.$i->id_mahasiswa) ?>" class="btn btn-warning"><i class="fa fa-calendar"></i> Edit Jadwal Sidang</a></td>
      <?php else: ?>
      <td><a href="<?php echo base_url('admin/sidang/jadwal_kompre/'.$i->id_mahasiswa) ?>" class="btn btn-info"><i class="fa fa-calendar"></i> Set Jadwal Sidang</a></td>
      <?php endif; ?> 
    </tr>
    <?php endif; ?>
<?php } ?>
  </tbody>
</table>
</section>
 