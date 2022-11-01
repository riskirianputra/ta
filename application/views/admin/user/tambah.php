<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open_multipart(base_url('admin/user/tambah_data'),' class="form-horizontal"');
?>
<div class="row">
<div class="col-md-12">
  <div class="col-xs-6">
    <div class="form-group">
      <label class="col-md-2 control-label">Nama</label>
      <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?php echo set_value('nama') ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Email</label>
      <div class="col-md-5">
        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email') ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">NIDN / NIM</label>
      <div class="col-md-5">
        <input type="text" class="form-control" placeholder="Nim" name="no_induk" value="<?php echo set_value('no_induk') ?>" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">Password</label>
      <div class="col-md-5">
        <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password') ?>" required>
      </div>
    </div> 
  </div>

  <div class="col-xs-6">
    <div class="form-group">
      <label class="col-md-2 control-label">Level Akses</label>
      <div class="col-md-2">
        <select name="akses_level" class="form-control" >
          <option value="Dosen">Dosen</option>
          <option value="mahasiswa">Mahasiswa</option>
        </select>
        <!-- <input type="text" class="form-control" placeholder="Level Akses" name="akses_level" value="Dosen" required readonly style="color:black;"> -->
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2 control-label">No Telp/Hp</label>
      <div class="col-md-5">
        <input type="text" class="form-control" placeholder="No Telp/Hp" name="no_tlp" value="<?php echo set_value('no_tlp') ?>">
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
<?php echo form_close(); ?>