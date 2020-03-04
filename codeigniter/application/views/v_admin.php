<!DOCTYPE html>
<html>

<head> 
<!--  di sini fungsinya untuk membuat tulisan di dalam web yang terdapa di paling atas -->
	<title>Membuat login dengan codeigniter | www.malasngoding.com</title> 
</head>
<body> <!--  untuk mengalihkan pada fungsi logout controller -->
	<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2>
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
</body>
</html>