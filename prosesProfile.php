<?php
	session_start();
	if(!empty($_POST['save']))
	{
		include'koneksi.php';

		$id = $_SESSION['username'];
		echo $id;
		echo "asdasdasdsada";


		if($koneksi->connect_error)
		{
			die('Coba periksa koneksi anda');
		}

		// $id_profile = $_POST['id_profile'];
		$full_name = $_POST['full_name'];
		$email=$_POST['email'];
		$hp = $_POST['hp'];
		$jenis_kelamin=$_POST['jenis_kelamin'];
		$tgl=strtotime($_POST['tgl_lahir']);
		$tgl_lahir=date('Y-m-d',$tgl);
		$alamat = $_POST['alamat'];
		$kodepos=$_POST['kodepos'];
		$kota=$_POST ['kota'];
		$hp_lain = $_POST['hp_lain'];

		$queryinsert = $koneksi->query("UPDATE signup SET full_name='$full_name', email='$email',  hp='$hp', jenis_kelamin='$jenis_kelamin', tgl_lahir='$tgl_lahir',alamat='$alamat',kodepos='$kodepos',kota='$kota', hp_lain='$hp_lain' WHERE username='$id' ");


		echo $koneksi->query($queryinsert);
		if($queryinsert == TRUE){
			echo "<script>
				alert('Data Berhasil Ditambahkan ');
				document.location = 'editdata.php?id=$id';
			</script>";
		}else{
		echo "		
			<script>
				alert('Maaf Data Gagal Dimasukkan');
				document.location = 'profile.php';
			</script>";
		}
	}
?>
