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
?>
<!DOCTYPE html>
<html>
<head>
	<title>UPLOAD GAMBAR</title>
    <style>
    input[type=button], input[type=submit] {
    background-color: #a3d6c8;
    border: none;
    color: black;
    padding: 10px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
    }
    </style>
</head>
<body>
	<form action="prosesdata.php" method="post" enctype="multipart/form-data">

        <p>
            <label for="nama">ID Produk : </label>
            <input type="text" name="id_produk" placeholder="" required="">
        </p>    
        <p>
            <label for="nama">Nama Produk : </label>
            <input type="text" name="nama_produk" placeholder="" required="">
        </p>
        <p>
            <label for="harga">Harga Produk : </label>
            <input type="number" name="harga_produk" placeholder="" required="">
        </p>
        <p>
            <label for="merk">Merk Produk : </label>
            <input type="text" name="merk_produk" placeholder="" required="">
        </p>
        <p>
        	<label for="gambar">Gambar Produk : </label>
        	<input type="file" name="gambar" accept="image/*" required="">
        </p>
        <p>
        <input type="submit" value="Kirim" name="kirim" >
        </p>

    </form>
</body>
</html>