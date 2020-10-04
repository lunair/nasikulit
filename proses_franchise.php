<?php
	include "admin_nasikulit/config/connection.php";

	if (isset($_POST['kirim'])) {
		$varnama 	= $_POST['namalengkap'];
		$varemail	= $_POST['email'];
		$varwa		= $_POST['nowa'];
		$varpesan	= $_POST['pesan'];

	$queryInsert	= mysqli_query($connect,"INSERT INTO `tb_franchise`(`id_franchise`, `namalengkap`, `email`, `no_wa`, `pesan`) VALUES ('','$varnama','$varemail','$varwa','$varpesan')");

	if ($queryInsert) {
	//echo "masuk";
		echo"<script>alert('Franchise anda berhasil terkirim');window.location.href='index.php';</script>";
	}else{
	//echo "gagal";
		echo"<script>alert('Franchise anda gagal terkirim');window.location.href='index.php';</script>";
}
}
?>