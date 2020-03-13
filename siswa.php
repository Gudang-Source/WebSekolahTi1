<?php 

require_once 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT tbl_siswa.id, tbl_siswa.nama, tbl_siswa.no_hp, tbl_siswa.nis, tbl_siswa.alamat, tbl_jurusan.nama_jurusan AS jurusan FROM tbl_siswa LEFT JOIN tbl_jurusan ON tbl_siswa.id_jurusan = tbl_jurusan.id");
$aktif = 'siswa';
$no = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Daftar Siswa - SLB C1 YPAC SEMARANG</title>
	<link rel="stylesheet" href="resources/datatables/datatables.min.css">
	<link rel="stylesheet" href="resources/fonts/stylesheet.css">
	<link rel="stylesheet" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css/style.css">
</head>
<body>
	<div class="container bg-light">
		<!-- top bar -->
		<div class="logo clearfix">
			<div class="float-left mt-3 mb-3">
				<div class="text float-right">
					<img src="resources/images/logo.png" alt="Logo Sekolah" width="100px" class="float-left mr-3">
					<span class="smk">SLB C1 YPAC SEMARANG</span><br>
					<span class="visi">TERWUJUDNYA PELAYANAN OPTIMAL BAGI ANAK YANG BEKEBUTUHAN KHUSUS YANG BERTAQWA MANDIRI TERAMPIL BERBUDI LUHUR BERBUDAYA SERTA CINTA DAMAI</span>
				</div>
			</div>
		</div>
			
		<!-- nav bar -->
		<?php require_once 'navbar.php'; ?>
		<br>
		<!-- content -->
		<div class="row p-3">
			<div class="col-md-8">
				<div class="title mb-3">
					Daftar Siswa
				</div>
				<table id="table_id" class="dataTable table table-bordered">
				    <thead>
				        <tr>
				            <th>No</th>
							<th>Nama</th>
							<th>NIS</th>
							<th>No HP</th>
							<th>Kelas</th>
				            <th>Alamat</th>
							
				        </tr>
				    </thead>
				    <tbody>
				       <?php while($row = mysqli_fetch_assoc($query)) : ?>
				       		<tr>
				       			<td><?= $no++ ?></td>
				       			<td><a href="detail_siswa.php?id=<?= $row['id'] ?>"><?= $row['nama'] ?></a></td>
				       			<td><?= $row['nis'] ?></td>
								<td><?= $row['no_hp'] ?></td> 
								<td><?= $row['jurusan'] ?></td>
				       			<td><?= $row['alamat'] ?></td>
				       		</tr>
				       <?php endwhile; ?>
				    </tbody>
				</table>
			</div>
			<?php require 'sidebar.php'; ?>
		</div>
		<div class="text-white footer">
		2020 © Copyright by Web Developer
		</div>
	</div>

	<script src="resources/js/jquery.js"></script>
	<script src="resources/js/bootstrap.min.js"></script>
	<script src="resources/datatables/datatables.min.js"></script>
	<script src="resources/datatables/datatable.js"></script>
</body>
</html>