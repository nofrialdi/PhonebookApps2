<?php
	include_once('includes/connect_database.php'); 
?>

<div id="content" class="container col-md-12">
	<?php 
		if(isset($_GET['id'])){
			$ID = $_GET['id'];
		}else{
			$ID = "";
		}
		
		// create array variable to store data from database
		$data = array();
		
		// get currency symbol from setting table
		/*$sql_query = "SELECT Value 
				FROM tbl_setting 
				WHERE Variable = 'Currency'";
		
		$stmt = $connect->stmt_init();
		if($stmt->prepare($sql_query)) {	
			// Execute query
			$stmt->execute();
			// store result 
			$stmt->store_result();
			$stmt->bind_result($currency);
			$stmt->fetch();
			$stmt->close();
		}	*/
		
		// get all data from menu table and category table
		$sql_query = "SELECT * 
				FROM telepon WHERE id=?
				";
		
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
					$data['Foto'], 
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
		
	?>

<div class="col-md-9 col-md-offset-2">
	<h1>Detail Data Nomor Telepon</h1>
	<form method="post">
		<table table class='table table-bordered table-condensed'>
			<tr class="row">
				<th class="detail">Nama</th>
				<td class="detail"><?php echo $data['Nama']; ?></td>
			</tr>
			<tr class="row">
				<th class="detail">Foto</th>
				<td class="detail"><img src="<?php echo $data['Foto']; ?>" width="260" height="240"/></td>
			</tr>
				<tr class="row">
				<th class="detail">Pangkat</th>
				<td class="detail"><?php echo $data['Pangkat']; ?></td>
			</tr>
			<tr class="row">
				<th class="detail">Jabatan</th>
				<td class="detail"><?php echo $data['Jabatan']; ?></td>
			</tr>
			<tr class="row">
				<th class="detail">Agama</th>
				<td class="detail"><?php echo $data['Agama']; ?></td>
			</tr>

			<tr class="row">
				<th class="detail">Alamat</th>
				<td class="detail"><?php echo $data['Alamat']; ?></td>
			</tr>

			<tr class="row">
				<th class="detail">Telepon</th>
				<td class="detail"><?php echo $data['Telepon']; ?></td>
			</tr>

			<tr class="row">
				<th class="detail">Email</th>
				<td class="detail"><?php echo $data['Email']; ?></td>
			</tr>
			
		</table>
		
	</form>
	<div id="option_menu">
			<a href="edit-telpon.php?id=<?php echo $ID; ?>"><button class="btn btn-primary">Edit</button></a>
			<a href="delete-telpon.php?id=<?php echo $ID; ?>"><button class="btn btn-danger">Delete</button></a>
	</div>
	
	</div>
				
	<div class="separator"> </div>
</div>
			
<?php include_once('includes/close_database.php'); ?>