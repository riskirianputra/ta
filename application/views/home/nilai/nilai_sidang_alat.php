
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
        textarea{
            border:none;
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
        <h4><b>DAFTAR PENILAIAN SIDANG PENGUJIAN ALAT/PROGRAM </b></h4>
        <h4><b>TUGAS AKHIR MAHASISWA PROGRAM STUDI TEKNIK KOMPUTER </b></h4>
        <HR></HR>
        <h6><b> Nama : <?=$mhs->nama_mahasiswa?></b></h6>
        <h6><b> NIM : <?=$mhs->no_induk?></b></h6>
        <hr>
        </div>
        <!-- <hr> -->
        <br>
        <div class="text-center" style="padding-left: 100px;padding-right: 100px;">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <th><b>NO</b></th>
                        <th><b>MATERI PENILAIAN</b></th>
                        <th><b>NILAI</b></th>
                    </thead>
                    <tbody>
                    <tr>
                            <td>1</td>
                            <td>Performance</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>a.Penampilan</td>
                            <td><?=$nilai_p1->penampilan_sa?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>b.Presentasi</td>
                            <td><?=$nilai_p1->presentasi_sa?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Hasil Program / Alat</td>
                            <td><?=$nilai_p1->hasil_program_sa?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Penguasaan Tugas Akhir</td>
                            <td><?=$nilai_p1->penguasaan_sa?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Penulisan Tugas Akhir</td>
                            <td><?=$nilai_p1->penulisan_sa?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>TOTAL</b></td>
                            <td><?=$nilai_p1->total_nilai_sa?></td>
                        </tr>
                        <tr>
                            <td><b>Komentar</b></td>
                            <td colspan="2"><textarea name="komentar" id="" cols="60" rows="5" style="resize:horizontal" readonly><?=$nilai_p1->komentar_sa?></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center" style="margin-top:10px;margin-bottom:10px;margin-left: 410px;font-family:serif;">
            <p>Payakumbuh <?= date('d F Y')?></p>
            <p><b><?=ucfirst($nilai_p1->penguji)?></b></p>
            <br>
            <br>
            <!-- <p>(...............................................)</p> -->
            <p>( <?=$nilai_p1->nama_dosen?> )</p>
        </div>
        <br><br>
        <br>
        <br>
        <br>
        <br>
<!-- ========================== HALAMAN 2 ====================================== -->
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
        <h4><b>DAFTAR PENILAIAN SIDANG PENGUJIAN ALAT/PROGRAM </b></h4>
        <h4><b>TUGAS AKHIR MAHASISWA PROGRAM STUDI TEKNIK KOMPUTER </b></h4>
        <HR></HR>
        <h6><b> Nama : <?=$mhs->nama_mahasiswa?></b></h6>
        <h6><b> NIM : <?=$mhs->no_induk?></b></h6>
        <hr>
        </div>
        <!-- <hr> -->
        <br>
        <div class="text-center" style="padding-left: 100px;padding-right: 100px;">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <th><b>NO</b></th>
                        <th><b>MATERI PENILAIAN</b></th>
                        <th><b>NILAI</b></th>
                    </thead>
                    <tbody>
                    <tr>
                            <td>1</td>
                            <td>Performance</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>a.Penampilan</td>
                            <td><?=$nilai_p2->penampilan_sa?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>b.Presentasi</td>
                            <td><?=$nilai_p2->presentasi_sa?></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Hasil Program / Alat</td>
                            <td><?=$nilai_p2->hasil_program_sa?></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Penguasaan Tugas Akhir</td>
                            <td><?=$nilai_p2->penguasaan_sa?></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Penulisan Tugas Akhir</td>
                            <td><?=$nilai_p2->penulisan_sa?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><b>TOTAL</b></td>
                            <td><?=$nilai_p2->total_nilai_sa?></td>
                        </tr>
                        <tr>
                        <td><b>Komentar</b></td>
                        <td colspan="2"><textarea name="komentar" id="" cols="60" rows="5" style="resize:horizontal" readonly><?=$nilai_p2->komentar_sa?></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center" style="margin-top:10px;margin-bottom:10px;margin-left: 410px;font-family:serif;">
            <p>Payakumbuh <?= date('d F Y')?></p>
            <p><b><?=ucfirst($nilai_p2->penguji)?></b></p>
            <br>
            <br>
            <!-- <p>(...............................................)</p> -->
            <p>( <?=$nilai_p2->nama_dosen?> )</p>
        </div>
        <br><br>
        <br>
        <br>
        <br>
        <br>
        
<!-- ======================================== Halaman 3 =============================================== -->
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
        <h4><b>REKAPITULASI NILAI SIDANG PENGUJIAN ALAT/PROGRAM</b></h4>
        <h4><b>TUGAS AKHIR MAHASISWA</b></h4>
        <hr>
        </div>
        <div class="text-left" style="margin-left:200px">
        <h5>Nama&nbsp; : <?=strtoupper($nilai_p2->nama_mahasiswa)?></h5>
        <h5>NPM&nbsp;&nbsp;&nbsp; : <?=($nilai_p2->no_induk)?></h5>
        <h5>Judul :</h5>
        </div>
        <div class="text-center">
        <div id="input" contenteditable><h5><b><?=(strtoupper($nilai_p2->judul_ta))?></b></h5></div>
        </div>
        <br>
        <div class="text-center" style="padding-left: 100px;padding-right: 100px;">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <!-- <thead>
                        <th><b>PENILAIAN</b></th>
                        <th><b>NILAI</b></th>
                        <th><b>BOBOT ( % )</b></th>
                        <th><b>NILAI X</b></th>
                    </thead> -->
                    <?php 
                        $total_nilai = $nilai_p1->total_nilai_sa + $nilai_p2->total_nilai_sa;
                        $nilai_rata = $total_nilai / 2;
                    ?>
                    <tbody>
                        <tr>
                            <td>NILAI KETUA PENGUJI 1</td>
                            <td><?= $nilai_p1->total_nilai_sa ?></td>
                        </tr>
                        <tr>
                            <td>NILAI SEKRETARIS PENGUJI 2</td>
                            <td><?= $nilai_p2->total_nilai_sa ?></td>
                        </tr>
                        <tr>
                            <td>TOTAL NILAI</td>
                            <td><?= $total_nilai ?></td>
                        </tr>
                        <tr>
                            <td>NILAI RATA RATA</td>
                            <td><?= $nilai_rata ?></td>
                        </tr>
                        <tr>
                            <td>NILAI HURUF</td>
                        <?php if($nilai_rata < 30):?>
                            <?php $nilai_huruf_penentuan = 'Tidak Lulus' ?>
                            <td><b>D</b></td>
                        <?php elseif($nilai_rata > 30 && $nilai_rata < 50): ?>
                            <?php $nilai_huruf_penentuan = 'Tidak Lulus' ?>
                            <td><b>C</b></td>
                        <?php elseif($nilai_rata > 50 && $nilai_rata < 75): ?>
                            <?php $nilai_huruf_penentuan = 'LULUS' ?>
                            <td><b>B</b></td>
                        <?php elseif($nilai_rata > 75 && $nilai_rata < 100): ?>
                            <?php $nilai_huruf_penentuan = 'LULUS' ?>
                            <td><b>A</b></td>
                        <?php endif; ?>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center" style="margin-top:30px;margin-left:410px;font-family:serif;">
            <p>Payakumbuh <?= date('d F Y')?></p>
        </div>
        <br>
        <br>
        <div class="text-center" style="margin-top:30px;font-family:serif;">
            <p><b>TIM PENGUJI</b></p>
            <br>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-xs-6">
                        <p><b><?=$nilai_p1->penguji?></b></p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p><b>( <?=$nilai_p1->nama_dosen?> )</b></p>
                    </div>
                    <div class="col-xs-6">
                        <p><b><?=$nilai_p2->penguji?></b></p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p><b>( <?=$nilai_p2->nama_dosen?> )</b></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
<!-- ===================================== HALAMAN 4 ============================================= -->
        <div class="text-center" style="margin-top:5px;font-family:serif;">
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
        <h4><b>BERITA ACARA SIDANG PENGUJI ALAT/PROGRAM</b></h4>
        <h4><b>TUGAS AKHIR MAHASISWA</b></h4>
        <hr>
        <h5>Pada hari ini tanggal <?= date('d F Y')?> telah dilaksanakan Ujian Sidang PKL Mahasiswa berikut :</h5>
        </div>
        <div class="text-left" style="margin-left:200px">
        <h5>Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?=strtoupper($nilai_p2->nama_mahasiswa)?></h5>
        <h5>NPM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?=($nilai_p2->no_induk)?></h5>
        <h5>Judul Tugas Akhir :</h5>
        </div>
        <div class="text-center">
        <div id="input" contenteditable><h5><b><?=(strtoupper($nilai_p2->judul_ta))?></b></h5></div>
        </div>

        <div class="text-left" style="margin-left:100px">
        <h5>Dengan hasil keputusan hasil tim penguji bahwa mahasiswa tersebut di atas :</h5>
        <table style="border:none;">
            <tbody>
                <tr>
                    <td>Dinyatakan</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>:</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td><b><?=$nilai_huruf_penentuan?></b></td>
                </tr>
                <tr>
                    <td>Dengan Nilai</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>:</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td><b><?= $nilai_rata ?></b></td>
                </tr>
                <tr>
                    <td>Laporan PKL</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>:</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>&nbsp;&nbsp;</td>
                    <td>Diperbaiki / <span style="text-decoration: line-through;">Tidak diperbaiki</span></td>
                </tr>
            </tbody>
        </table>
        </div>

        <br>
        <div class="text-center" style="margin-top:30px;margin-left:410px;font-family:serif;">
            <p>Payakumbuh <?= date('d F Y')?></p>
        </div>
        <br>
        <br>
        <div class="text-center" style="margin-top:30px;font-family:serif;">
            <p><b>TIM PENGUJI</b></p>
            <br>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-xs-6">
                        <p><b><?=$nilai_p1->penguji?></b></p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p><b>( <?=$nilai_p1->nama_dosen?> )</b></p>
                    </div>
                    <div class="col-xs-6">
                        <p><b><?=$nilai_p2->penguji?></b></p>
                        <br>
                        <br>
                        <br>
                        <br>
                        <p><b>( <?=$nilai_p2->nama_dosen?> )</b></p>
                    </div>
                </div>
            </div>
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