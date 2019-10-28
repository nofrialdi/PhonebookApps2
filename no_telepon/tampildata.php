<?php 
 
	//Import File Koneksi Database
	require_once('koneksi.php');
	
	//Membuat SQL Query
	$sql = "SELECT * FROM telepon";
	
	//Mendapatkan Hasil
	$r = mysqli_query($con,$sql);
	
	//Membuat Array Kosong 
	$result = array();
	
	while($row = mysqli_fetch_array($r)){
		
		//Memasukkan Nama dan ID kedalam Array Kosong yang telah dibuat 
		array_push($result,array(
		"id" =>$row['id'],
		"Nama"=>$row['Nama'],
		"Pangkat"=>$row['Pangkat'],
		"Jabatan"=>$row['Jabatan'],
		"Agama"=>$row['Agama'],
		"Alamat"=>$row['Alamat'],
		"Telepon"=>$row['Telepon'],
		"Foto"=>$row['Foto'],

		));
	}
	
	//Menampilkan Array dalam Format JSON
	echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
?>
