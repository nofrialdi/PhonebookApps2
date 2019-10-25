<?php
	include_once('includes/connect_database.php'); 
	include_once('functions.php'); 
?>
<div id="content" class="container col-md-12">
	 <?php 
		if(isset($_POST['btnAdd'])){
			$Nama = $_POST['Nama'];
			$Pangkat = $_POST['Pangkat'];
			$Jabatan = $_POST['Jabatan'];
			$Agama = $_POST['Agama'];
			$Alamat = $_POST['Alamat'];
			$Telepon = $_POST['Telepon'];
			$Email = $_POST['Email'];

			
			// get image info
			$Foto_image = $_FILES['Foto_image']['name'];
			$Foto_error = $_FILES['Foto_image']['error'];
			$Foto_type = $_FILES['Foto_image']['type'];
			
			// create array variable to handle error
			$error = array();
			
			if(empty($Nama)){
				$error['Nama'] = " <span class='label label-danger'>Required!</span>";
			}
			
			// common image file extensions
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			
			// get image file extension
			error_reporting(E_ERROR | E_PARSE);
			$extension = end(explode(".", $_FILES["Foto_image"]["name"]));
					
			if($Foto_error > 0){
				$error['Foto_image'] = " <span class='label label-danger'>Not Uploaded!!</span>";
			}else if(!(($Foto_type == "image/gif") || 
				($Foto_type == "image/jpeg") || 
				($Foto_type == "image/jpg") || 
				($Foto_type == "image/x-png") ||
				($Foto_type == "image/png") || 
				($Foto_type == "image/pjpeg")) &&
				!(in_array($extension, $allowedExts))){
			
				$error['Foto_image'] = " <span class='label label-danger'>Image type must jpg, jpeg, gif, or png!</span>";
			}
			
			if(!empty($Nama) && empty($error['Foto_image'])){
				
				// create random image file name
				$string = '0123456789';
				$file = preg_replace("/\s+/", "_", $_FILES['Foto_image']['name']);
				$function = new functions;
				$menu_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
					
				// upload new image
				$upload = move_uploaded_file($_FILES['Foto_image']['tmp_name'], 'upload/images/'.$Foto_image);
		
				// insert new data to menu table
				$sql_query = "INSERT INTO telepon (Nama,Foto,Pangkat,Jabatan,Alamat,Agama,Telepon,Email)
						VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
				
				$upload_image = 'upload/images/'.$Foto_image;
				$stmt = $connect->stmt_init();
				if($stmt->prepare($sql_query)) {	
					// Bind your variables to replace the ?s
					$stmt->bind_param('ssssssss', 
								$Nama, 
								$upload_image,
								$Pangkat,
								$Jabatan,
								$Alamat,
								$Agama,
								$Telepon,
								$Email

								);
					// Execute query
					$stmt->execute();
					// store result 
					$result = $stmt->store_result();
					$stmt->close();
				}
				
				if($result){
					$error['add_telpon'] = " <h4><div class='alert alert-success'>
														* Success Tambah Data
														<a href='telpon.php'>
														<i style='color:#3c763d' class='icon fa fa-check'></i>
														</a></div>
												  </h4>";
				}else{
					$error['add_telpon'] = " <span class='label label-danger'>Gagal Tambah Data</span>";
				}
			}
			
		}

		if(isset($_POST['btnCancel'])){
			header("location: telpon.php");
		}

	?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<div class="col-md-12">
		<h1>Tambah Nomor Telepon</h1>
		<?php echo isset($error['add_telpon']) ? $error['add_telpon'] : '';?>
		<hr />
	</div>
	
	<div class="col-md-6">
		<form method="post"
			enctype="multipart/form-data">
			<label>Nama :</label><?php echo isset($error['Nama']) ? $error['Nama'] : '';?>
			<input type="text" class="form-control" name="Nama"/>
			<br/>
			
			<label>Image :</label><?php echo isset($error['Foto_image']) ? $error['Foto_image'] : '';?>
			<input type="file" name="Foto_image" id="Foto_image" />
			<br/>

			<label>Pangkat :</label><?php echo isset($error['Pangkat']) ? $error['Pangkat'] : '';?>
			<input type="text" class="form-control" name="Pangkat"/>
			<br/>

			<label>Jabatan :</label><?php echo isset($error['Jabatan']) ? $error['Jabatan'] : '';?>
			<input type="text" class="form-control" name="Jabatan"/>
			<br/>

			<label>Agama :</label><?php echo isset($error['Agama']) ? $error['Agama'] : '';?>
			<select class="form-control" name="Agama">
			<option value="Islam">Islam</option>
			<option value="Kristen">Kristen</option>
			<option value="Hindu">Hindu</option>
			<option value="Budha">Budha</option>
			<option value="Lainnya">Lainnya</option>
			</select><!-- 
			<input type="text" class="form-control" name="judul_quote"/> -->
			<br/>

			<label>Alamat :</label><?php echo isset($error['Alamat']) ? $error['Alamat'] : '';?>
			<input type="text" class="form-control" name="Alamat"/>
			<br/>
			<label>Telepon :</label><?php echo isset($error['Telepon']) ? $error['Telepon'] : '';?>
			<input type="text" class="form-control" name="Telepon"/>
			<br/>

			<label>Email :</label><?php echo isset($error['Email']) ? $error['Email'] : '';?>
			<input type="text" class="form-control" name="Email"/>
			<br/>

			
			<input type="submit" class="btn-primary btn" value="Submit" name="btnAdd"/>
			<input type="reset" class="btn-warning btn" value="Clear"/>
			<input type="submit" class="btn-danger btn" value="Cancel" name="btnCancel"/>
		</form>
	</div>

	<div class="separator"> </div>
</div>
	
<?php include_once('includes/close_database.php'); ?>