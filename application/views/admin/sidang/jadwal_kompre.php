<?php if(!$cek): ?>
<h2 style="color:white;"><?=$title?></h2>
<hr>
<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/sidang/save_jadwal_kompre/'. $mhs->id_mahasiswa.'/0'),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-6 control-label">Nama Mahasiswa</label>
  <div class="col-md-6">
    <input type="text" class="form-control" placeholder="Nama Pengguna" name="jadwal_sidang" value="<?php echo $mhs->nama_mahasiswa ?>" readonly style="color:black;">
  </div>
</div>

<div class="form-group">
  <label class="col-md-6 control-label">NIM Mahasiswa</label>
  <div class="col-md-6">
    <input type="text" class="form-control" placeholder="Nama Pengguna" name="jadwal_sidang" value="<?php echo $mhs->no_induk ?>" readonly style="color:black;">
  </div>
</div>

<div class="form-group">
  <label class="col-md-6 control-label">Sidang Mulai</label>
  <div class="col-md-6">
    <input type="datetime-local" class="form-control inpt-awal" placeholder="Nama Pengguna" name="jadwal_sidang_kompre" value="" onchange="show_selesai()" required>
  </div>
</div>

<div class="form-group  sidang-selesai">
  
</div>

<div class="form-group ketua">
  
</div>

<div class="form-group sekre">
 
</div>

<div class="form-group anggota">
 
</div>


<div class="form-group submit-form">
 
</div>

<?php echo form_close(); ?>

<?php else: ?>

<h2 style="color:white;">Jadwal Sudah di Set</h2>
<hr>

<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/sidang/save_jadwal_kompre/'. $mhs->id_mahasiswa.'/1'),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-6 control-label">Nama Mahasiswa</label>
  <div class="col-md-6">
    <input type="text" class="form-control" placeholder="Nama Pengguna" name="jadwal_sidang" value="<?php echo $mhs->nama_mahasiswa ?>" readonly style="color:black;">
  </div>
</div>

<div class="form-group">
  <label class="col-md-6 control-label">NIM Mahasiswa</label>
  <div class="col-md-6">
    <input type="text" class="form-control" placeholder="Nama Pengguna" name="jadwal_sidang" value="<?php echo $mhs->no_induk ?>" readonly style="color:black;">
  </div>
</div>

<div class="form-group">
  <label class="col-md-6 control-label">Sidang Mulai</label>
  <div class="col-md-6">
    <input type="datetime-local" class="form-control inpt-awal" placeholder="Nama Pengguna" name="jadwal_sidang_kompre" value="" onchange="show_selesai()" required>
  </div>
</div>

<div class="form-group  sidang-selesai">
  
</div>

<div class="form-group ketua">
  
</div>

<div class="form-group sekre">
 
</div>

<div class="form-group anggota">
 
</div>


<div class="form-group submit-form">
 
</div>

<?php echo form_close(); ?>
<?php endif; ?>

<br>
<hr style="border-top: 1px solid rgb(255 255 255) !important;">
<h2 style="color:white;">Jadwal Sidang Mahasiswa</h2>
<hr>
<section class="content">
<br>
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>NO</th>
      <th>NIM</th>
      <th>NAMA</th>
      <th>KETUA</th>
      <th>SEKRETAIS</th>
      <th>KETUA</th>
      <th>JADWAL</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach ($list_jadwal as $i ) { ?>
    <tr>
      <td><?php echo $no++ ?></td>
      <td><?php echo $i->no_induk ?></td>
      <td><?php echo $i->nama_mahasiswa ?></td>
      <td><?php echo $i->ketua ?></td>
      <td><?php echo $i->sekre ?></td>
      <td><?php echo $i->anggota ?></td>
      <td><?php echo date('d F Y H:i:s', strtotime($i->jadwal_sidang_kompre)) ?></td>
    </tr>
<?php } ?>
  </tbody>
</table>
</section>

