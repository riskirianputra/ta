<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Sidang Tugas Akhir</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?=base_url()?>assets/reglog/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Main css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/reglog/css/style.css">
    <style>
        .card-bimbingan{
            border: 1px solid #a4a4a4;
            border-radius: 14px;
            padding: 21px;
        }
    </style>
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Pendaftaran Sidang Tugas Akhir</h2>
                        <?php echo form_open_multipart(base_url('registrasi/save_registrasi'),' class="form-horizontal"');?>
                            <div class="form-group">
                                <label for="nim"><i class="fa fa-id-card"></i></label>
                                <input type="number" name="nim" id="nim" placeholder="Nomor Induk Mahasiswa"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="nama"><i class="fa fa-user"></i></label>
                                <input type="text" name="nama" id="nama" placeholder="Nama Lengkap"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Alamat Email"/>
                            </div>
                            <div class="form-group">
                                <label for="nohp"><i class="fa fa-phone"></i></label>
                                <input type="number" name="nohp" id="nohp" placeholder="Kontak / No Hp"/>
                            </div>
                            <div class="form-group">
                                <label for="nohp"><i class="fa fa-tag"></i></label>
                                <input type="text" name="judul_ta" id="nohp" placeholder="Judul Tugas Akhir"/>
                            </div>
                            <div class="card-bimbingan">
                            <div class="form-group" style="margin-bottom: 1px;">
                                <label for="bimbingan1" style="position:sticky;">Scan Kartu Bimbingan Pembimbing 1</label>
                            </div>
                            <div class="form-group">
                                <label for="bimbingan1"><i class="fa fa-file"></i></label>
                                <input type="file" title="your text" name="bimbingan1" id="bimbingan1"/>
                            </div>
                            <div class="form-group" style="margin-bottom: 1px;margin-top: 30px;">
                                <label for="bimbingan1" style="position:sticky;">Scan Kartu Bimbingan Pembimbing 2</label>
                            </div>
                            <div class="form-group">
                                <label for="bimbingan2"><i class="fa fa-file"></i></label>
                                <input type="file" name="bimbingan2" id="bimbingan2" placeholder="Scan Kartu Bimbingan Pembimbing 1"/>
                            </div>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="signup-image">
                        <figure style="margin-bottom:0px;margin-top:20px;"><img src="<?=base_url()?>assets/upload/image/logo.png" alt="sing up image" width="80"></figure>
                        <figure><img src="<?=base_url()?>assets/reglog/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="<?=base_url('login')?>" class="signup-image-link">Login dashboard Tugas Akhir</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

<!-- JS -->
<script src="<?=base_url()?>assets/reglog/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/reglog/js/main.js"></script>
</body>
</html>