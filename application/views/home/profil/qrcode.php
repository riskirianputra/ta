<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>	<?php echo $title ?></title>
	<link rel="stylesheet" href="">
</head>
<body>
		<h1 align="center"><?php echo $title ?></h1>
		<?php echo $qrcode = $this->session->userdata('nim');; ?>
		<img src="<?php echo site_url('home/dasbor/qrcode/'.$user->nim) ?>" alt="">
</body>
</html>