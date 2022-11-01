<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/user/edit_mahasiswa/'. $user->id_mahasiswa),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">Tanggal Lahir</label>
  <div class="col-md-3">
    <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?php echo $user->tanggal_lahir ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tempat Lahir</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo $user->tempat_lahir ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Tahun Masuk</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Tahun Masuk" name="tahun_masuk" value="<?php echo $user->tahun_masuk ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Prodi</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Prodi" name="prodi" value="<?php echo $user->prodi ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Alamat</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?php echo $user->alamat ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Agama</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Agama" name="agama" value="<?php echo $user->agama ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">Golongan Darah</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Golongan Darah" name="gol_darah" value="<?php echo $user->gol_darah ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-md-2 control-label">No Telp/Hp</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="No Telp/Hp" name="no_tlp" value="<?php echo $user->no_tlp ?>">
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
    <a href="<?php echo base_url('admin/user') ?>" class="btn btn-danger btn-lg" >Batal</a>
  </div>
</div>

<?php echo form_close(); ?>



