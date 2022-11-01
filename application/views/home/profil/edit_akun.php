<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('home/dasbor/edit/'. $user->id_user),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Nama Pengguna</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Nama Pengguna" name="nama" value="<?php echo $user->nama ?>" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">NO INDUK</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Username" name="no_induk" value="<?php echo $user->no_induk ?>" readonly>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password" class="form-control" name="password" placeholder="Masukan Password Baru" value="" required>
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label"></label>
  <div class="col-md-5">
    <button class="btn btn-success btn-lg" name="submit" type="submit">
      <i class="fa fa-save"></i>Simpan
    </button>
    <a href="<?php echo base_url('home/dasbor') ?>" class="btn btn-danger btn-lg" >Batal</a>
  </div>
</div>

<?php echo form_close(); ?>



