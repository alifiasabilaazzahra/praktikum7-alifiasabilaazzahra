
<?php
session_start();
$conn = new mysqli("localhost","root","","tes2");
if(isset($_POST["nama"])){
		$tmp = $conn->real_escape_string($_POST["tmp"]);
		$tgl = $conn->real_escape_string($_POST["tgl"]);
		$nama = $conn->real_escape_string($_POST["nama"]);

		$target_dir		= "upload/"; 
		$file_name		= basename($_FILES["foto"]["name"]); 
		$target_file	= $target_dir . $file_name; 
		$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 
		if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {


		$conn->query("INSERT INTO penduduk SET nama='$nama',tempat_lahir='$tmp', tanggal_lahir='$tgl',foto='$target_file';");
		}
		
		echo "berhasil nambah data";
		echo "<a href=masuk.php>lihat</a>";
		
	}
?>