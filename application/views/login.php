<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

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

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure style="margin-bottom:0px;margin-top:20px;"><img src="<?=base_url()?>assets/upload/image/logo.png" alt="sing up image" width="80"></figure>
                        <figure><img src="<?=base_url()?>assets/reglog/images/signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title" style="font-size: 32px;">STT-Payakumbuh Sign up</h2>
                        <form method="POST" action="<?=base_url('login')?>" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="fa fa-id-card"></i></label>
                                <input type="text" name="no_induk" id="your_name" placeholder="NIDN / NIM"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"/>
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                            <!-- <a href="<?=base_url('registrasi')?>" class="signup-image-link">Pendaftaran Sidang Tugas Akhir Mahasiswa</a> -->
                        </form>
                        <!-- <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> -->
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