<main role="main">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 offset-md-2 col-lg-offset-2 toppad" >
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo $user->nama; ?></h3>
            
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 col-lg-3 " align="center">
                <img alt="Foto Mahasiswa" src="<?php
                  echo base_url('assets/template/images/avatar.png');
                ?>" class="img-circle img-fluid" width="200px" height="300px">
                <div class="mt-1">
                  <a role="button" class="btn btn-outline-primary btn-block btn-sm" href="<?php echo base_url('home/dasbor/edit_mahasiswa/'. $user->id_mahasiswa) ?>">Edit</a>
                </div>
              </div>
              <div class=" col-md-9 col-lg-9 ">
                <!-- <table id="tabel" class="table table-user-information"> -->
                <table id="tabel" cellpadding=10 cellspacing=15 align="center">
                  <tbody>
                    <tr>
                      <th>NO INDUK</th>
                      <td><strong>&nbsp;:</strong></td>
                      <td>&nbsp;<?php echo $user->no_induk; ?></td>
                    </tr>
                    <tr>
                      <th>Tempat Tanggal Lahir</th>
                      <th><strong>&nbsp;:</strong></th>
                      <td>&nbsp;<?php echo $user->tempat_lahir ?>/<?php echo $user->tanggal_lahir  ?></td>
                    </tr>
                    <tr>
                      <th>Tahun Masuk</th>
                      <td><strong>&nbsp;:</strong></td>
                      <td>&nbsp;<?php echo $user->tahun_masuk ?></td>
                    </tr>
                    <tr>
                      <th>Prodi</th>
                      <td><strong>&nbsp;:</strong></td>
                      <td>&nbsp;<?php echo $user->prodi ?></td>
                    </tr>
                    <tr>
                      <th>Alamat</th>
                      <td><strong>&nbsp;:</strong></td>
                      <td>&nbsp;<?php echo $user->alamat ?></td>
                    </tr>
                    <tr>
                      <th>Kontak</th>
                      <td><strong>&nbsp;:</strong></td>
                      <td>&nbsp;<?php echo $user->no_tlp ?></td>
                    </tr>
                  </tbody>
                </table>

              </div>

            </div>
          </div>
          <div class="card-footer">
            <a href="<?php echo base_url('home/dasbor/edit/'. $user->id_user) ?>" role="button" class="btn btn-primary ">Ganti Password</a>
            <a href="<?php echo site_url('home/dasbor/qrcode/'.$user->no_induk); ?>" role="button" class="btn btn-success">QRcode</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
