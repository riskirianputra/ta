
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
                href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        body{
            background:none;
            
        }
        html{
            background:none;
        }
        #input {
            -moz-appearance: textfield;
            -webkit-appearance: textfield;
            background-color: white;
            background-color: -moz-field;
            border: 1px solid darkgray;
            box-shadow: 1px 1px 1px 0 lightgray inset;  
            font: -moz-field;
            font: -webkit-small-control;
            margin-top: 5px;
            margin-left: 23%;
            padding: 15px 3px;
            width: 398px;    
        }
        table{
            border: 2px solid black;
        }
    </style>
    </head>
    <!-- onload="print()" -->
    <!-- <body class="fixed-left" style="font-size:23px;" > -->
    <body class="fixed-left" style="font-size:14px;" onload="print()">
        <div class="text-center" style="margin-top:10px;font-family:serif;">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-xs-2">
                        <img src="<?= base_url('assets/upload/image/logo.png')?>" alt="" style="width:200px;">
                    </div>
                    <div class="col-xs-10">
                        <p style="font-size: 30px;"><b>Sekolah Tinggi Teknologi Payakumbuh</b></p>
                        <p style="font-size: 20px;"><b>Jl. Khatib Sulaiman, Sawah Padang, Payakumbuh Sel., Kota Payakumbuh, Sumatera Barat 26222</b></p>
                    </div>
                </div>
            </div>
        </div>
        <HR style="border-top: 2px solid #000;"></HR>
        <HR style="margin-top: -17px;border-top: 1px solid #000;"></HR>
        <div class="text-center">
        <h4><b>DAFTAR JADWAL SIDANG ALAT TUGAS AKHIR</b></h4>
        <h4><b>PROGRAM STUDI TEKNIK KOMPUTER</b></h4>
        <hr>
        </div>
        <!-- <hr> -->
        <br>
        <div class="text-center" style="padding-left: 100px;padding-right: 100px;">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <th><b>NO</b></th>
                        <th><b>NIM</b></th>
                        <th><b>NAMA</b></th>
                        <th><b>JADWAL SIDANG</b></th>
                    </thead>
                    <tbody>
                    <?php $no=0; foreach($isi as $i):?>
                    <?php $no++ ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$i->no_induk?></td>
                            <td><?=$i->nama_mahasiswa?></td>
                            <td><?=date('d F Y H:i:s',strtotime($i->jadwal_sidang_alat))?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center" style="margin-top:80px;margin-bottom:168px;margin-left: 410px;font-family:serif;">
            <p>Payakumbuh <?= date('d F Y')?></p>
            <br>
            <br>
            <p>(...............................................)</p>
            <p><b>( Ketua Program Studi Teknik Komputer )</b></p>
        </div>
        <!-- jQuery  -->
        <script src="<?= base_url()?>assets/admin/js/popper.min.js"></script>
        <script src="<?= base_url()?>assets/admin/js/bootstrap.min.js"></script>
        <script src="<?= base_url()?>assets/admin/js/detect.js"></script>
        <script src="<?= base_url()?>assets/admin/js/fastclick.js"></script>
        <script src="<?= base_url()?>assets/admin/js/jquery.blockUI.js"></script>
        <script src="<?= base_url()?>assets/admin/js/jquery.min.js"></script>
        <script src="<?= base_url()?>assets/admin/js/waves.js"></script>
        <script src="<?= base_url()?>assets/admin/js/jquery.nicescroll.js"></script>
        <script src="<?= base_url()?>assets/admin/js/jquery.slimscroll.js"></script>
        <script src="<?= base_url()?>assets/admin/js/jquery.scrollTo.min.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="<?= base_url()?>assets/admin/plugins/jquery-knob/jquery.knob.js"></script>

        <!--Morris Chart-->
		<script src="<?= base_url()?>assets/admin/plugins/morris/morris.min.js"></script>
		<script src="<?= base_url()?>assets/admin/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="<?= base_url()?>assets/admin/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="<?= base_url()?>assets/admin/js/jquery.core.js"></script>
        <script src="<?= base_url()?>assets/admin/js/jquery.app.js"></script>
		<!-- file uploads js -->
        <script src="<?= base_url()?>assets/admin/plugins/fileuploads/js/dropify.min.js"></script>
        <!-- isotope filter plugin -->
        <script type="text/javascript" src="<?= base_url()?>assets/admin/plugins/isotope/dist/isotope.pkgd.min.js"></script>

        <!-- Magnific popup -->
        <script type="text/javascript" src="<?= base_url()?>assets/admin/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    </body>
</html>