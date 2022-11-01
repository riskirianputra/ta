<div class="box">
    <div class="box-header">
        <h4><?= $title ?></h4>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA MAHASISWA</th>
                        <th>JADWAL SIDANG</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <?php $no=1; ?>
                <tbody>
                    <?php foreach($sidang as $i):?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $i->nama_mahasiswa ?></td>
                        <td><?php echo date('d F Y', strtotime($i->jadwal_sidang)) ?></td>
                        <td>
                            <a href="<?php echo base_url('dosen/sidang/penilaian/'.$i->id_mahasiswa) ?>" class="btn btn-success"><i class="fa fa-sign-in "></i> &nbsp; Masuk Ruang Sidang</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>


