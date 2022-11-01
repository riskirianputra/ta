<?php if(!$mhs->judul_ta || !$mhs->bimbingan1 || !$mhs->bimbingan2 || $mhs->judul_ta == '' || $mhs->bimbingan1 == '' || $mhs->bimbingan2 == ''): ?>
<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open_multipart(base_url('home/data_sidang/save_data/'.$mhs->id_user),' class="form-horizontal"');
?>
<div class="row">
<div class="col-md-12">
  <div class="col-xs-6">
    <div class="form-group">
      <label class="col-md-2 control-label">Nama</label>
      <div class="col-md-5">
        <input type="text" class="form-control" placeholder="" name="nama" value="<?php echo $mhs->nama_mahasiswa ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">NIM</label>
      <div class="col-md-5">
        <input type="text" class="form-control" style="color:black;" placeholder="" name="no_induk" value="<?php echo $mhs->no_induk ?>" required readonly>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Email</label>
      <div class="col-md-5">
        <input type="email" class="form-control" placeholder="" name="email" value="<?php echo $mhs->email ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">No Telp/Hp</label>
      <div class="col-md-5">
        <input type="number" class="form-control" placeholder="" name="no_tlp" value="<?php echo $mhs->no_tlp ?>">
      </div>
    </div>
  </div>

  <div class="col-xs-6">
    <div class="form-group">
      <label class="col-md-2 control-label">Judul Tugas Akhir</label>
      <div class="col-md-5">
        <input type="text" class="form-control" placeholder="" name="judul_ta" value="<?php echo $mhs->judul_ta ?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label"> kartu bimbingan 1</label>
      <div class="col-md-5">
        <input type="file" class="form-control" name="bimbingan1">
        <input type="hidden" class="form-control" name="bimbingan1_hiden" value="<?php echo $mhs->bimbingan1 ?>">
      </div>
    </div> 

    <div class="form-group">
      <label class="col-md-2 control-label"> kartu bimbingan 2</label>
      <div class="col-md-5">
        <input type="file" class="form-control" name="bimbingan2">
        <input type="hidden" class="form-control" name="bimbingan2_hiden" value="<?php echo $mhs->bimbingan2 ?>">
      </div>
    </div> 

    <div class="form-group">
      <label class="col-md-2 control-label"></label>
      <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
          <i class="fa fa-save"></i>Simpan
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="reset">
          <i class="fa fa-times"></i>Reset
        </button>
      </div>
    </div>
   </div>
  </div>
</div>
</div>
<?php echo form_close(); ?>

<?php else: ?>
<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
// echo form_open_multipart(base_url('home/data_sidang/save_data'),' class="form-horizontal"');
?>
<div class="row">
<div class="col-md-12">
  <div class="col-xs-6">
    <div class="form-group">
      <label class="col-md-2 control-label">Nama</label>
      <div class="col-md-5">
        <input type="text" class="form-control" style="color:black;" placeholder="" name="nama" value="<?php echo $mhs->nama_mahasiswa ?>" required readonly>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">NIM</label>
      <div class="col-md-5">
        <input type="text" class="form-control" style="color:black;" placeholder="" name="no_induk" value="<?php echo $mhs->no_induk ?>" required readonly>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Email</label>
      <div class="col-md-5">
        <input type="email" class="form-control" style="color:black;" placeholder="" name="email" value="<?php echo $mhs->email ?>" required readonly>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">No Telp/Hp</label>
      <div class="col-md-5">
        <input type="number" class="form-control" style="color:black;" placeholder="" name="no_tlp" value="<?php echo $mhs->no_tlp ?>" readonly>
      </div>
    </div>
  </div>

  <div class="col-xs-6">
    <div class="form-group">
      <label class="col-md-2 control-label">Judul Tugas Akhir</label>
      <div class="col-md-5">
        <input type="text" class="form-control" style="color:black;" placeholder="" name="judul_ta" value="<?php echo $mhs->judul_ta ?>" readonly>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Upload kartu bimbingan 1</label>
      <div class="col-md-5">
      <img src="<?= base_url('assets/upload/image/'.$mhs->bimbingan1)?>" alt="Kartu Bimbingan 1" width="200">
        <!-- <input type="file" class="form-control" name="bimbingan1">
        <input type="hidden" class="form-control" name="bimbingan1_hiden" value="<?php echo $mhs->bimbingan1 ?>"> -->
      </div>
    </div> 

    <div class="form-group">
      <label class="col-md-2 control-label">Upload kartu bimbingan 2</label>
      <div class="col-md-5">
      <img src="<?= base_url('assets/upload/image/'.$mhs->bimbingan2)?>" alt="Kartu Bimbingan 2" width="200">
        <!-- <input type="file" class="form-control" name="bimbingan2">
        <input type="hidden" class="form-control" name="bimbingan2_hiden" value="<?php echo $mhs->bimbingan2 ?>"> -->

      </div>
    </div> 

    <!-- <div class="form-group">
      <label class="col-md-2 control-label"></label>
      <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
          <i class="fa fa-save"></i>Simpan
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="reset">
          <i class="fa fa-times"></i>Reset
        </button>
      </div>
    </div> -->
   </div>
  </div>
</div>
</div>
<?php echo form_close(); ?>
<?php endif; ?>