<script>
  function show_selesai(){
    html = '';
    html += `<label class="col-md-6 control-label">Sidang Selesai</label>
              <div class="col-md-6">
                <input type="datetime-local" class="form-control inpt-selesai" placeholder="Nama Pengguna" name="jadwal_sidang_kompre_akhir" value="" onchange="show_ketua()" required>
              </div>`;
    $(".sidang-selesai").html(html);
  }

  function show_ketua(){
    var awal = $('.inpt-awal').val();
    var akhir = $('.inpt-selesai').val();

    $.ajax({
        type: "POST",
        url: '<?= base_url('admin/sidang/ajax_ketua_kompre/')?>'+awal+'/'+akhir,
        dataType: "JSON",
        success: function(data){
          console.log(data);
          html ='';
          html += `<label class="col-md-6 control-label">Ketua Penguji</label>
              <div class="col-md-6">
              <select name="ketua_kompre" class="form-control ketua" id="ketua" onchange="show_sekre()" required>`;
          html +=`<option value="">-=Pilih Dosen=-</option>`;
          for (i = 0; i < data.length; i++) {
          html +=`<option value="`+data[i].id_dosen+`">`+data[i].nama_dosen+`</option>`;
          }
          html += `</select>
                  </div>`;
        $(".ketua").html(html);

        }
    });
  }

  function show_sekre(){
    var awal = $('.inpt-awal').val();
    var akhir = $('.inpt-selesai').val();
    var id_ketua = $('#ketua').val();
    
    $.ajax({
        type: "POST",
        url: '<?= base_url('admin/sidang/ajax_ketua_kompre/')?>'+awal+'/'+akhir,
        dataType: "JSON",
        success: function(data){
          html ='';
          html += `<label class="col-md-6 control-label">Sekretaris Penguji</label>
              <div class="col-md-6">
              <select name="sekre_kompre" id="sekre" class="form-control" onchange="show_anggota()" required>`;
          html +=`<option value="">-=Pilih Dosen=-</option>`;
          for (i = 0; i < data.length; i++) {
            if (data[i].id_dosen == id_ketua) {
              html +=`<option value="`+data[i].id_dosen+`" disabled>`+data[i].nama_dosen+`</option>`;
            }else{
              html +=`<option value="`+data[i].id_dosen+`">`+data[i].nama_dosen+`</option>`;
            }
          }
          html += `</select>
                  </div>`;
        $(".sekre").html(html);
        }
    });
  }

  function show_anggota(){
    var awal = $('.inpt-awal').val();
    var akhir = $('.inpt-selesai').val();
    var id_ketua = $('#ketua').val();
    var id_sekre = $('#sekre').val();
    $.ajax({
        type: "POST",
        url: '<?= base_url('admin/sidang/ajax_ketua_kompre/')?>'+awal+'/'+akhir,
        dataType: "JSON",
        success: function(data){
          html ='';
          html += `<label class="col-md-6 control-label">Anggota Penguji</label>
              <div class="col-md-6">
              <select name="anggota_kompre" class="form-control" onchange="show_submit()" required>`;
          html +=`<option value="">-=Pilih Dosen=-</option>`;
          for (i = 0; i < data.length; i++) {
            if (data[i].id_dosen == id_ketua || data[i].id_dosen == id_sekre) {
              html +=`<option value="`+data[i].id_dosen+`" disabled>`+data[i].nama_dosen+`</option>`;
            }else{
              html +=`<option value="`+data[i].id_dosen+`">`+data[i].nama_dosen+`</option>`;
            }
          }
          html += `</select>
                  </div>`;
        $(".anggota").html(html);
        }
    });
  }

  function show_submit(){
    html = '';
    html += ` <label class="col-md-6 control-label"></label>
              <div class="col-md-5">
                <button class="btn btn-success btn-lg" name="submit" type="submit">
                  <i class="fa fa-save"></i>Simpan
                </button>
                <a href="<?php echo base_url('admin/user') ?>" class="btn btn-danger btn-lg" >Batal</a>
              </div>`;
    $(".submit-form").html(html);
  }
      
 </script>