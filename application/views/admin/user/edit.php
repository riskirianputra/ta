<?php 
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/user/edit/'. $user->id_user),' class="form-horizontal"');
?>

<div class="form-group">
  <label class="col-md-2 control-label">No Induk</label>
  <div class="col-md-5">
    <input type="text" class="form-control" placeholder="Username" name="no_induk" value="<?php echo $user->no_induk ?>">
  </div>
</div>

  <div class="col-md-5">
    <button type="button" class="btn btn-warning btn-xs" id="open" onclick="openIt()"><i class="fa fa-lock"></i> GantiPassword</button>
    <button type="button" class="btn btn-danger btn-xs" id="close" onclick="closeIt()" style="display:none;"><i class="fa fa-close"></i> Batal</button>
  </div>

<div class="form-group" id="pass" style="display: none;">
  <label class="col-md-2 control-label">Password</label>
  <div class="col-md-5">
    <input type="password" class="form-control" name="password" placeholder="Password" value="">
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

<script>
function openIt(){
  document.getElementById('pass').style.display = 'block';
  document.getElementById('open').style.display = 'none';
  document.getElementById('close').style.display = 'block';
}

function closeIt(){
  document.getElementById('pass').style.display = 'none';
  document.getElementById('open').style.display = 'block';
  document.getElementById('close').style.display = 'none';
}

</script>