<?php 
 	
	//Mendapatkan Nilai Dari Variable nomor anggota yang ingin ditampilkan
	 $query = $_GET['query'];
	
	//Importing database
	require_once('koneksi.php');

	
	//Membuat SQL Query dengan anggota yang ditentukan secara spesifik sesuai nomor
	$sql = "SELECT * FROM telepon WHERE  id = '$query' 
	";
	
	//Mendapatkan Hasil 
	$r = mysqli_query($con,$sql);
	
	//Memasukkan Hasil Kedalam Array
	$result = array();
	$row = mysqli_fetch_array($r);
	array_push($result,array(
		//"id" =>$row['id'],
		"Nama"=>$row['Nama'],
		"Pangkat"=>$row['Pangkat'],
		"Jabatan"=>$row['Jabatan'],
		"Agama"=>$row['Agama'],
		"Alamat"=>$row['Alamat'],
		"Telepon"=>$row['Telepon'],
		"Foto"=>$row['Foto'],

		));
 
	//Menampilkan dalam format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>