<?php
$severname= "localhost";
$username= "root";
$password= "";
$dbname= "dts_tsa";

//create connection
$conn =mysqli_connect($severname, $username, $password, $dbname);

//check connection
if(!$conn){
    die("Connection failed: " .mysqli_connect_error());
}
if(isset($_POST['kirim'])){
	$id = $_POST['id_produk'];
	$nama = $_POST['nama_produk'];
	$harga= $_POST['harga_produk'];
	$merk = $_POST['merk_produk'];
	if ($_FILES['gambar']['error'] === 4) {
		echo 
		"<script>
			alert('Image Does Not Exist');
		</script>";
	}else{
		$fileName = $_FILES['gambar']['name'];
		$fileSize = $_FILES['gambar']['size'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		$validImageExtension = ['jpg', 'jpeg', 'png'];
		$imageExtension = explode('.', $fileName);
		$imageExtension = strtolower(end($imageExtension));
		if (!in_array($imageExtension, $validImageExtension)) {
			echo 
			"<script>
				alert('Invalid Image Extension');
			</script>";
		}elseif ($fileSize < 1000) {
			echo 
			"<script>
				alert('Image Size to Small');
			</script>";	
		}else{
			$newImageName = uniqid();
			$newImageName .= '.'.$imageExtension;

			move_uploaded_file($tmpName, 'image/'.$newImageName);
			$query = "INSERT INTO produk (id_produk, nama_produk, harga_produk, merk_produk, gambar) VALUES('$id', '$nama', '$harga', '$merk', '$newImageName')";
			mysqli_query($conn, $query);
			echo 
			"<script>
				alert('Data berhasil ditambah');
				document.location.href = 'listproduk.php';
			</script>";	
		}
	}
}
?>