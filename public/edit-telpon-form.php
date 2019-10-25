<?php
	include_once('includes/connect_database.php'); 
	include_once('functions.php'); 
?>
<div id="content" class="container col-md-12">
	<div id="content" class="container col-md-12">
	<?php 
	
		if(isset($_GET['id'])){
			$ID = $_GET['id'];
		}else{
			$ID = "";
		}
		
		// create array variable to store category data
		$category_data = array();
			
		/*$sql_query = "SELECT id, Nama 
				FROM telepon 
				ORDER BY id ASC";
				
		$stmt_category = $connect->stmt_init();
		if($stmt_category->prepare($sql_query)) {	
			// Execute query
			$stmt_category->execute();
			// store result 
			$stmt_category->store_result();
			$stmt_category->bind_result($category_data['id'], 
				$category_data['Nama']
				);
				
		}*/
			
		$sql_query = "SELECT Foto FROM telepon WHERE id = ?";
		
		$stmt = $connect->stmt_init();
		if($stmt->prepare($sql_query)) {	
			// Bind your variables to replace the ?s
			$stmt->bind_param('s', $ID);
			// Execute query
			$stmt->execute();
			// store result 
			$stmt->store_result();
			$stmt->bind_result($previous_Foto_image);
			$stmt->fetch();
			$stmt->close();
		}
		
		
		
		if(isset($_POST['btnEdit'])){
			
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
				
			if(empty($Pangkat)){
				$error['Pangkat'] = " <span class='label label-danger'>Required!</span>";
			}

			if(empty($Jabatan)){
				$error['Jabatan'] = " <span class='label label-danger'>Required!</span>";
			}

			if(empty($Agama)){
				$error['Agama'] = " <span class='label label-danger'>Required!</span>";
			}

			if(empty($Alamat)){
				$error['Alamat'] = " <span class='label label-danger'>Required!</span>";
			}	

			

			if(empty($Telepon)){
				$error['Telepon'] = " <span class='label label-danger'>Required!</span>";
			}			

				
		
		
			// common image file extensions
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			
			// get image file extension
			error_reporting(E_ERROR | E_PARSE);
			$extension = end(explode(".", $_FILES["Foto_image"]["name"]));
			
			if(!empty($Foto_image)){
				if(!(($Foto_type == "image/gif") || 
					($Foto_type == "image/jpeg") || 
					($Foto_type == "image/jpg") || 
					($Foto_type == "image/x-png") ||
					($Foto_type == "image/png") || 
					($Foto_type == "image/pjpeg")) &&
					!(in_array($extension, $allowedExts))){
					
					$error['Foto_image'] = "*<span class='label label-danger'>Image type must jpg, jpeg, gif, or png!</span>";
				}
			}
			
					
			if(!empty($Nama) && !empty($Pangkat) && !empty($Jabatan) && !empty($Agama) &&
				!empty($Alamat) && !empty($Telepon) && empty($error['Foto_image'])){
				
				if(!empty($Foto_image)){
					
					// create random image file name
					$string = '0123456789';
					$file = preg_replace("/\s+/", "_", $_FILES['Foto_image']['name']);
					$function = new functions;
					$Foto_image = $function->get_random_string($string, 4)."-".date("Y-m-d").".".$extension;
				
					// delete previous image
					$delete = unlink("$previous_Foto_image");
					
					// upload new image
					$upload = move_uploaded_file($_FILES['Foto_image']['tmp_name'], 'upload/images/'.$Foto_image);
	  
					// updating all data
					$sql_query = "UPDATE telepon 
							SET Nama = ?,Foto = ?, Pangkat = ?, Jabatan = ?, Agama = ?,  Alamat = ?, Telepon = ?,Email = ? 
							WHERE id = ?";
					
					$upload_image = 'upload/images/'.$Foto_image;
					$stmt = $connect->stmt_init();
					if($stmt->prepare($sql_query)) {	
						// Bind your variables to replace the ?s
						$stmt->bind_param('sssssssss', 
									$Nama,
									$upload_image, 
									$Pangkat, 
									$Jabatan,
									$Agama, 
									$Alamat, 
									$Telepon,
									$Email,
									$ID);
						// Execute query
						$stmt->execute();
						// store result 
						$update_result = $stmt->store_result();
						$stmt->close();
					}
				}else{
					
					// updating all data except image file
					$sql_query = "UPDATE telepon 
							SET Nama = ? , Pangkat = ?, 
							Jabatan = ?,  Agama = ?,Alamat = ?, Telepon = ? 
							WHERE id = ?";
							
					$stmt = $connect->stmt_init();
					if($stmt->prepare($sql_query)) {	
						// Bind your variables to replace the ?s
						$stmt->bind_param('ssssssss', 
									$Nama, 
									$Pangkat, 
									$Jabatan, 
									$Agama, 
									$Alamat,
									$Telepon,
									$Email,
									$ID);
						// Execute query
						$stmt->execute();
						// store result 
						$update_result = $stmt->store_result();
						$stmt->close();
					}
				}
					
			

				if($update_result){
					$error['update_telpon'] = " <h4><div class='alert alert-success'>
														* Success Update Data
														<a href='telpon.php'>
														<i style='color:#3c763d' class='icon fa fa-check'></i>
														</a></div>
												  </h4>";
				}else{
					$error['update_telpon'] = " <span class='label label-danger'>Gagal Update Data</span>";
				}
			}
			
		}
		
		// create array variable to store previous data
		$data = array();
			
		$sql_query = "SELECT * FROM telepon WHERE id = ?";
			
		$stmt = $connect->stmt_init();
		if($stmt->prepare($sql_query)) {	
			// Bind your variables to replace the ?s
			$stmt->bind_param('s', $ID);
			// Execute query
			$stmt->execute();
			// store result 
			$stmt->store_result();
			$stmt->bind_result($data['id'], 
					$data['Nama'],
					$data['Foto_image'], 
					$data['Pangkat'], 
					$data['Jabatan'],
					$data['Agama'], 
					$data['Alamat'], 
					$data['Telepon'],
					$data['Email']
					);
			$stmt->fetch();
			$stmt->close();
		}

		if(isset($_POST['btnCancel'])){
			header("location: telpon.php");
		}
		
			
	?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<div class="col-md-12">
		<h1>Edit Nomor Telepon</h1>
		<?php echo isset($error['update_telpon']) ? $error['update_telpon'] : '';?>
		<hr />
	</div>
	
	<div class="col-md-5">
		<form method="post"
			enctype="multipart/form-data">
			<label>Nama :</label><?php echo isset($error['Nama']) ? $error['Nama'] : '';?>
			<input type="text" class="form-control" name="Nama" value="<?php echo $data['Nama']; ?>"/>
			<br/>

			 <label>Foto :</label><?php echo isset($error['Foto_image']) ? $error['Foto_image'] : '';?>
			<input type="file" name="Foto_image" id="Foto_image" /><br />

			<img src="<?php echo $data['Foto_image']; ?>" width="280" height="270"/> 
			<br/>

			<label>Pangkat :</label><?php echo isset($error['Pangkat']) ? $error['Pangkat'] : '';?>
			<input type="text" class="form-control" name="Pangkat" value="<?php echo $data['Pangkat']; ?>"/>
			<br/>

			<label>Jabatan :</label><?php echo isset($error['Jabatan']) ? $error['Jabatan'] : '';?>
			<input type="text" class="form-control" name="Jabatan" value="<?php echo $data['Jabatan']; ?>"/>
			<br/>

			<!-- <select name="Agama">

			
			</select> -->

			<label>Agama :</label><?php echo isset($error['Agama']) ? $error['Agama'] : '';?>
			<input type="text" class="form-control" name="Agama" value="<?php echo $data['Agama']; ?>"/>
		<!-- <select name="Agama" class="form-control">
			<option value="<?php echo $Agama;?>" hidden><?php echo $Agama;?></option>
			<option value="Islam">Islam</option>
			<option value="Kristen">Kristen</option>
			<option value="Hindu">Hindu</option>
			<option value="Budha">Budha</option>
			<option value="Lainnya">Lainnya</option>
		</select> -->

		<br/>

			<!-- <label>Agama :</label><?php echo isset($error['Agama']) ? $error['Agama'] : '';?>
			<input type="text" class="form-control" name="Agama" value="<?php echo $data['Agama']; ?>"/>
			<br/> -->

			<label>Alamat :</label><?php echo isset($error['Alamat']) ? $error['Alamat'] : '';?>
			<input type="text" class="form-control" name="Alamat" value="<?php echo $data['Alamat']; ?>"/>
			<br/>

			

			<label>Telepon :</label><?php echo isset($error['Telepon']) ? $error['Telepon'] : '';?>
			<input type="text" class="form-control" name="Telepon" value="<?php echo $data['Telepon']; ?>"/>
			<br/>

			<label>Email :</label><?php echo isset($error['Email']) ? $error['Email'] : '';?>
			<input type="text" class="form-control" name="Email" value="<?php echo $data['Email']; ?>"/>
			<br/>


			
			<input type="submit" class="btn-primary btn" value="Update" name="btnEdit"/>
			<input type="submit" class="btn-danger btn" value="Cancel" name="btnCancel"/>
		</form>
	</div>

	<div class="separator"> </div>
</div>
	
<?php include_once('includes/close_database.php'); ?>