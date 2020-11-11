  <?php
session_start();
if (!empty($_SESSION['email'])){
    $conn = new mysqli("localhost","root","","tes2");
    if (!$conn) {
	die ('Gagal terhubung dengan MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * 
		FROM penduduk';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>masuk</title>
</head>
<body>
	<table>
		<p>SELAMAT DATANG DI DASHBOARD ADMIN</p>
		<caption class="title">Data penduduk</caption>
		<a href=tambah.php>tambah data</a>
		<thead>
			<tr>
				<th>nik</th>
				<th>nama</th>
				<th>tgl lahir</th>
				<th>tmpt lahir</th>
				<th>foto</th>
				<th>aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
	
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$row['nik'].'</td>
					<td>'.$row['nama'].'</td>
					<td>'.$row['tanggal_lahir'].'</td>
					<td>'.$row['tempat_lahir'].'</td>
					<td><img width="300" height="400" src="'.$row['foto'].'"></td>
					<td><a href=del.php?nik='.$row['nik'].'>Delete | </a></td>
					<td><a href=edit.php?nik='.$row['nik'].'>Edit</a></td>
				</tr>';
		}
		
		?>
		</tbody>
	</table>
	<a href="keluar.php">keluar</a>
	<?php } else echo "<a href=login.php>harus login</a>";
			
	?>
</body>
</html>